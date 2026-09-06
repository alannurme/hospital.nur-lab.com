<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Human Resources & Payroll | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-person-workspace me-1"></i> HR & Operations
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Monthly Salary Disbursements</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">HR & Payroll Management</h4>
            <p class="text-muted small mb-0">Employee payroll generation, monthly salary disbursements & staff records for <strong><?= esc(session()->get('tenant_name') ?? 'Nur Lab Hospital') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newSalaryModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Add Staff Salary Record</span>
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background: #e6f4f1; color: #0d7c66;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Active Staff</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= esc($totalStaff) ?> Employees</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Monthly Net Payroll</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">৳ <?= number_format($totalSalary, 0) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Paid Salary Slips</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= esc($paidCount) ?> Paid</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 44px; height: 44px; background: #dcfce7;">
                        <i class="bi bi-check-all fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Pending Salary Slips</span>
                        <h3 class="fw-extrabold text-warning mb-0"><?= esc($pendingCount) ?> Pending</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Bar Card -->
    <div class="card border-0 shadow-sm rounded-4 p-3.5 mb-4 bg-white">
        <form method="get" action="<?= base_url('hospital/hr-payroll') ?>" class="row g-3 align-items-center">
            <div class="col-md-4">
                <label class="form-label fw-bold small text-muted mb-1">Payroll Month</label>
                <select name="month" class="form-select rounded-3 fw-semibold p-2.5" onchange="this.form.submit()" style="font-size: 0.88rem;">
                    <option value="August 2026" <?= $selectedMonth === 'August 2026' ? 'selected' : '' ?>>August 2026 (Current)</option>
                    <option value="July 2026" <?= $selectedMonth === 'July 2026' ? 'selected' : '' ?>>July 2026</option>
                    <option value="June 2026" <?= $selectedMonth === 'June 2026' ? 'selected' : '' ?>>June 2026</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold small text-muted mb-1">Filter Department</label>
                <select name="department" class="form-select rounded-3 fw-semibold p-2.5" onchange="this.form.submit()" style="font-size: 0.88rem;">
                    <option value="">All Hospital Departments</option>
                    <?php foreach ($departments as $d): ?>
                        <option value="<?= esc($d) ?>" <?= $selectedDept === $d ? 'selected' : '' ?>><?= esc($d) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end gap-2 pt-md-3">
                <button type="submit" class="btn btn-emerald rounded-3 px-3.5 py-2.5 fw-bold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                    <i class="bi bi-funnel-fill"></i> Apply Filter
                </button>
                <a href="<?= base_url('hospital/hr-payroll') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2.5 fw-semibold" style="font-size: 0.88rem;">Reset</a>
            </div>
        </form>
    </div>

    <!-- Employee Payroll List Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-table text-success" style="color: #0d7c66 !important;"></i> Employee Payroll List - <?= esc($selectedMonth) ?>
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Showing <?= count($employees) ?> Staff Members
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">EMP Code</th>
                        <th>Staff Name & Contact</th>
                        <th>Role / Designation</th>
                        <th>Department</th>
                        <th>Basic Salary</th>
                        <th>Allowance</th>
                        <th>Deduction</th>
                        <th>Net Salary</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Action / Slip</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="10" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No payroll entries found for the selected filter.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($employees as $emp): ?>
                            <?php $initials = strtoupper(substr($emp['name'], 0, 2)); ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                        <?= esc($emp['employee_code']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; background: #0d7c66; font-size: 0.82rem;">
                                            <?= esc($initials) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.88rem;"><?= esc($emp['name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.72rem;"><i class="bi bi-telephone me-1"></i> <?= esc($emp['mobile']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark" style="font-size: 0.88rem;"><?= esc($emp['role_designation']) ?></div>
                                    <small class="text-muted d-block" style="font-size: 0.72rem;">Joined: <?= esc($emp['joining_date']) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.75rem;">
                                        <?= esc($emp['department']) ?>
                                    </span>
                                </td>
                                <td class="fw-semibold text-secondary font-monospace">৳ <?= number_format($emp['basic_salary'], 2) ?></td>
                                <td class="fw-semibold text-success font-monospace">+৳ <?= number_format($emp['allowance'], 2) ?></td>
                                <td class="fw-semibold text-danger font-monospace">-৳ <?= number_format($emp['deduction'], 2) ?></td>
                                <td>
                                    <strong class="font-monospace" style="color: #0d7c66;">৳ <?= number_format($emp['net_salary'], 2) ?></strong>
                                </td>
                                <td>
                                    <?php if ($emp['payment_status'] === 'Paid'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold">
                                            <i class="bi bi-check-circle-fill me-1"></i> Paid
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1 fw-bold">
                                            <i class="bi bi-clock-history me-1"></i> Pending
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end">
                                    <button type="button" class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="viewPayslip(<?= htmlspecialchars(json_encode($emp)) ?>)">
                                        <i class="bi bi-file-earmark-text-fill me-1"></i> Payslip
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: View Payslip -->
<div class="modal fade" id="payslipModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark" id="slipModalTitle"><i class="bi bi-receipt text-success me-2" style="color: #0d7c66 !important;"></i> Employee Salary Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3 bg-white" id="payslipContent">
                <!-- Dynamically populated via JavaScript -->
            </div>
            <div class="modal-footer border-top border-light pt-3">
                <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;" onclick="window.print()">
                    <i class="bi bi-printer me-1"></i> Print Payslip
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Add New Staff Salary Record -->
<div class="modal fade" id="newSalaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-person-plus-fill text-success me-2" style="color: #0d7c66 !important;"></i> Add Staff Salary & Payroll Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="<?= base_url('hospital/hr-payroll/process') ?>">
                <div class="modal-body pt-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Employee Code</label>
                            <input type="text" name="employee_code" class="form-control rounded-3 p-2.5 fw-semibold" value="EMP-<?= rand(1015, 9999) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Employee Name</label>
                            <input type="text" name="name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Rahim Ahmed" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Role / Designation</label>
                            <input type="text" name="role_designation" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Senior Medical Officer" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Department</label>
                            <input type="text" name="department" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Emergency & ER" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="017xxxxxxxx" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Joining Date</label>
                            <input type="date" name="joining_date" class="form-control rounded-3 p-2.5 fw-semibold" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Basic Salary (৳)</label>
                            <input type="number" step="0.01" name="basic_salary" class="form-control rounded-3 p-2.5 fw-bold" placeholder="50000" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Allowances (৳)</label>
                            <input type="number" step="0.01" name="allowance" class="form-control rounded-3 p-2.5 fw-bold text-success" value="0" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Deduction (৳)</label>
                            <input type="number" step="0.01" name="deduction" class="form-control rounded-3 p-2.5 fw-bold text-danger" value="0" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-muted">Pay Month</label>
                            <input type="text" name="pay_month" class="form-control rounded-3 p-2.5 fw-semibold" value="August 2026" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save & Disburse Salary
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function viewPayslip(emp) {
    const html = `
        <div class="p-3.5 border rounded-4 bg-light mb-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                <div>
                    <h5 class="fw-bold mb-1" style="color: #0d7c66;"><?= esc(session()->get('tenant_name') ?? 'Nur Lab General Hospital') ?></h5>
                    <small class="text-muted d-block"><i class="bi bi-geo-alt me-1"></i> Official Staff Payroll Disbursement Slip</small>
                </div>
                <div class="text-end">
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-bold mb-1">Paid & Disbursed</span>
                    <small class="text-muted d-block">Pay Month: <strong>${emp.pay_month}</strong></small>
                </div>
            </div>
            <div class="row g-3 small">
                <div class="col-6"><strong>Employee Code:</strong> <span class="font-monospace fw-bold" style="color: #0d7c66;">${emp.employee_code}</span></div>
                <div class="col-6"><strong>Staff Name:</strong> ${emp.name}</div>
                <div class="col-6"><strong>Designation:</strong> ${emp.role_designation}</div>
                <div class="col-6"><strong>Department:</strong> ${emp.department}</div>
                <div class="col-6"><strong>Mobile:</strong> ${emp.mobile}</div>
                <div class="col-6"><strong>Joining Date:</strong> ${emp.joining_date}</div>
            </div>
        </div>

        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-calculator-fill text-success me-1" style="color: #0d7c66 !important;"></i> Salary Breakdown & Allowances</h6>
        <div class="table-responsive mb-3">
            <table class="table table-bordered align-middle small">
                <thead class="bg-light text-muted uppercase small">
                    <tr>
                        <th>Earnings / Deductions Description</th>
                        <th class="text-end">Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Basic Monthly Salary</td>
                        <td class="text-end font-monospace fw-bold">৳ ${parseFloat(emp.basic_salary).toLocaleString(undefined, {minimumFractionDigits: 2})}</td>
                    </tr>
                    <tr>
                        <td class="text-success">+ House Rent & Medical Allowance</td>
                        <td class="text-end font-monospace fw-bold text-success">+৳ ${parseFloat(emp.allowance).toLocaleString(undefined, {minimumFractionDigits: 2})}</td>
                    </tr>
                    <tr>
                        <td class="text-danger">- Income Tax & Provident Fund Deduction</td>
                        <td class="text-end font-monospace fw-bold text-danger">-৳ ${parseFloat(emp.deduction).toLocaleString(undefined, {minimumFractionDigits: 2})}</td>
                    </tr>
                </tbody>
                <tfoot class="bg-light">
                    <tr class="fs-6 fw-bold">
                        <td class="text-dark">Net Salary Disbursed:</td>
                        <td class="text-end font-monospace" style="color: #0d7c66;">৳ ${parseFloat(emp.net_salary).toLocaleString(undefined, {minimumFractionDigits: 2})}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="row mt-4 pt-4 text-center text-muted border-top small">
            <div class="col-4">
                <div class="border-top border-dark pt-1 fw-bold">Employee Signature</div>
            </div>
            <div class="col-4">
                <div class="border-top border-dark pt-1 fw-bold">HR Manager</div>
            </div>
            <div class="col-4">
                <div class="border-top border-dark pt-1 fw-bold">Accounts / MD</div>
            </div>
        </div>
    `;
    document.getElementById('payslipContent').innerHTML = html;
    const modal = new bootstrap.Modal(document.getElementById('payslipModal'));
    modal.show();
}
</script>
<?= $this->endSection() ?>
