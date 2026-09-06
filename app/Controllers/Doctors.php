<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class Doctors extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $data['doctors'] = $doctorModel->forTenant()->orderBy('created_at', 'DESC')->findAll();
        return view('doctors/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $doctorModel = new DoctorModel();
            $userModel   = new \App\Models\UserModel();

            $username       = trim($this->request->getPost('username'));
            $email          = trim($this->request->getPost('email'));
            $name           = $this->request->getPost('name');
            $customPassword = trim($this->request->getPost('password'));
            $password       = !empty($customPassword) ? $customPassword : 'doctor123';

            $visitingDays    = $this->request->getPost('visiting_days');
            $dayTimes        = $this->request->getPost('day_times') ?? [];
            
            $visitingDaysStr = is_array($visitingDays) ? implode(', ', $visitingDays) : trim((string)$visitingDays);

            // Format per-day visiting time string
            $visitingTimeParts = [];
            if (is_array($visitingDays)) {
                foreach ($visitingDays as $day) {
                    $slot = isset($dayTimes[$day]) ? trim($dayTimes[$day]) : '';
                    if (!empty($slot)) {
                        $visitingTimeParts[] = "{$day}: {$slot}";
                    }
                }
            }
            $visitingTimeStr = !empty($visitingTimeParts) ? implode(' | ', $visitingTimeParts) : trim((string)$this->request->getPost('visiting_time'));

            // Save Doctor Record
            $doctorModel->insert([
                'name'             => $name,
                'bmdc_reg_no'      => $this->request->getPost('bmdc_reg_no'),
                'department'       => $this->request->getPost('department'),
                'designation'      => $this->request->getPost('designation'),
                'specialization'   => $this->request->getPost('specialization'),
                'consultation_fee' => $this->request->getPost('consultation_fee'),
                'followup_fee'     => $this->request->getPost('followup_fee'),
                'room_no'          => $this->request->getPost('room_no'),
                'visiting_days'    => $visitingDaysStr,
                'visiting_time'    => $visitingTimeStr,
                'phone'            => $this->request->getPost('phone'),
            ]);

            // Auto-create login user account if username is provided
            if ($username || $email) {
                $searchField = $username ? 'username' : 'email';
                $searchValue = $username ? $username : $email;

                $existingUser = $userModel->where($searchField, $searchValue)->first();
                if ($existingUser) {
                    $userModel->update($existingUser['id'], [
                        'username'      => $username ?: $existingUser['username'],
                        'email'         => $email ?: $existingUser['email'],
                        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
                    ]);
                } else {
                    $userModel->insert([
                        'tenant_id'     => session()->get('tenant_id'),
                        'name'          => $name,
                        'username'      => $username ?: strtolower(url_title($name, '.', true)),
                        'email'         => $email ?: ($username ? $username . '@hospital.local' : ''),
                        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
                        'role'          => 'doctor',
                        'phone'         => $this->request->getPost('phone'),
                        'status'        => 'active',
                    ]);
                }
            }

            return redirect()->to('hospital/doctors')->with('success', "Doctor profile created! Username: {$username} | Password: {$password}");
        }

        return view('doctors/create');
    }

    public function edit($id)
    {
        $doctorModel = new DoctorModel();
        $doctor      = $doctorModel->forTenant()->find($id);

        if (!$doctor) {
            return redirect()->to('hospital/doctors')->with('error', 'Doctor record not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            $name     = $this->request->getPost('name');
            $phone    = $this->request->getPost('phone');
            $username = trim($this->request->getPost('username'));
            $email    = trim($this->request->getPost('email'));
            $password = trim($this->request->getPost('password'));

            $visitingDays    = $this->request->getPost('visiting_days');
            $dayTimes        = $this->request->getPost('day_times') ?? [];
            
            $visitingDaysStr = is_array($visitingDays) ? implode(', ', $visitingDays) : trim((string)$visitingDays);

            // Format per-day visiting time string
            $visitingTimeParts = [];
            if (is_array($visitingDays)) {
                foreach ($visitingDays as $day) {
                    $slot = isset($dayTimes[$day]) ? trim($dayTimes[$day]) : '';
                    if (!empty($slot)) {
                        $visitingTimeParts[] = "{$day}: {$slot}";
                    }
                }
            }
            $visitingTimeStr = !empty($visitingTimeParts) ? implode(' | ', $visitingTimeParts) : trim((string)$this->request->getPost('visiting_time'));

            $doctorModel->update($id, [
                'name'             => $name,
                'bmdc_reg_no'      => $this->request->getPost('bmdc_reg_no'),
                'department'       => $this->request->getPost('department'),
                'designation'      => $this->request->getPost('designation'),
                'specialization'   => $this->request->getPost('specialization'),
                'consultation_fee' => $this->request->getPost('consultation_fee'),
                'followup_fee'     => $this->request->getPost('followup_fee'),
                'room_no'          => $this->request->getPost('room_no'),
                'visiting_days'    => $visitingDaysStr,
                'visiting_time'    => $visitingTimeStr,
                'phone'            => $phone,
            ]);

            // Update associated user account if username or email is provided
            if ($username || $email) {
                $userModel = new \App\Models\UserModel();
                $user      = $userModel->where('tenant_id', session()->get('tenant_id'))
                                       ->where('role', 'doctor')
                                       ->groupStart()
                                       ->where('username', $username)
                                       ->orWhere('email', $email)
                                       ->orWhere('phone', $phone)
                                       ->groupEnd()
                                       ->first();

                $userData = [
                    'name'  => $name,
                    'phone' => $phone,
                ];
                if ($username) {
                    $userData['username'] = $username;
                }
                if ($email) {
                    $userData['email'] = $email;
                }
                if ($password) {
                    $userData['password_hash'] = password_hash($password, PASSWORD_BCRYPT);
                }

                if ($user) {
                    $userModel->update($user['id'], $userData);
                } else {
                    $userData['tenant_id']     = session()->get('tenant_id');
                    $userData['role']          = 'doctor';
                    $userData['status']        = 'active';
                    $userData['password_hash'] = password_hash($password ?: 'doctor123', PASSWORD_BCRYPT);
                    $userModel->insert($userData);
                }
            }

            return redirect()->to('hospital/doctors')->with('success', "Doctor details updated successfully!");
        }

        // Retrieve existing user account for username & email prefill
        $userModel = new \App\Models\UserModel();
        $user      = $userModel->where('tenant_id', session()->get('tenant_id'))
                               ->where('role', 'doctor')
                               ->where('phone', $doctor['phone'])
                               ->first();

        $data['doctor']   = $doctor;
        $data['user']     = $user;
        return view('doctors/edit', $data);
    }

    public function delete($id)
    {
        $doctorModel = new DoctorModel();
        $doctor      = $doctorModel->forTenant()->find($id);

        if ($doctor) {
            $doctorModel->delete($id);
            return redirect()->to('hospital/doctors')->with('success', 'Doctor record deleted successfully.');
        }

        return redirect()->to('hospital/doctors');
    }

    public function loginAs($id)
    {
        $doctorModel = new DoctorModel();
        $doctor      = $doctorModel->forTenant()->find($id);

        if (!$doctor) {
            return redirect()->to('hospital/doctors')->with('error', 'Doctor record not found.');
        }

        $userModel = new \App\Models\UserModel();
        $tenantId  = session()->get('tenant_id');

        // Find or create associated user account for doctor
        $user = $userModel->where('tenant_id', $tenantId)
                          ->where('role', 'doctor')
                          ->groupStart()
                          ->where('phone', $doctor['phone'])
                          ->orWhere('name', $doctor['name'])
                          ->groupEnd()
                          ->first();

        if (!$user) {
            $username = strtolower(url_title($doctor['name'], '.', true)) . rand(100, 999);
            $userId   = $userModel->insert([
                'tenant_id'     => $tenantId,
                'name'          => $doctor['name'],
                'username'      => $username,
                'email'         => $username . '@hospital.local',
                'password_hash' => password_hash('doctor123', PASSWORD_BCRYPT),
                'role'          => 'doctor',
                'phone'         => $doctor['phone'],
                'status'        => 'active',
            ]);
            $user = $userModel->find($userId);
        }

        // Save original admin details in session if not already stored
        if (!session()->get('impersonated_by')) {
            session()->set('impersonated_by', [
                'user_id'     => session()->get('user_id'),
                'user_name'   => session()->get('user_name'),
                'user_email'  => session()->get('user_email'),
                'user_role'   => session()->get('user_role'),
                'tenant_id'   => session()->get('tenant_id'),
                'tenant_name' => session()->get('tenant_name'),
            ]);
        }

        // Switch active session to doctor
        session()->set([
            'user_id'     => $user['id'],
            'user_name'   => $user['name'],
            'user_email'  => $user['email'],
            'user_role'   => 'doctor',
            'doctor_id'   => $doctor['id'],
            'isLoggedIn'  => true,
        ]);

        return redirect()->to('hospital/panel/doctor')->with('success', "Logged in as Doctor: {$doctor['name']}! You are now viewing the Doctor Portal.");
    }

    public function returnToAdmin()
    {
        $admin = session()->get('impersonated_by');
        if ($admin) {
            session()->set([
                'user_id'     => $admin['user_id'],
                'user_name'   => $admin['user_name'],
                'user_email'  => $admin['user_email'],
                'user_role'   => $admin['user_role'],
                'tenant_id'   => $admin['tenant_id'],
                'tenant_name' => $admin['tenant_name'],
                'isLoggedIn'  => true,
            ]);
            session()->remove('impersonated_by');
            return redirect()->to('hospital/doctors')->with('success', 'Returned back to Hospital Admin account.');
        }

        return redirect()->to('hospital/doctors');
    }

    public function panel()
    {
        $appointmentModel = new \App\Models\AppointmentModel();
        
        $docId = session()->get('doctor_id');
        $builder = $appointmentModel->forTenant()
                                    ->select('appointments.*, patients.name as patient_name, patients.patient_code, patients.age, patients.gender, patients.blood_group, patients.phone as patient_phone')
                                    ->join('patients', 'patients.id = appointments.patient_id');

        if ($docId) {
            $builder->where('appointments.doctor_id', $docId);
        }

        $appointments = $builder->orderBy('appointments.id', 'ASC')->findAll();

        $data = [
            'appointments' => $appointments,
            'totalQueue'   => count($appointments),
        ];

        return view('panels/doctor', $data);
    }
}
