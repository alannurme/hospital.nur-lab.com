<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Custom Website URL & Domain Settings | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Compact Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Custom Website URL & Domain Setup</h4>
            <p class="text-muted small mb-0">Configure your hospital dynamic web address URL slug and custom domain for <strong><?= esc(session()->get('tenant_name') ?? 'Nur Lab Hospital') ?></strong>.</p>
        </div>
        <div>
            <a href="<?= base_url('hospital/settings') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold small">
                <i class="bi bi-arrow-left me-1"></i> Back to Hospital Settings
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-3 p-3" style="background: #e6f4f1; color: #0d7c66;">
            <div class="text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #0d7c66;">
                <i class="bi bi-check-lg fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-0" style="color: #0d7c66;">Success!</h6>
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

    <div class="row g-4 justify-content-center">
        <!-- Sub-path Slug Customizer Card -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 h-100 bg-white">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #0d7c66;">
                        <i class="bi bi-globe fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Sub-path URL Slug</h5>
                        <p class="text-muted small mb-0">Hosted web link under main portal domain</p>
                    </div>
                </div>

                <form action="<?= base_url('hospital/settings/update-slug') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="p-4 bg-light rounded-4 border mb-4">
                        <label class="form-label fw-semibold text-muted small mb-2">Requested Website URL Slug</label>
                        <div class="input-group input-group-lg mb-2">
                            <span class="input-group-text bg-white text-muted fw-semibold border-end-0" style="font-size: 0.85rem;"><?= base_url('h/') ?></span>
                            <input type="text" name="slug" class="form-control rounded-end-3 border-start-0 ps-1 fw-bold" style="color: #0d7c66;" value="<?= esc(($tenant['pending_slug'] ?? '') ?: ($tenant['slug'] ?? '')) ?>" required placeholder="hospital-name" pattern="[a-zA-Z0-9\-]+" title="Only letters, numbers, and hyphens are allowed">
                        </div>
                        <div class="form-text text-muted mb-3" style="font-size: 0.8rem;">
                            <i class="bi bi-info-circle me-1"></i> Slug can contain letters, numbers, and hyphens.
                        </div>

                        <?php if (!empty($tenant['pending_slug'])): ?>
                            <div class="p-3 bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-3 small">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="fw-bold"><i class="bi bi-clock-history me-1"></i> Requested Slug:</span>
                                    <span class="badge bg-warning text-dark rounded-pill px-2 py-1">Pending Approval</span>
                                </div>
                                <code class="fw-bold text-dark fs-6"><?= esc($tenant['pending_slug']) ?></code>
                                <div class="text-muted mt-1" style="font-size: 0.75rem;">Super Admin will review and activate your requested slug.</div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-3 rounded-4 border bg-white mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted small fw-semibold"><i class="bi bi-link-45deg me-1"></i> Current Active URL:</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1">Active</span>
                        </div>
                        <?php $activeUrl = base_url('h/' . ($tenant['slug'] ?? '')); ?>
                        <div class="d-flex align-items-center justify-content-between bg-light p-2.5 rounded-3 border">
                            <span class="text-truncate fw-semibold small me-2" style="color: #0d7c66;"><?= $activeUrl ?></span>
                            <a href="<?= $activeUrl ?>" target="_blank" class="btn btn-sm rounded-3 px-3 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                                Visit <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-emerald w-100 py-2.5 rounded-3 fw-bold text-white shadow-sm d-flex align-items-center justify-content-center gap-2" style="background: #0d7c66; border:none;">
                        <i class="bi bi-send-fill"></i> Submit Slug Request
                    </button>
                </form>
            </div>
        </div>

        <!-- Custom Domain Setup Card -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 h-100 bg-white">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-diagram-3 fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Custom Domain Setup</h5>
                        <p class="text-muted small mb-0">Connect your own brand domain (e.g. hospital.com)</p>
                    </div>
                </div>

                <form action="<?= base_url('hospital/settings/update-domain') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="p-4 bg-light rounded-4 border mb-4">
                        <label class="form-label fw-semibold text-muted small mb-2">Requested Custom Domain</label>
                        <div class="input-group input-group-lg mb-2">
                            <span class="input-group-text bg-white text-muted fw-semibold border-end-0" style="font-size: 0.85rem;">https://</span>
                            <input type="text" name="custom_domain" class="form-control rounded-end-3 border-start-0 ps-1 fw-bold" style="color: #0d7c66;" value="<?= esc(($tenant['pending_custom_domain'] ?? '') ?: ($tenant['custom_domain'] ?? '')) ?>" required placeholder="www.myhospital.com">
                        </div>
                        <div class="form-text text-muted mb-3" style="font-size: 0.8rem;">
                            <i class="bi bi-info-circle me-1"></i> Enter your registered domain or subdomain.
                        </div>

                        <?php if (!empty($tenant['pending_custom_domain'])): ?>
                            <div class="p-3 bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-3 small mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="fw-bold"><i class="bi bi-clock-history me-1"></i> Requested Domain:</span>
                                    <span class="badge bg-warning text-dark rounded-pill px-2 py-1">Pending Approval</span>
                                </div>
                                <code class="fw-bold text-dark fs-6"><?= esc($tenant['pending_custom_domain']) ?></code>
                                <div class="text-muted mt-1" style="font-size: 0.75rem;">Super Admin will verify DNS settings and approve your domain.</div>
                            </div>
                        <?php endif; ?>

                        <!-- DNS Instructions Note -->
                        <div class="p-3 bg-white rounded-3 border">
                            <div class="fw-bold text-dark mb-1 small"><i class="bi bi-shield-check text-success me-1" style="color: #0d7c66 !important;"></i> Required CNAME / A Record:</div>
                            <div class="d-flex align-items-center justify-content-between small text-muted">
                                <span>Record Type: <strong>CNAME</strong></span>
                                <span>Points To: <code>hospital.nur-lab.com</code></span>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 rounded-4 border bg-white mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted small fw-semibold"><i class="bi bi-check-circle me-1"></i> Active Custom Domain:</span>
                            <?php if (!empty($tenant['custom_domain'])): ?>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1">Bound & Active</span>
                            <?php else: ?>
                                <span class="badge bg-secondary-subtle text-secondary border rounded-pill px-2.5 py-1">Not Connected</span>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex align-items-center justify-content-between bg-light p-2.5 rounded-3 border">
                            <?php if (!empty($tenant['custom_domain'])): ?>
                                <span class="text-truncate fw-bold small me-2" style="color: #0d7c66;">https://<?= esc($tenant['custom_domain']) ?></span>
                                <a href="https://<?= esc($tenant['custom_domain']) ?>" target="_blank" class="btn btn-sm rounded-3 px-3 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                                    Visit <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            <?php else: ?>
                                <span class="text-muted small italic">No active custom domain configured yet.</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-emerald w-100 py-2.5 rounded-3 fw-bold text-white shadow-sm d-flex align-items-center justify-content-center gap-2" style="background: #0d7c66; border:none;">
                        <i class="bi bi-diagram-3-fill"></i> Submit Custom Domain Request
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
