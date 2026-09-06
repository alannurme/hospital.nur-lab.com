<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>Global Platform Settings<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <h4 class="fw-bold mb-4"><i class="bi bi-gear-fill text-primary me-2"></i> Global SaaS Platform Settings</h4>

            <form action="#" method="POST" onsubmit="alert('Global Settings updated!'); return false;">
                <div class="mb-3">
                    <label class="form-label fw-semibold small text-secondary">Platform Name</label>
                    <input type="text" class="form-control" value="Nur Lab Hospital SaaS Platform" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-secondary">Support Email</label>
                    <input type="email" class="form-control" value="support@saas.nur-lab.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-secondary">Free Trial Days</label>
                    <input type="number" class="form-control" value="14" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small text-secondary">System Maintenance Mode</label>
                    <select class="form-select">
                        <option value="disabled">Disabled (Normal Operations)</option>
                        <option value="enabled">Enabled (Maintenance Mode)</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-pill fw-bold shadow-sm">
                    <i class="bi bi-check-circle me-1"></i> Save Global Settings
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
