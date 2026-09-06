<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Patient Directory | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Register Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Patient Directory</h4>
            <p class="text-muted small mb-0">Manage active patient EMR records & registration at <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= base_url('hospital/patients/create') ?>" class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-person-plus-fill"></i>
                <span>Register New Patient</span>
            </a>
        </div>
    </div>

    <!-- Patient Directory Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total EMR Patients</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($patients) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Active Outpatient (OPD)</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($patients) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-folder-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Blood Bank Profiles</span>
                        <h3 class="fw-extrabold text-dark mb-0">Recorded</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef2f2; color: #ef4444;">
                        <i class="bi bi-droplet-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Patient List Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-folder text-success" style="color: #0d7c66 !important;"></i> Registered Patient EMR Table
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($patients) ?> Records
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Code & Name</th>
                        <th>Phone Number</th>
                        <th>Age / Gender</th>
                        <th>Blood Group</th>
                        <th>Address</th>
                        <th class="pe-4 text-end">Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($patients)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-person-x fs-1 d-block mb-2 opacity-50"></i>
                                No patients registered yet.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($patients as $patient): ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                            <?= strtoupper(substr($patient['name'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0"><?= esc($patient['name']) ?></div>
                                            <small class="text-success fw-bold" style="font-size: 0.75rem; color: #0d7c66 !important;"><?= esc($patient['patient_code']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark small"><i class="bi bi-telephone text-muted me-1"></i> <?= esc($patient['phone']) ?></div>
                                </td>
                                <td>
                                    <span class="fw-semibold text-secondary small"><?= esc($patient['age']) ?> Yrs / <?= esc($patient['gender']) ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                                        <?= esc($patient['blood_group'] ?? 'N/A') ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="text-muted small" style="max-width: 250px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                        <?= esc($patient['address'] ?? 'N/A') ?>
                                    </div>
                                </td>
                                <td class="pe-4 text-end text-muted small fw-semibold">
                                    <?= date('M d, Y', strtotime($patient['created_at'])) ?>
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

