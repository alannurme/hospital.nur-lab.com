<?php

namespace App\Models;

class PatientModel extends BaseTenantModel
{
    protected $table            = 'patients';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tenant_id', 'patient_code', 'name', 'phone', 'age', 'gender', 'blood_group', 'address'];
}
