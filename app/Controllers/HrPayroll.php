<?php

namespace App\Controllers;

use App\Models\EmployeePayrollModel;

class HrPayroll extends BaseController
{
    public function index()
    {
        $payrollModel = new EmployeePayrollModel();
        
        $month = $this->request->getGet('month') ?? 'August 2026';
        $department = $this->request->getGet('department');
        
        $builder = $payrollModel->where('pay_month', $month);
        
        if (!empty($department)) {
            $builder->where('department', $department);
        }

        $employees = $builder->orderBy('id', 'ASC')->findAll();
        
        // Calculate totals dynamically
        $totalStaff = count($employees);
        $totalSalary = 0;
        $paidCount = 0;
        $pendingCount = 0;

        foreach ($employees as $emp) {
            $totalSalary += $emp['net_salary'];
            if ($emp['payment_status'] === 'Paid') {
                $paidCount++;
            } else {
                $pendingCount++;
            }
        }

        // Get unique departments for filter dropdown
        $db = \Config\Database::connect();
        $deptQuery = $db->query("SELECT DISTINCT department FROM employee_payrolls WHERE tenant_id = 1 ORDER BY department ASC");
        $departments = array_column($deptQuery->getResultArray(), 'department');

        $data = [
            'employees'     => $employees,
            'totalStaff'    => $totalStaff,
            'totalSalary'   => $totalSalary,
            'paidCount'     => $paidCount,
            'pendingCount'  => $pendingCount,
            'selectedMonth' => $month,
            'selectedDept'  => $department,
            'departments'   => $departments
        ];

        return view('hr_payroll/index', $data);
    }

    public function processSalary()
    {
        $payrollModel = new EmployeePayrollModel();
        
        $employeeCode    = $this->request->getPost('employee_code');
        $name            = $this->request->getPost('name');
        $roleDesignation = $this->request->getPost('role_designation');
        $department      = $this->request->getPost('department');
        $mobile          = $this->request->getPost('mobile');
        $joiningDate     = $this->request->getPost('joining_date');
        $basicSalary     = floatval($this->request->getPost('basic_salary'));
        $allowance       = floatval($this->request->getPost('allowance'));
        $deduction       = floatval($this->request->getPost('deduction'));
        $payMonth        = $this->request->getPost('pay_month') ?? 'August 2026';

        $netSalary = ($basicSalary + $allowance) - $deduction;

        $payrollModel->save([
            'tenant_id'        => session()->get('tenant_id') ?? 1,
            'employee_code'    => $employeeCode,
            'name'             => $name,
            'role_designation' => $roleDesignation,
            'department'       => $department,
            'mobile'           => $mobile,
            'joining_date'     => $joiningDate,
            'basic_salary'     => $basicSalary,
            'allowance'        => $allowance,
            'deduction'        => $deduction,
            'net_salary'       => $netSalary,
            'payment_status'   => 'Paid',
            'pay_month'        => $payMonth
        ]);

        return redirect()->to(base_url('hospital/hr-payroll'))->with('message', 'Employee Salary Slip & Payroll entry added successfully!');
    }
}
