<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>Platform Overview<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h3 class="fw-bold text-dark mb-1">SaaS Platform Dashboard</h3>
        <p class="text-muted mb-0">Overview of active hospitals, subscriptions, and system metrics.</p>
    </div>
    <div class="col-auto">
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-shield-check me-1"></i> Super Admin Mode
        </span>
    </div>
</div>

<!-- SaaS Platform Stats -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Hospital Tenants</span>
                <h3 class="fw-bold mb-0 text-dark"><?= $total_tenants ?></h3>
                <small class="text-success fw-semibold"><i class="bi bi-check-circle"></i> <?= $active_tenants ?> Active</small>
            </div>
            <div class="stat-icon bg-primary-subtle text-primary">
                <i class="bi bi-buildings"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Platform Users</span>
                <h3 class="fw-bold mb-0 text-dark"><?= $total_users ?></h3>
                <small class="text-primary fw-semibold"><i class="bi bi-person-check"></i> Registered</small>
            </div>
            <div class="stat-icon bg-info-subtle text-info">
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Total Patients</span>
                <h3 class="fw-bold mb-0 text-dark"><?= $total_patients ?></h3>
                <small class="text-success fw-semibold"><i class="bi bi-heart-pulse"></i> Across Tenants</small>
            </div>
            <div class="stat-icon bg-success-subtle text-success">
                <i class="bi bi-person-wheelchair"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Total Appointments</span>
                <h3 class="fw-bold mb-0 text-dark"><?= $total_appointments ?></h3>
                <small class="text-warning fw-semibold"><i class="bi bi-calendar-check"></i> System-wide</small>
            </div>
            <div class="stat-icon bg-warning-subtle text-warning">
                <i class="bi bi-calendar2-range"></i>
            </div>
        </div>
    </div>
</div>

<!-- Tenants Management Table -->
<div class="card card-custom">
    <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0">Registered Hospital Tenants</h5>
        <a href="<?= base_url('register-hospital') ?>" target="_blank" class="btn btn-sm btn-primary rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Add Hospital Tenant
        </a>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="ps-4">Hospital Name</th>
                        <th>Contact Email</th>
                        <th>Phone</th>
                        <th>Subscription Plan</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tenants)): ?>
                        <tr><td colspan="7" class="text-center py-4 text-muted">No tenants registered yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($tenants as $tenant): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                            <?= strtoupper(substr($tenant['name'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark"><?= esc($tenant['name']) ?></div>
                                            <small class="text-muted">Slug: <?= esc($tenant['slug']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><?= esc($tenant['email']) ?></td>
                                <td><?= esc($tenant['phone']) ?></td>
                                <td><span class="badge bg-secondary-subtle text-secondary text-uppercase"><?= esc($tenant['package']) ?></span></td>
                                <td>
                                    <?php if ($tenant['status'] === 'active'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('M d, Y', strtotime($tenant['created_at'])) ?></td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex align-items-center justify-content-end gap-2">
                                        <?php if ($tenant['status'] === 'active'): ?>
                                            <a href="<?= base_url('superadmin/login-as-tenant/' . $tenant['id']) ?>" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold">
                                                <i class="bi bi-box-arrow-in-right me-1"></i> Login As
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('superadmin/tenant-toggle/' . $tenant['id']) ?>" class="btn btn-sm btn-outline-<?= $tenant['status'] === 'active' ? 'warning' : 'success' ?> rounded-pill px-3">
                                            <?= $tenant['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                                        </a>
                                    </div>
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
