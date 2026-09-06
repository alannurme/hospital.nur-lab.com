<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;

class Appointments extends BaseController
{
    public function index()
    {
        $appointmentModel = new AppointmentModel();
        $patientModel     = new PatientModel();
        $doctorModel      = new DoctorModel();

        $data = [
            'appointments' => $appointmentModel->getAppointmentsWithDetails(),
            'patients'     => $patientModel->forTenant()->findAll(),
            'doctors'      => $doctorModel->forTenant()->findAll(),
        ];

        return view('appointments/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $appointmentModel = new AppointmentModel();

            $appointmentModel->insert([
                'patient_id'       => $this->request->getPost('patient_id'),
                'doctor_id'        => $this->request->getPost('doctor_id'),
                'appointment_date' => $this->request->getPost('appointment_date'),
                'fee'              => $this->request->getPost('fee'),
                'notes'            => $this->request->getPost('notes'),
                'status'           => 'confirmed',
            ]);

            return redirect()->to('appointments')->with('success', 'Appointment booked successfully.');
        }

        return redirect()->to('appointments');
    }
}
