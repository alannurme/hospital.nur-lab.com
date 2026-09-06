<?php

namespace App\Controllers;

use App\Models\LabReportModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;

class LabReports extends BaseController
{
    public function index()
    {
        $labReportModel = new LabReportModel();
        $patientModel   = new PatientModel();
        $doctorModel    = new DoctorModel();

        $data = [
            'reports'  => $labReportModel->getReportsWithDetails(),
            'patients' => $patientModel->forTenant()->findAll(),
            'doctors'  => $doctorModel->forTenant()->findAll(),
        ];

        return view('lab_reports/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            $labReportModel = new LabReportModel();

            $labReportModel->insert([
                'patient_id'     => $this->request->getPost('patient_id'),
                'doctor_id'      => $this->request->getPost('doctor_id'),
                'test_name'      => $this->request->getPost('test_name'),
                'category'       => $this->request->getPost('category'),
                'result_summary' => $this->request->getPost('result_summary'),
                'fee'            => $this->request->getPost('fee'),
                'status'         => 'completed',
            ]);

            return redirect()->to('lab-reports')->with('success', 'Lab Report generated successfully.');
        }

        return redirect()->to('lab-reports');
    }
}
