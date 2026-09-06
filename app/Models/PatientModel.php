<?php

namespace App\Models;

class PatientModel extends BaseTenantModel
{
    protected $table            = 'patients';
    protected $allowedFields    = [
        'tenant_id',
        'patient_code',
        'name',
        'guardian_name',
        'phone',
        'nid_passport',
        'email',
        'emergency_contact',
        'age',
        'date_of_birth',
        'gender',
        'blood_group',
        'marital_status',
        'address'
    ];
}
