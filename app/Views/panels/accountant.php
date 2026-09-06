<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Billing & Accounts Executive Panel<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Hospital Cash Counter</span>
        <h3 class="fw-bold text-dark mb-1">Accountant & Billing Console 💳</h3>
        <p class="text-muted mb-0">Patient discharge invoices, advance deposits, OPD fees & ledger management for <?= session()->get('tenant_name') ?>.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('hospital/billing') ?>" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-receipt me-1"></i> Collect Payment & Invoice
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Today's Cash Collection</h6>
            <h2 class="fw-extrabold text-success my-2">৳ 1,12,000</h2>
            <small class="text-muted">OPD, IPD & Diagnostics</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Pending Due Invoices</h6>
            <h2 class="fw-extrabold text-warning my-2">৳ 45,000</h2>
            <small class="text-warning fw-semibold">Discharge Bills Pending</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Discharge Bills Cleared</h6>
            <h2 class="fw-extrabold text-primary my-2">08 Invoices</h2>
            <small class="text-muted">Full Settlement Done</small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
