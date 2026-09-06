<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Nurse Station & In-Patient (IPD) Panel<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-purple text-white rounded-pill px-3 py-1 mb-2 fw-semibold" style="background:#9333ea;">Nursing Console</span>
        <h3 class="fw-bold text-dark mb-1">Nurse Station Dashboard 👩‍⚕️</h3>
        <p class="text-muted mb-0">Ward patient vitals log, medication administration record (MAR) & bed calls for <?= session()->get('tenant_name') ?>.</p>
    </div>
    <div class="col-auto">
        <button class="btn btn-purple text-white rounded-pill px-4 fw-semibold shadow-sm" style="background:#9333ea;">
            <i class="bi bi-heart-pulse me-1"></i> Log Patient Vitals
        </button>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Ward Admitted Patients</h6>
            <h2 class="fw-extrabold text-purple my-2" style="color:#9333ea;">24 Patients</h2>
            <small class="text-muted">General Ward & Cabins</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Dose Scheduled Now</h6>
            <h2 class="fw-extrabold text-warning my-2">12 Doses</h2>
            <small class="text-warning fw-semibold">Medication Admin Due</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4">
            <h6 class="fw-bold text-dark">Critical Vitals Alert</h6>
            <h2 class="fw-extrabold text-danger my-2">01 Patient</h2>
            <small class="text-muted">Bed #104 High Fever</small>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
