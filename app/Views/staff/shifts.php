<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Shift Management & Duty Roster | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Page Header & Actions -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">HR & Operations</span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Duty Roster Scheduling</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Shift Management & Duty Roster</h4>
            <p class="text-muted small mb-0">Monitor hospital staff shifts (Morning, Evening, Night), assign schedules, and export rosters.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-outline-secondary rounded-3 px-3.5 py-2 d-inline-flex align-items-center gap-2 shadow-sm" onclick="window.print()" style="font-size: 0.88rem;">
                <i class="bi bi-printer"></i>
                <span>Print Roster</span>
            </button>
            <a href="<?= base_url('hospital/staff') ?>" class="btn btn-emerald rounded-3 px-3.5 py-2 d-inline-flex align-items-center gap-2 shadow-sm text-white" style="background: #0d7c66; border:none; font-size: 0.88rem;">
                <i class="bi bi-people-fill"></i>
                <span>All Staff Directory</span>
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert" style="background: #e6f4f1; color: #0d7c66;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Shift Overview Statistics Cards -->
    <div class="row g-3 mb-4">
        <!-- Morning Shift Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 h-100 position-relative overflow-hidden bg-white" style="border-left: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block">Morning Shift</span>
                        <h3 class="fw-extrabold text-dark mb-0 mt-1"><?= $morningCount ?> <span class="fs-6 fw-normal text-muted">Staff</span></h3>
                        <span class="badge border fw-semibold mt-2" style="font-size: 0.72rem; background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                            <i class="bi bi-clock me-1"></i> 08:00 AM - 02:00 PM
                        </span>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-brightness-high-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evening Shift Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 h-100 position-relative overflow-hidden bg-white" style="border-left: 4px solid #d97706 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block">Evening Shift</span>
                        <h3 class="fw-extrabold text-dark mb-0 mt-1"><?= $eveningCount ?> <span class="fs-6 fw-normal text-muted">Staff</span></h3>
                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle fw-semibold mt-2" style="font-size: 0.72rem;">
                            <i class="bi bi-clock me-1"></i> 02:00 PM - 08:00 PM
                        </span>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-sun-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Night Shift Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 h-100 position-relative overflow-hidden bg-white" style="border-left: 4px solid #7e22ce !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block">Night Shift</span>
                        <h3 class="fw-extrabold text-dark mb-0 mt-1"><?= $nightCount ?> <span class="fs-6 fw-normal text-muted">Staff</span></h3>
                        <span class="badge fw-semibold mt-2" style="font-size: 0.72rem; color:#7e22ce; background:#f3e8ff; border: 1px solid #e9d5ff;">
                            <i class="bi bi-moon-stars-fill me-1"></i> 08:00 PM - 08:00 AM
                        </span>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #f3e8ff; color: #7e22ce;">
                        <i class="bi bi-moon-stars-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rotational Shift Card -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 h-100 position-relative overflow-hidden bg-white" style="border-left: 4px solid #0284c7 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block">Rotational / On-Call</span>
                        <h3 class="fw-extrabold text-dark mb-0 mt-1"><?= $rotationalCount ?> <span class="fs-6 fw-normal text-muted">Staff</span></h3>
                        <span class="badge bg-info-subtle text-info border border-info-subtle fw-semibold mt-2" style="font-size: 0.72rem;">
                            <i class="bi bi-arrow-repeat me-1"></i> Flexible Schedule
                        </span>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-arrow-repeat fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Toolbar -->
    <div class="card border-0 shadow-sm rounded-4 p-3.5 mb-4 bg-white">
        <form method="get" action="<?= base_url('hospital/staff/shifts') ?>" class="row g-3 align-items-center">
            <div class="col-12 col-md-4">
                <label class="form-label small fw-bold text-muted mb-1">Filter Duty Shift</label>
                <select name="shift" class="form-select rounded-3 fw-semibold p-2.5" onchange="this.form.submit()" style="font-size: 0.88rem;">
                    <option value="">All Shifts (<?= $totalStaff ?> Staff)</option>
                    <option value="Morning" <?= $selectedShift === 'Morning' ? 'selected' : '' ?>>Morning Shift (08:00 AM - 02:00 PM)</option>
                    <option value="Evening" <?= $selectedShift === 'Evening' ? 'selected' : '' ?>>Evening Shift (02:00 PM - 08:00 PM)</option>
                    <option value="Night" <?= $selectedShift === 'Night' ? 'selected' : '' ?>>Night Shift (08:00 PM - 08:00 AM)</option>
                    <option value="Rotational" <?= $selectedShift === 'Rotational' ? 'selected' : '' ?>>Rotational / On-Call</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label small fw-bold text-muted mb-1">Filter Department</label>
                <select name="department" class="form-select rounded-3 fw-semibold p-2.5" onchange="this.form.submit()" style="font-size: 0.88rem;">
                    <option value="">All Hospital Departments</option>
                    <option value="Nursing & Ward" <?= $selectedDept === 'Nursing & Ward' ? 'selected' : '' ?>>Nursing & Ward</option>
                    <option value="Pathology & Lab" <?= $selectedDept === 'Pathology & Lab' ? 'selected' : '' ?>>Pathology & Lab</option>
                    <option value="Pharmacy" <?= $selectedDept === 'Pharmacy' ? 'selected' : '' ?>>Pharmacy</option>
                    <option value="Front Desk & Administration" <?= $selectedDept === 'Front Desk & Administration' ? 'selected' : '' ?>>Front Desk & Administration</option>
                    <option value="Accounts & Finance" <?= $selectedDept === 'Accounts & Finance' ? 'selected' : '' ?>>Accounts & Finance</option>
                    <option value="ICU & CCU" <?= $selectedDept === 'ICU & CCU' ? 'selected' : '' ?>>ICU & CCU</option>
                    <option value="Emergency & Ambulance" <?= $selectedDept === 'Emergency & Ambulance' ? 'selected' : '' ?>>Emergency & Ambulance</option>
                </select>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-end gap-2 pt-md-3">
                <button type="submit" class="btn btn-emerald rounded-3 px-3.5 py-2.5 fw-bold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                    <i class="bi bi-funnel-fill"></i> Filter Roster
                </button>
                <a href="<?= base_url('hospital/staff/shifts') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2.5 fw-semibold" style="font-size: 0.88rem;">Reset</a>
            </div>
        </form>
    </div>

    <!-- Staff Shift Roster Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-week text-success" style="color: #0d7c66 !important;"></i> Live Shift Duty Roster Table
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Total Assigned: <?= count($staffList) ?> Staff Members
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Staff Member</th>
                        <th>Role & Department</th>
                        <th>Current Shift</th>
                        <th>Contact / Mobile</th>
                        <th>Emergency Contact</th>
                        <th class="text-end pe-4">Manage Shift</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($staffList)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No staff members found matching the selected shift filters.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($staffList as $staff): ?>
                            <?php 
                                $shift = $staff['shift'] ?? 'Morning';
                                $shiftBadgeClass = 'bg-info-subtle text-info border-info-subtle';
                                $shiftIcon = 'bi-brightness-high-fill';

                                if (str_contains(strtolower($shift), 'evening')) {
                                    $shiftBadgeClass = 'bg-warning-subtle text-warning border-warning-subtle';
                                    $shiftIcon = 'bi-sun-fill';
                                } elseif (str_contains(strtolower($shift), 'night')) {
                                    $shiftBadgeClass = 'bg-purple-subtle text-purple border-purple-subtle';
                                    $shiftIcon = 'bi-moon-stars-fill';
                                } elseif (str_contains(strtolower($shift), 'rotational')) {
                                    $shiftBadgeClass = 'bg-success-subtle text-success border-success-subtle';
                                    $shiftIcon = 'bi-arrow-repeat';
                                }
                            ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; font-size: 0.95rem; background: #0d7c66;">
                                            <?= strtoupper(substr($staff['name'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0"><?= esc($staff['name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.78rem;">
                                                ID: <span class="fw-semibold text-secondary"><?= esc($staff['employee_code'] ?? 'N/A') ?></span>
                                                • Blood: <span class="badge bg-danger-subtle text-danger p-1" style="font-size: 0.7rem;"><?= esc($staff['blood_group'] ?? 'O+') ?></span>
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark"><?= esc($staff['role_designation'] ?? 'Staff') ?></div>
                                    <small class="text-muted d-block"><?= esc($staff['department'] ?? 'General') ?></small>
                                </td>
                                <td>
                                    <span class="badge border <?= $shiftBadgeClass ?> px-3 py-1.5 rounded-pill fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.8rem;">
                                        <i class="bi <?= $shiftIcon ?>"></i> <?= esc($shift) ?> Shift
                                    </span>
                                </td>
                                <td>
                                    <div class="text-dark fw-semibold" style="font-size: 0.88rem;">
                                        <i class="bi bi-telephone-fill text-muted me-1 small"></i> <?= esc($staff['mobile'] ?? 'N/A') ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-muted small">
                                        <i class="bi bi-telephone-plus me-1 text-danger"></i> <?= esc($staff['emergency_contact'] ?? 'N/A') ?>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold d-inline-flex align-items-center gap-1 shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.82rem;"
                                            onclick="openShiftModal(<?= $staff['id'] ?>, '<?= esc($staff['name'], 'js') ?>', '<?= esc($staff['shift'], 'js') ?>')">
                                        <i class="bi bi-pencil-square"></i> Change Shift
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

<!-- Modal: Shift Assignment / Swap Modal -->
<div class="modal fade" id="shiftUpdateModal" tabindex="-1" aria-labelledby="shiftUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark" id="shiftUpdateModalLabel">
                    <i class="bi bi-clock-history text-success me-2" style="color: #0d7c66 !important;"></i> Update Duty Shift Assignment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('hospital/staff/shifts/update') ?>" method="post">
                <div class="modal-body pt-3">
                    <input type="hidden" name="staff_id" id="modalStaffId">
                    
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold">Staff Name</label>
                        <input type="text" class="form-control rounded-3 p-2.5 bg-light fw-bold text-dark" id="modalStaffName" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold">Assigned Shift *</label>
                        <select name="shift" id="modalShiftSelect" class="form-select rounded-3 p-2.5 fw-semibold" required>
                            <option value="Morning">Morning Shift (08:00 AM - 02:00 PM)</option>
                            <option value="Evening">Evening Shift (02:00 PM - 08:00 PM)</option>
                            <option value="Night">Night Shift (08:00 PM - 08:00 AM)</option>
                            <option value="Rotational">Rotational / On-Call</option>
                        </select>
                    </div>

                    <div class="alert border-0 rounded-3 p-3 mb-0" style="font-size: 0.85rem; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-info-circle-fill me-1"></i>
                        Updating staff duty shift will automatically adjust their roster schedules and attendance tracking.
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Duty Shift
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openShiftModal(staffId, staffName, currentShift) {
    document.getElementById('modalStaffId').value = staffId;
    document.getElementById('modalStaffName').value = staffName;
    
    var select = document.getElementById('modalShiftSelect');
    select.value = currentShift || 'Morning';
    
    var modal = new bootstrap.Modal(document.getElementById('shiftUpdateModal'));
    modal.show();
}
</script>
<?= $this->endSection() ?>
