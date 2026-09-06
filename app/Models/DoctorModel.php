<?php

namespace App\Models;

class DoctorModel extends BaseTenantModel
{
    protected $table            = 'doctors';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tenant_id', 'user_id', 'name', 'bmdc_reg_no', 'department', 'designation', 'specialization', 'consultation_fee', 'followup_fee', 'room_no', 'visiting_days', 'visiting_time', 'phone'];
}
