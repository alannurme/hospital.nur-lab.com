<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>Revenue Analytics & Metrics<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h3 class="fw-bold text-dark mb-1">Revenue Analytics & Platform Metrics</h3>
        <p class="text-muted mb-0">Track platform ARR, MRR, active hospital subscriptions, and system usage.</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Estimated MRR</span>
                <h2 class="fw-extrabold mb-0 text-success">৳ <?= number_format($monthly_revenue, 2) ?></h2>
                <small class="text-success fw-semibold"><i class="bi bi-arrow-up-right"></i> Monthly Recurring</small>
            </div>
            <div class="stat-icon bg-success-subtle text-success">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Active Tenants</span>
                <h2 class="fw-extrabold mb-0 text-dark"><?= $total_tenants ?></h2>
                <small class="text-primary fw-semibold"><i class="bi bi-buildings"></i> Registered</small>
            </div>
            <div class="stat-icon bg-primary-subtle text-primary">
                <i class="bi bi-buildings"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">System Users</span>
                <h2 class="fw-extrabold mb-0 text-dark"><?= $total_users ?></h2>
                <small class="text-info fw-semibold"><i class="bi bi-person-check"></i> Across platform</small>
            </div>
            <div class="stat-icon bg-info-subtle text-info">
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">System Patients</span>
                <h2 class="fw-extrabold mb-0 text-dark"><?= $total_patients ?></h2>
                <small class="text-warning fw-semibold"><i class="bi bi-heart-pulse"></i> Data isolated</small>
            </div>
            <div class="stat-icon bg-warning-subtle text-warning">
                <i class="bi bi-heart-pulse"></i>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
