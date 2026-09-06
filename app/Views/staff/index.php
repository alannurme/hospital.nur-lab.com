<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Staff Directory | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Hospital Staff Directory</h4>
            <p class="text-muted small mb-0">Nurses, Lab Technologists, Radiographers, Pharmacists & Support Staff for <strong><?= esc(session()->get('tenant_name') ?? 'Nur Lab Hospital') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addStaffModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-person-plus-fill"></i>
                <span>Add Staff Member</span>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Total Staff Members</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= esc($totalStaff) ?></h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Nursing & ICU</span>
                        <h3 class="fw-extrabold text-dark mb-0">Active</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-heart-pulse-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Lab Technologists</span>
                        <h3 class="fw-extrabold text-dark mb-0">On Duty</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-flask-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Shift Coverage</span>
                        <h3 class="fw-extrabold text-dark mb-0">24/7</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Bar Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-3.5 mb-4">
        <form method="get" action="<?= base_url('hospital/staff') ?>" class="row g-3 align-items-center">
            <div class="col-md-5">
                <label class="form-label fw-bold small text-muted mb-1">Filter by Staff Role / Designation</label>
                <select name="role" class="form-select rounded-3 fw-semibold p-2.5" onchange="this.form.submit()" style="font-size: 0.88rem;">
                    <option value="">All Hospital Staff Roles</option>
                    <option value="Nurse" <?= $selectedRole === 'Nurse' ? 'selected' : '' ?>>Nursing Staff & ICU</option>
                    <option value="Technologist" <?= $selectedRole === 'Technologist' ? 'selected' : '' ?>>Lab Technologists</option>
                    <option value="Radiographer" <?= $selectedRole === 'Radiographer' ? 'selected' : '' ?>>Radiographers & X-Ray</option>
                    <option value="Pharmacist" <?= $selectedRole === 'Pharmacist' ? 'selected' : '' ?>>Pharmacists</option>
                    <option value="Officer" <?= $selectedRole === 'Officer' ? 'selected' : '' ?>>Administrative Officers</option>
                </select>
            </div>

            <div class="col-md-7 d-flex align-items-center justify-content-end gap-2 pt-md-3">
                <span class="badge bg-light text-dark border px-3 py-2.5 rounded-pill fw-semibold" style="font-size: 0.82rem;">
                    Total Listed: <?= esc($totalStaff) ?> Employees
                </span>
                <?php if (!empty($selectedRole)): ?>
                    <a href="<?= base_url('hospital/staff') ?>" class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-2 fw-semibold" style="font-size: 0.82rem;">
                        <i class="bi bi-x-circle me-1"></i> Clear Filter
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Staff Grid Cards -->
    <div class="row g-4 mb-4">
        <?php if (empty($staffMembers)): ?>
            <div class="col-12 text-center py-5 text-muted card border-0 shadow-sm rounded-4 bg-white p-5">
                <i class="bi bi-people fs-1 d-block mb-2 opacity-50 text-success" style="color: #0d7c66 !important;"></i>
                No hospital staff members found for the selected filter.
            </div>
        <?php else: ?>
            <?php foreach ($staffMembers as $staff): ?>
                <?php 
                    $initials = strtoupper(substr($staff['name'], 0, 2));
                ?>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1 font-monospace" style="font-size: 0.72rem;">
                                <?= esc($staff['employee_code']) ?>
                            </span>
                        </div>

                        <div class="avatar-circle mx-auto mb-3 text-white fw-extrabold d-flex align-items-center justify-content-center shadow-sm" style="width:62px; height:62px; font-size:1.35rem; background: #0d7c66; border-radius: 50%;">
                            <?= esc($initials) ?>
                        </div>

                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.08rem;"><?= esc($staff['name']) ?></h5>
                        
                        <div class="mb-2">
                            <span class="badge border rounded-pill px-3 py-1 fw-semibold small" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                                <?= esc($staff['role_designation']) ?>
                            </span>
                        </div>

                        <div class="text-muted small mb-3">
                            <i class="bi bi-building me-1 text-success" style="color: #0d7c66 !important;"></i> <?= esc($staff['department']) ?>
                        </div>

                        <div class="pt-3 border-top mt-auto text-start small space-y-1">
                            <div class="d-flex align-items-center justify-content-between mb-1.5">
                                <span class="text-muted"><i class="bi bi-telephone text-success me-1" style="color: #0d7c66 !important;"></i> Phone:</span>
                                <strong class="text-dark"><?= esc($staff['mobile']) ?></strong>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1.5">
                                <span class="text-muted"><i class="bi bi-clock text-secondary me-1"></i> Shift:</span>
                                <span class="fw-semibold text-dark"><?= esc($staff['shift'] ?? 'Morning') ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-muted"><i class="bi bi-cash-stack text-warning me-1"></i> Net Salary:</span>
                                <strong class="font-monospace" style="color: #0d7c66;">৳ <?= number_format($staff['net_salary'], 0) ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Modal: Add New Staff Member -->
<div class="modal fade" id="addStaffModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg p-2 bg-white">
            <div class="modal-header border-bottom border-light pb-3 px-3">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-person-plus-fill me-2" style="color: #0d7c66;"></i> Register New Staff Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="<?= base_url('hospital/staff/create') ?>">
                <div class="modal-body p-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Staff Full Name *</label>
                            <input type="text" name="name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Sharmin Sultana" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Role / Designation *</label>
                            <select name="role_designation" class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="">Select Hospital Role...</option>
                                <?php if (!empty($roles)): ?>
                                    <?php foreach ($roles as $r): ?>
                                        <option value="<?= esc($r['role_name']) ?>"><?= esc($r['role_name']) ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="Senior Staff Nurse">Senior Staff Nurse</option>
                                    <option value="Medical Lab Technologist">Medical Lab Technologist</option>
                                    <option value="Hospital Pharmacist">Hospital Pharmacist</option>
                                    <option value="Radiographer & X-Ray Tech">Radiographer & X-Ray Tech</option>
                                    <option value="Front Desk Executive">Front Desk Executive</option>
                                    <option value="Billing & Accounts Officer">Billing & Accounts Officer</option>
                                    <option value="OT Assistant">OT Assistant</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Assigned Shift *</label>
                            <select name="shift" class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Morning">Morning Shift (08:00 AM - 02:00 PM)</option>
                                <option value="Evening">Evening Shift (02:00 PM - 08:00 PM)</option>
                                <option value="Night">Night Shift (08:00 PM - 08:00 AM)</option>
                                <option value="Rotational">Rotational Roster</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Mobile Phone Number *</label>
                            <input type="tel" name="mobile" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711223344" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">NID / Passport Number</label>
                            <input type="text" name="nid_number" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. 1990261928172">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Blood Group</label>
                            <select name="blood_group" class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Emergency Contact No.</label>
                            <input type="tel" name="emergency_contact" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="Emergency Relative Mobile">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Joining Date</label>
                            <input type="date" name="joining_date" class="form-control rounded-3 p-2.5 fw-semibold" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-muted">Monthly Basic Salary (৳) *</label>
                            <input type="number" step="0.01" name="basic_salary" class="form-control rounded-3 p-2.5 fw-bold" placeholder="28000" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3 px-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 fw-bold text-white shadow-sm" style="background: #0d7c66; border: none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Register Staff
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
