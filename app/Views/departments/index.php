<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Medical Departments | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Medical Departments Directory</h4>
            <p class="text-muted small mb-0">Manage clinical specialties, active doctors & room assignments for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addDepartmentModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-lg"></i>
                <span>Add Department</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Departments</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($allDepartments) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-building-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Active Specialties</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($allDepartments) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">OPD Chambers</span>
                        <h3 class="fw-extrabold text-dark mb-0">Active</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-door-open-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clinical Departments List Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-building text-success" style="color: #0d7c66 !important;"></i> Clinical Specialties & OPD Rooms
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($allDepartments) ?> Departments
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Department Name</th>
                        <th>Bangla Title</th>
                        <th>Clinical Overview</th>
                        <th>Assigned Doctors</th>
                        <th>Chamber Location</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allDepartments as $deptName => $deptInfo): ?>
                        <?php $docCount = $departmentCounts[$deptName] ?? 0; ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                        <i class="bi <?= $deptInfo['icon'] ?>"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;"><?= esc($deptName) ?></div>
                                        <small class="text-muted" style="font-size: 0.75rem;">ID: DEPT-<?= strtoupper(substr($deptName, 0, 3)) ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold text-success" style="color: #0d7c66 !important; font-size: 0.88rem;"><?= esc($deptInfo['bn']) ?></span>
                            </td>
                            <td>
                                <div class="text-muted small" style="max-width: 260px; font-size: 0.8rem; line-height: 1.4;">
                                    <?= esc($deptInfo['desc']) ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($docCount > 0): ?>
                                    <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-success me-1" style="color: #0d7c66 !important;"></i> <?= sprintf('%02d', $docCount) ?> Doctor<?= $docCount != 1 ? 's' : '' ?></span>
                                <?php else: ?>
                                    <span class="text-muted small"><i class="bi bi-person-badge text-secondary me-1"></i> 0 Doctors</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    <i class="bi bi-door-open text-muted me-1"></i> <?= esc($deptInfo['rooms']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($docCount > 0): ?>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1">0 Active</span>
                                <?php endif; ?>
                            </td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-secondary rounded-3 px-2.5 me-1" style="font-size:0.8rem;" data-bs-toggle="modal" data-bs-target="#editDepartmentModal" onclick="openEditDeptModal('<?= esc($deptName) ?>', '<?= esc($deptInfo['bn']) ?>', '<?= esc($deptInfo['rooms']) ?>', '<?= esc($deptInfo['desc']) ?>')">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger rounded-3 px-2.5" style="font-size:0.8rem;" onclick="if(confirm('Delete <?= esc($deptName) ?>?')) alert('Department deleted!');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark" id="addDepartmentModalLabel">
                    <i class="bi bi-building text-success me-2" style="color: #0d7c66 !important;"></i> Add New Department
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Department added successfully!'); bootstrap.Modal.getInstance(document.getElementById('addDepartmentModal')).hide();">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Department Name (English) *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Oncology / অনকোলজি" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Department Name (Bengali)</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="যেমন: ক্যান্সার ও অনকোলজি বিভাগ">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Assigned Room / Floor</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Room 601 (6th Floor)">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Department Accent</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="primary">Emerald Green</option>
                                <option value="info">Cyan Accent</option>
                                <option value="warning">Orange Accent</option>
                                <option value="purple">Purple Accent</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Description / Service Overview</label>
                        <textarea class="form-control rounded-3 p-2.5 fw-semibold" rows="3" placeholder="Brief overview of clinical services provided..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-emerald w-100 py-2.5 rounded-3 fw-bold text-white shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Department
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Department Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark" id="editDepartmentModalLabel">
                    <i class="bi bi-pencil-square text-success me-2" style="color: #0d7c66 !important;"></i> Edit Department Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Department updated successfully!'); bootstrap.Modal.getInstance(document.getElementById('editDepartmentModal')).hide();">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Department Name (English) *</label>
                        <input type="text" id="edit_dept_name" class="form-control rounded-3 p-2.5 fw-semibold" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Department Name (Bengali)</label>
                        <input type="text" id="edit_dept_bn" class="form-control rounded-3 p-2.5 fw-semibold">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Assigned Room / Floor</label>
                        <input type="text" id="edit_dept_rooms" class="form-control rounded-3 p-2.5 fw-semibold">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Description / Service Overview</label>
                        <textarea id="edit_dept_desc" class="form-control rounded-3 p-2.5 fw-semibold" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-emerald w-100 py-2.5 rounded-3 fw-bold text-white shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Update Department
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openEditDeptModal(name, bn, rooms, desc) {
    document.getElementById('edit_dept_name').value = name;
    document.getElementById('edit_dept_bn').value = bn;
    document.getElementById('edit_dept_rooms').value = rooms;
    document.getElementById('edit_dept_desc').value = desc;
}
</script>
<?= $this->endSection() ?>
