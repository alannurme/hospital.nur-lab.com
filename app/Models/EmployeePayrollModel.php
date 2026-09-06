<?php

namespace App\Models;

class EmployeePayrollModel extends BaseTenantModel
{
    protected $table            = 'employee_payrolls';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'tenant_id',
        'employee_code',
        'name',
        'role_designation',
        'department',
        'shift',
        'mobile',
        'blood_group',
        'emergency_contact',
        'nid_number',
        'joining_date',
        'basic_salary',
        'allowance',
        'deduction',
        'net_salary',
        'payment_status',
        'pay_month'
    ];
}
