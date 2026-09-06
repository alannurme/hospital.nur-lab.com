<?php

namespace App\Controllers;

use App\Models\EmployeePayrollModel;

class Staff extends BaseController
{
    public function index()
    {
        $payrollModel = new EmployeePayrollModel();
        
        $role = $this->request->getGet('role');
        $builder = $payrollModel->forTenant()->notLike('role_designation', 'Doctor')->notLike('role_designation', 'Consultant')->notLike('role_designation', 'Professor');

        if (!empty($role)) {
            $builder->like('role_designation', $role);
        }

        $staffMembers = $builder->orderBy('id', 'ASC')->findAll();

        $roleModel = new \App\Models\RoleModel();
        $roles = [];
        try {
            $roles = $roleModel->forTenant()->where('status', 'active')->findAll();
        } catch (\Throwable $e) {
            // fallback if table is not created yet
            $roles = [];
        }

        $data = [
            'staffMembers'  => $staffMembers,
            'selectedRole'  => $role,
            'totalStaff'    => count($staffMembers),
            'roles'         => $roles,
        ];

        return view('staff/index', $data);
    }

    public function create()
    {
        $payrollModel = new EmployeePayrollModel();

        $employeeCode    = 'EMP-' . rand(1015, 9999);
        $name            = $this->request->getPost('name');
        $roleDesignation = $this->request->getPost('role_designation');
        $department      = $this->request->getPost('department');
        $shift           = $this->request->getPost('shift') ?? 'Morning';
        $mobile          = $this->request->getPost('mobile');
        $bloodGroup      = $this->request->getPost('blood_group');
        $emergency       = $this->request->getPost('emergency_contact');
        $nidNumber       = $this->request->getPost('nid_number');
        $joiningDate     = $this->request->getPost('joining_date') ?? date('Y-m-d');
        $basicSalary     = floatval($this->request->getPost('basic_salary') ?? 25000);
        $allowance       = floatval($this->request->getPost('allowance') ?? 5000);
        $deduction       = floatval($this->request->getPost('deduction') ?? 500);

        $netSalary = ($basicSalary + $allowance) - $deduction;

        $payrollModel->save([
            'tenant_id'        => session()->get('tenant_id') ?? 1,
            'employee_code'    => $employeeCode,
            'name'             => $name,
            'role_designation' => $roleDesignation,
            'department'       => $department,
            'shift'            => $shift,
            'mobile'           => $mobile,
            'blood_group'      => $bloodGroup,
            'emergency_contact'=> $emergency,
            'nid_number'       => $nidNumber,
            'joining_date'     => $joiningDate,
            'basic_salary'     => $basicSalary,
            'allowance'        => $allowance,
            'deduction'        => $deduction,
            'net_salary'       => $netSalary,
            'payment_status'   => 'Paid',
            'pay_month'        => 'August 2026'
        ]);

        return redirect()->to('hospital/staff')->with('message', 'New hospital staff member registered successfully!');
    }

    public function shifts()
    {
        $payrollModel = new EmployeePayrollModel();

        $selectedShift = $this->request->getGet('shift');
        $selectedDept  = $this->request->getGet('department');

        $builder = $payrollModel->forTenant()
            ->notLike('role_designation', 'Doctor')
            ->notLike('role_designation', 'Consultant')
            ->notLike('role_designation', 'Professor');

        if (!empty($selectedShift)) {
            $builder->where('shift', $selectedShift);
        }

        if (!empty($selectedDept)) {
            $builder->where('department', $selectedDept);
        }

        $allStaff = $builder->orderBy('shift', 'ASC')->findAll();

        $morningCount    = 0;
        $eveningCount    = 0;
        $nightCount      = 0;
        $rotationalCount = 0;

        foreach ($allStaff as $s) {
            $shiftName = strtolower($s['shift'] ?? 'morning');
            if (str_contains($shiftName, 'morning')) {
                $morningCount++;
            } elseif (str_contains($shiftName, 'evening')) {
                $eveningCount++;
            } elseif (str_contains($shiftName, 'night')) {
                $nightCount++;
            } else {
                $rotationalCount++;
            }
        }

        $data = [
            'staffList'       => $allStaff,
            'selectedShift'   => $selectedShift,
            'selectedDept'    => $selectedDept,
            'totalStaff'      => count($allStaff),
            'morningCount'    => $morningCount,
            'eveningCount'    => $eveningCount,
            'nightCount'      => $nightCount,
            'rotationalCount' => $rotationalCount,
        ];

        return view('staff/shifts', $data);
    }

    public function updateShift()
    {
        $payrollModel = new EmployeePayrollModel();

        $staffId  = $this->request->getPost('staff_id');
        $newShift = $this->request->getPost('shift');

        if ($staffId && $newShift) {
            $payrollModel->update($staffId, [
                'shift' => $newShift
            ]);
            return redirect()->to('hospital/staff/shifts')->with('message', 'Staff duty shift updated successfully!');
        }

        return redirect()->to('hospital/staff/shifts')->with('error', 'Failed to update duty shift.');
    }
}
