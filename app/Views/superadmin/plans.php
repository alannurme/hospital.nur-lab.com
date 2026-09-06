<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>Subscription Plans Management<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h3 class="fw-bold text-dark mb-1">Subscription Plans</h3>
        <p class="text-muted mb-0">Configure SaaS pricing tiers and active hospital subscriptions.</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-top border-4 border-secondary h-100">
            <h4 class="fw-bold text-dark mb-2">Standard Plan</h4>
            <p class="text-muted small">Up to 500 Patients / 10 Doctors</p>
            <div class="my-3">
                <span class="display-6 fw-bold text-dark">৳ 4,999</span>
                <span class="text-muted">/ month</span>
            </div>
            <div class="p-3 bg-light rounded-3 text-center mb-3">
                <span class="fw-bold text-primary fs-4"><?= $standard_count ?></span>
                <small class="text-muted d-block">Active Subscriptions</small>
            </div>
            <button class="btn btn-outline-secondary rounded-pill w-100 fw-bold">Edit Plan Details</button>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-top border-4 border-primary h-100">
            <span class="badge bg-primary rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3">POPULAR</span>
            <h4 class="fw-bold text-dark mb-2">Premium Plan</h4>
            <p class="text-muted small">Unlimited Patients & Doctors</p>
            <div class="my-3">
                <span class="display-6 fw-bold text-primary">৳ 9,999</span>
                <span class="text-muted">/ month</span>
            </div>
            <div class="p-3 bg-primary-subtle text-center mb-3 rounded-3">
                <span class="fw-bold text-primary fs-4"><?= $premium_count ?></span>
                <small class="text-primary d-block">Active Subscriptions</small>
            </div>
            <button class="btn btn-primary rounded-pill w-100 fw-bold shadow-sm">Edit Plan Details</button>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-top border-4 border-dark h-100">
            <h4 class="fw-bold text-dark mb-2">Enterprise Plan</h4>
            <p class="text-muted small">Custom Hospital Infrastructure</p>
            <div class="my-3">
                <span class="display-6 fw-bold text-dark">Custom</span>
            </div>
            <div class="p-3 bg-light rounded-3 text-center mb-3">
                <span class="fw-bold text-dark fs-4"><?= $enterprise_count ?></span>
                <small class="text-muted d-block">Active Subscriptions</small>
            </div>
            <button class="btn btn-outline-dark rounded-pill w-100 fw-bold">Edit Plan Details</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
