<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Settings & Website URL | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Compact Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Hospital Organization Settings</h4>
            <p class="text-muted small mb-0">Manage official hospital profile, contact information & website ticker for <strong><?= esc(session()->get('tenant_name') ?? 'Nur Lab Hospital') ?></strong>.</p>
        </div>
        <div>
            <a href="<?= base_url('hospital/settings/custom-url') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold small">
                <i class="bi bi-link-45deg me-1"></i> Custom Domain URL
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3" style="background: #e6f4f1; color: #0d7c66;">
            <div class="text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #0d7c66;">
                <i class="bi bi-check-lg fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="color: #0d7c66;">Settings Saved!</h6>
                <small><?= session()->getFlashdata('success') ?></small>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3">
            <div class="bg-danger text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                <i class="bi bi-exclamation-triangle fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold text-danger mb-0">Action Required</h6>
                <small class="text-danger-emphasis"><?= session()->getFlashdata('error') ?></small>
            </div>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('hospital/settings/update') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #0d7c66;">
                            <i class="bi bi-building fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0">Hospital Profile & Contact Info</h5>
                            <small class="text-muted">Update official hospital organization credentials and public website settings</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted small">Hospital Organization Name *</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-hospital"></i></span>
                            <input type="text" name="name" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-bold text-dark" value="<?= esc($tenant['name'] ?? '') ?>" required placeholder="e.g. City General Hospital">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Contact Phone Number *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-semibold" value="<?= esc($tenant['phone'] ?? '') ?>" required placeholder="+880 1700000000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted small">Official Contact Email *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-semibold" value="<?= esc($tenant['email'] ?? '') ?>" required placeholder="info@hospital.com">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted small">Full Address Location</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-geo-alt"></i></span>
                            <textarea name="address" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-semibold" rows="2" placeholder="Enter street address, city, zip code..."><?= esc($tenant['address'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 pt-2" style="color: #0d7c66;"><i class="bi bi-globe me-1"></i> Public Hospital Website Customizations</h6>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted small"><i class="bi bi-megaphone text-danger me-1"></i> Live Announcement Ticker Notice Text</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-broadcast"></i></span>
                            <input type="text" name="notice_ticker" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-semibold" value="<?= esc($tenant['notice_ticker'] ?? '') ?>" placeholder="e.g. 📢 24/7 Emergency ER Active | Online OPD Booking & Digital Pathology Reports Available">
                        </div>
                        <small class="text-muted">This announcement notice will scroll at the top of your public hospital website.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted small"><i class="bi bi-clock-history text-warning me-1"></i> OPD Visiting Hours Label</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-clock"></i></span>
                            <input type="text" name="opd_hours" class="form-control rounded-end-3 p-2.5 border-start-0 ps-1 fw-semibold" value="<?= esc($tenant['opd_hours'] ?? '') ?>" placeholder="e.g. Sat - Thu: 08:00 AM - 10:00 PM">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-3 border-top pt-4">
                        <button type="submit" class="btn btn-emerald px-4 py-2.5 rounded-3 fw-bold text-white shadow-sm d-flex align-items-center gap-2" style="background: #0d7c66; border:none;">
                            <i class="bi bi-check-circle-fill"></i> Save Profile Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
