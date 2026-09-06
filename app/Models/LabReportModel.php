<?php

namespace App\Models;

class LabReportModel extends BaseTenantModel
{
    protected $table         = 'lab_reports';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['tenant_id', 'patient_id', 'doctor_id', 'test_name', 'category', 'result_summary', 'fee', 'status'];

    public function getReportsWithDetails()
    {
        return $this->forTenant()
                    ->select('lab_reports.*, patients.name as patient_name, patients.patient_code, doctors.name as doctor_name')
                    ->join('patients', 'patients.id = lab_reports.patient_id')
                    ->join('doctors', 'doctors.id = lab_reports.doctor_id', 'left')
                    ->orderBy('lab_reports.created_at', 'DESC')
                    ->findAll();
    }
}
