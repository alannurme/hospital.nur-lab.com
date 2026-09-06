<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Pharmacist & Dispensing Console<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Pharmacy Sales Desk</span>
        <h3 class="fw-bold text-dark mb-1">Pharmacist Dispensing Console 💊</h3>
        <p class="text-muted mb-0">Doctor e-prescription parsing, medicine billing & OTC counter sales for <?= session()->get('tenant_name') ?>.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('hospital/pharmacy') ?>" class="btn btn-danger rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-capsule me-1"></i> Dispense Medicines
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Prescriptions Dispensed Today</h6>
            <h2 class="fw-extrabold text-danger my-2">42 Orders</h2>
            <small class="text-muted">OPD & IPD Patients</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Pharmacy Revenue Today</h6>
            <h2 class="fw-extrabold text-success my-2">৳ 38,500</h2>
            <small class="text-success fw-semibold">Cash & Digital Payments</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Low Stock Alerts</h6>
            <h2 class="fw-extrabold text-warning my-2">03 Items</h2>
            <small class="text-warning fw-semibold">Paracetamol Syrup Low</small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
