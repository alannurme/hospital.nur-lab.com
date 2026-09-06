<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Receptionist & Front Desk Panel<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Front Desk Console</span>
        <h3 class="fw-bold text-dark mb-1">Receptionist Desk Dashboard 🛎️</h3>
        <p class="text-muted mb-0">Visitor check-in, OPD token issuing & appointment booking console for <?= session()->get('tenant_name') ?>.</p>
    </div>
    <div class="col-auto d-flex gap-2">
        <a href="<?= base_url('hospital/patients/create') ?>" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-person-plus me-1"></i> Quick Patient Register
        </a>
        <a href="<?= base_url('hospital/appointments') ?>" class="btn btn-info text-white rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-ticket-perforated me-1"></i> Issue OPD Token
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-md-3">
        <div class="card card-custom p-4">
            <span class="text-muted small fw-medium d-block mb-1">Today's Visitors / Walk-ins</span>
            <h2 class="fw-extrabold text-dark mb-0">48 Visitors</h2>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card card-custom p-4">
            <span class="text-muted small fw-medium d-block mb-1">Tokens Issued Today</span>
            <h2 class="fw-extrabold text-info mb-0">34 Tokens</h2>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card card-custom p-4">
            <span class="text-muted small fw-medium d-block mb-1">Doctor Availability</span>
            <h2 class="fw-extrabold text-success mb-0">08 On Duty</h2>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card card-custom p-4">
            <span class="text-muted small fw-medium d-block mb-1">Available Beds/Cabins</span>
            <h2 class="fw-extrabold text-warning mb-0">11 Beds Free</h2>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
