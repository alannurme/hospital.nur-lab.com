<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Subscription Plan | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-shield-check me-1"></i> SaaS Subscription
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Billing & Entitlements</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Subscription & Billing License</h4>
            <p class="text-muted small mb-0">Manage your hospital's multi-tenant SaaS subscription tier and feature entitlements for <strong><?= esc($tenant['name'] ?? session()->get('tenant_name')) ?></strong>.</p>
        </div>
    </div>

    <!-- Active Plan Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white position-relative overflow-hidden" style="border-left: 4px solid #0d7c66 !important;">
        <div class="row align-items-center">
            <div class="col-12 col-md-8">
                <span class="badge border rounded-pill px-3 py-1 text-uppercase mb-2 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">CURRENT ACTIVE PLAN</span>
                <h3 class="fw-extrabold text-dark mb-1"><?= esc(ucfirst($tenant['package'] ?? 'Premium')) ?> Package</h3>
                <p class="text-muted small mb-0">Registered Hospital: <strong><?= esc($tenant['name'] ?? session()->get('tenant_name')) ?></strong></p>
            </div>
            <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0">
                <span class="badge border rounded-pill px-3.5 py-2 fs-6 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-check-circle-fill me-1"></i> Subscription Active
                </span>
            </div>
        </div>
    </div>

    <!-- Available Upgrade Plans Grid -->
    <h5 class="fw-bold text-dark mb-3">Choose / Upgrade Hospital Plan</h5>
    <div class="row g-4 mb-4">
        <!-- Standard Plan -->
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white position-relative">
                <h5 class="fw-bold text-dark mb-1">Standard Plan</h5>
                <p class="text-muted small mb-3">Up to 500 Patients / 10 Doctors</p>
                <div class="my-3">
                    <span class="display-6 fw-extrabold text-dark">৳ 4,999</span>
                    <span class="text-muted">/ month</span>
                </div>
                <ul class="list-unstyled mb-4 gap-2 d-flex flex-column text-secondary small">
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Patient EMR & Records</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Doctor Scheduling</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Appointment Booking</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Email Support</li>
                </ul>
                <?php if (($tenant['package'] ?? 'standard') === 'standard'): ?>
                    <button class="btn btn-light rounded-3 w-100 fw-bold border" disabled>Current Active Plan</button>
                <?php else: ?>
                    <form action="<?= base_url('subscription/upgrade') ?>" method="POST">
                        <input type="hidden" name="package" value="standard">
                        <button type="submit" class="btn btn-outline-secondary rounded-3 w-100 fw-bold">Switch to Standard</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Premium Plan -->
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white position-relative" style="border: 2px solid #0d7c66 !important;">
                <span class="badge text-white rounded-pill px-3 py-1.5 position-absolute top-0 end-0 m-3 fw-bold" style="background: #0d7c66;">RECOMMENDED</span>
                <h5 class="fw-bold text-dark mb-1">Premium Plan</h5>
                <p class="text-muted small mb-3">Unlimited Patients & Doctors</p>
                <div class="my-3">
                    <span class="display-6 fw-extrabold" style="color: #0d7c66;">৳ 9,999</span>
                    <span class="text-muted">/ month</span>
                </div>
                <ul class="list-unstyled mb-4 gap-2 d-flex flex-column text-secondary small">
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Unlimited Patients & Doctors</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Full Lab & Billing Suite</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Pharmacy Inventory</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> 24/7 Priority Support</li>
                </ul>
                <?php if (($tenant['package'] ?? '') === 'premium'): ?>
                    <button class="btn border rounded-3 w-100 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;" disabled>Current Active Plan</button>
                <?php else: ?>
                    <form action="<?= base_url('subscription/upgrade') ?>" method="POST">
                        <input type="hidden" name="package" value="premium">
                        <button type="submit" class="btn btn-emerald rounded-3 w-100 fw-bold text-white shadow-sm" style="background: #0d7c66; border: none;">Upgrade to Premium</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white position-relative">
                <h5 class="fw-bold text-dark mb-1">Enterprise Plan</h5>
                <p class="text-muted small mb-3">Custom Hospital Infrastructure</p>
                <div class="my-3">
                    <span class="display-6 fw-extrabold text-dark">Custom</span>
                </div>
                <ul class="list-unstyled mb-4 gap-2 d-flex flex-column text-secondary small">
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Dedicated Server Instance</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Custom Domain & Branding</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Custom API Integrations</li>
                    <li><i class="bi bi-check-circle-fill me-2" style="color: #0d7c66;"></i> Dedicated Account Manager</li>
                </ul>
                <?php if (($tenant['package'] ?? '') === 'enterprise'): ?>
                    <button class="btn btn-light rounded-3 w-100 fw-bold border" disabled>Current Active Plan</button>
                <?php else: ?>
                    <form action="<?= base_url('subscription/upgrade') ?>" method="POST">
                        <input type="hidden" name="package" value="enterprise">
                        <button type="submit" class="btn btn-outline-dark rounded-3 w-100 fw-bold">Upgrade to Enterprise</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
