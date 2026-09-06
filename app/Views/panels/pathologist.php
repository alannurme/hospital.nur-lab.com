<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Pathologist & Lab Technician Panel<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-secondary-subtle text-dark border border-secondary-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">Diagnostic Lab Desk</span>
        <h3 class="fw-bold text-dark mb-1">Pathologist Workstation 🔬</h3>
        <p class="text-muted mb-0">Pathology sample collection, test entry, medical lab verification & report delivery for <?= session()->get('tenant_name') ?>.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('hospital/lab-reports') ?>" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-journal-medical me-1"></i> Generate Lab Report
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Pending Sample Collection</h6>
            <h2 class="fw-extrabold text-warning my-2">09 Samples</h2>
            <small class="text-muted">Blood & Urine Tubes</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Tests In-Analysis</h6>
            <h2 class="fw-extrabold text-info my-2">14 Tests</h2>
            <small class="text-muted">CBC, Lipid Profile, LFT</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Verified Reports Today</h6>
            <h2 class="fw-extrabold text-success my-2">32 Reports</h2>
            <small class="text-success fw-semibold">Ready for Print / PDF</small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
