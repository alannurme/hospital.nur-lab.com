<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TenantModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('user_role') === 'superadmin' ? 'superadmin' : 'hospital/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $loginInput = trim($this->request->getPost('email'));
            $password   = $this->request->getPost('password');

            $userModel = new UserModel();
            $user      = $userModel->groupStart()
                                   ->where('email', $loginInput)
                                   ->orWhere('username', $loginInput)
                                   ->groupEnd()
                                   ->first();

            if ($user && password_verify($password, $user['password_hash'])) {
                if ($user['status'] !== 'active') {
                    return redirect()->back()->with('error', 'Your account is deactivated.');
                }

                // Check tenant status if hospital user
                if ($user['tenant_id']) {
                    $tenantModel = new TenantModel();
                    $tenant      = $tenantModel->find($user['tenant_id']);
                    if (!$tenant || $tenant['status'] !== 'active') {
                        return redirect()->back()->with('error', 'Hospital subscription is inactive or suspended.');
                    }
                    $tenantName = $tenant['name'];
                } else {
                    $tenantName = 'SaaS Platform';
                }

                session()->set([
                    'user_id'     => $user['id'],
                    'user_name'   => $user['name'],
                    'user_email'  => $user['email'],
                    'user_role'   => $user['role'],
                    'tenant_id'   => $user['tenant_id'],
                    'tenant_name' => $tenantName,
                    'isLoggedIn'  => true,
                ]);

                if ($user['role'] === 'superadmin') {
                    return redirect()->to('superadmin')->with('success', 'Welcome Super Admin!');
                }

                if ($user['role'] === 'doctor') {
                    return redirect()->to('hospital/panel/doctor')->with('success', 'Welcome to Doctor Workstation!');
                }

                return redirect()->to('hospital/dashboard')->with('success', 'Logged in successfully!');
            }

            return redirect()->back()->with('error', 'Invalid email or password.');
        }

        return view('auth/login');
    }

    public function registerHospital()
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'hospital_name' => 'required|min_length[3]',
                'email'         => 'required|valid_email|is_unique[users.email]',
                'password'      => 'required|min_length[6]',
                'phone'         => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $db = \Config\Database::connect();
            $db->transStart();

            $tenantModel = new TenantModel();
            $slug        = url_title($this->request->getPost('hospital_name'), '-', true) . '-' . time();
            
            $tenantId = $tenantModel->insert([
                'name'    => $this->request->getPost('hospital_name'),
                'slug'    => $slug,
                'phone'   => $this->request->getPost('phone'),
                'email'   => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
                'package' => $this->request->getPost('package') ?? 'standard',
                'status'  => 'active',
            ]);

            $userModel = new UserModel();
            $userModel->insert([
                'tenant_id'     => $tenantId,
                'name'          => $this->request->getPost('admin_name'),
                'email'         => $this->request->getPost('email'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role'          => 'hospital_admin',
                'phone'         => $this->request->getPost('phone'),
                'status'        => 'active',
            ]);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->withInput()->with('error', 'Failed to register hospital.');
            }

            return redirect()->to('login')->with('success', 'Hospital registered successfully! Please log in with your credentials.');
        }

        return view('auth/register_hospital');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login')->with('success', 'You have been logged out.');
    }
}
