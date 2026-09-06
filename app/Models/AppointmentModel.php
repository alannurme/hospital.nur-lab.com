<?php

namespace App\Models;

class AppointmentModel extends BaseTenantModel
{
    protected $table            = 'appointments';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tenant_id', 'patient_id', 'doctor_id', 'appointment_date', 'fee', 'status', 'notes'];

    public function getAppointmentsWithDetails()
    {
        return $this->forTenant()
                    ->select('appointments.*, patients.name as patient_name, patients.patient_code, doctors.name as doctor_name, doctors.department')
                    ->join('patients', 'patients.id = appointments.patient_id')
                    ->join('doctors', 'doctors.id = appointments.doctor_id')
                    ->orderBy('appointments.appointment_date', 'DESC')
                    ->findAll();
    }
}
