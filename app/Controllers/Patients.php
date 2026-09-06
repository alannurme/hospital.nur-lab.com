<?php

namespace App\Controllers;

use App\Models\PatientModel;

class Patients extends BaseController
{
    public function index()
    {
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->forTenant()->orderBy('created_at', 'DESC')->findAll();
        return view('patients/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $patientModel = new PatientModel();

            $patientCode = 'PAT-' . rand(1000, 9999);

            $patientModel->insert([
                'patient_code'      => $patientCode,
                'name'              => $this->request->getPost('name'),
                'guardian_name'     => $this->request->getPost('guardian_name'),
                'phone'             => $this->request->getPost('phone'),
                'nid_passport'      => $this->request->getPost('nid_passport'),
                'email'             => $this->request->getPost('email'),
                'emergency_contact' => $this->request->getPost('emergency_contact'),
                'age'               => $this->request->getPost('age'),
                'date_of_birth'     => $this->request->getPost('date_of_birth'),
                'gender'            => $this->request->getPost('gender'),
                'blood_group'       => $this->request->getPost('blood_group'),
                'marital_status'    => $this->request->getPost('marital_status'),
                'address'           => $this->request->getPost('address'),
            ]);

            return redirect()->to('hospital/patients')->with('success', 'Patient registered successfully.');
        }

        return view('patients/create');
    }
}
