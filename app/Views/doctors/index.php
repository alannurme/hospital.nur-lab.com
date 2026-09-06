<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Doctor Directory | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Doctors Directory</h4>
            <p class="text-muted small mb-0">Manage active doctors, consultants, and specialists at <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= base_url('hospital/doctors/create') ?>" class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-person-plus-fill"></i>
                <span>Add New Doctor</span>
            </a>
        </div>
    </div>

    <!-- Doctor Directory Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Registered Doctors</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($doctors) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Active OPD Duty</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($doctors) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-stethoscope fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Chamber Status</span>
                        <h3 class="fw-extrabold text-dark mb-0">Live OPD</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-building-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctor List Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-person-badge text-success" style="color: #0d7c66 !important;"></i> Registered Specialists List
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($doctors) ?> Specialists
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Doctor Name</th>
                        <th>Department</th>
                        <th>Specialization</th>
                        <th>Contact / Phone</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($doctors)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-person-badge fs-1 d-block mb-2 opacity-50"></i>
                                No doctors registered yet.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($doctors as $doctor): ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                            <?= strtoupper(substr($doctor['name'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0"><?= esc($doctor['name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.75rem;">Code: DOC-<?= sprintf('%04d', $doctor['id']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.78rem;">
                                        <?= esc($doctor['department']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-secondary small"><i class="bi bi-mortarboard me-1 text-success" style="color: #0d7c66 !important;"></i> <?= esc($doctor['specialization']) ?></div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark small"><i class="bi bi-telephone text-muted me-1"></i> <?= esc($doctor['phone'] ?? 'N/A') ?></div>
                                </td>
                                <td>
                                    <span class="fw-extrabold text-success" style="color: #0d7c66 !important;">৳ <?= number_format($doctor['consultation_fee'], 2) ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Active</span>
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="<?= base_url('hospital/doctors/login-as/' . $doctor['id']) ?>" class="btn btn-sm text-white rounded-3 px-3 me-1 fw-semibold shadow-2xs" style="background: #0d7c66; font-size:0.8rem;" title="Login as Doctor">
                                        <i class="bi bi-box-arrow-in-right me-1"></i> Login As
                                    </a>
                                    <a href="<?= base_url('hospital/doctors/edit/' . $doctor['id']) ?>" class="btn btn-sm btn-outline-secondary rounded-3 px-2.5 me-1" style="font-size:0.8rem;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('hospital/doctors/delete/' . $doctor['id']) ?>" class="btn btn-sm btn-outline-danger rounded-3 px-2.5" style="font-size:0.8rem;" onclick="return confirm('Remove doctor record?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

