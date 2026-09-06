<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>Hospital Tenants Management<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h3 class="fw-bold text-dark mb-1">Hospital Tenants</h3>
        <p class="text-muted mb-0">Manage all registered hospital organizations and subscriptions.</p>
    </div>
    <div class="col-auto">
        <a href="<?= base_url('register-hospital') ?>" target="_blank" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Register New Hospital
        </a>
    </div>
</div>

<div class="card card-custom">
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="ps-4">Hospital Name</th>
                        <th>Contact Email</th>
                        <th>Phone</th>
                        <th>Plan</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tenants)): ?>
                        <tr><td colspan="7" class="text-center py-4 text-muted">No tenants registered yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($tenants as $tenant): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                            <?= strtoupper(substr($tenant['name'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark"><?= esc($tenant['name']) ?></div>
                                            <div class="d-flex flex-wrap align-items-center gap-2 mt-1">
                                                <span class="badge bg-light text-dark border">Slug: /<?= esc($tenant['slug']) ?></span>
                                                <?php if (!empty($tenant['pending_slug'])): ?>
                                                    <span class="badge bg-warning-subtle text-dark border border-warning">
                                                        <i class="bi bi-clock-history me-1"></i>Slug Req: <?= esc($tenant['pending_slug']) ?>
                                                    </span>
                                                    <a href="<?= base_url('superadmin/tenant-approve-slug/' . $tenant['id']) ?>" class="btn btn-xs btn-success py-0 px-2 rounded-pill text-white fw-semibold" style="font-size: 0.75rem;" onclick="return confirm('Approve requested slug dynamic route?')">
                                                        <i class="bi bi-check-circle me-1"></i>Approve Slug
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!empty($tenant['custom_domain'])): ?>
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Domain: <?= esc($tenant['custom_domain']) ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($tenant['pending_custom_domain'])): ?>
                                                    <span class="badge bg-warning-subtle text-dark border border-warning">
                                                        <i class="bi bi-clock-history me-1"></i>Domain Req: <?= esc($tenant['pending_custom_domain']) ?>
                                                    </span>
                                                    <a href="<?= base_url('superadmin/tenant-approve-domain/' . $tenant['id']) ?>" class="btn btn-xs btn-success py-0 px-2 rounded-pill text-white fw-semibold" style="font-size: 0.75rem;" onclick="return confirm('Approve requested custom domain binding?')">
                                                        <i class="bi bi-check-circle me-1"></i>Approve Domain
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= esc($tenant['email']) ?></td>
                                <td><?= esc($tenant['phone']) ?></td>
                                <td><span class="badge bg-secondary-subtle text-secondary text-uppercase"><?= esc($tenant['package']) ?></span></td>
                                <td>
                                    <?php if ($tenant['status'] === 'active'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('M d, Y', strtotime($tenant['created_at'])) ?></td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex align-items-center justify-content-end gap-2">
                                        <?php if ($tenant['status'] === 'active'): ?>
                                            <a href="<?= base_url('superadmin/login-as-tenant/' . $tenant['id']) ?>" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold">
                                                <i class="bi bi-box-arrow-in-right me-1"></i> Login As
                                            </a>
                                        <?php endif; ?>
                                        <button class="btn btn-sm btn-outline-secondary rounded-pill px-2.5" data-bs-toggle="modal" data-bs-target="#editSlugModal<?= $tenant['id'] ?>" title="Edit URL Slug">
                                            <i class="bi bi-pencil me-1"></i> Slug
                                        </button>
                                        <button class="btn btn-sm btn-outline-success rounded-pill px-2.5" data-bs-toggle="modal" data-bs-target="#editDomainModal<?= $tenant['id'] ?>" title="Edit Custom Domain">
                                            <i class="bi bi-diagram-3 me-1"></i> Domain
                                        </button>
                                        <a href="<?= base_url('superadmin/tenant-toggle/' . $tenant['id']) ?>" class="btn btn-sm btn-outline-<?= $tenant['status'] === 'active' ? 'warning' : 'success' ?> rounded-pill px-3">
                                            <?= $tenant['status'] === 'active' ? 'Deactivate' : 'Activate' ?>
                                        </a>
                                        <a href="<?= base_url('superadmin/tenant-delete/' . $tenant['id']) ?>" class="btn btn-sm btn-outline-danger rounded-pill px-2" onclick="return confirm('Are you sure you want to delete this tenant hospital and all associated data?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>

                                    <!-- Edit Slug Modal -->
                                    <div class="modal fade text-start" id="editSlugModal<?= $tenant['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4 border-0 shadow">
                                                <form action="<?= base_url('superadmin/tenant-update-slug/' . $tenant['id']) ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-header border-bottom-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-dark"><i class="bi bi-link-45deg me-2 text-primary"></i>Edit URL Slug - <?= esc($tenant['name']) ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body py-4">
                                                        <div class="mb-3">
                                                            <label class="form-label text-muted small fw-semibold">Hospital URL Slug</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-light text-muted border-end-0"><?= base_url('h/') ?></span>
                                                                <input type="text" name="slug" class="form-control border-start-0 ps-0 fw-semibold" value="<?= esc($tenant['slug']) ?>" required pattern="[a-zA-Z0-9\-]+" title="Only alphanumeric characters and hyphens allowed">
                                                            </div>
                                                            <div class="form-text mt-2">Updating this will immediately change the public URL access path for this hospital tenant.</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top-0 pt-0">
                                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Domain Modal -->
                                    <div class="modal fade text-start" id="editDomainModal<?= $tenant['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4 border-0 shadow">
                                                <form action="<?= base_url('superadmin/tenant-update-domain/' . $tenant['id']) ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <div class="modal-header border-bottom-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-dark"><i class="bi bi-diagram-3 me-2 text-success"></i>Edit Custom Domain - <?= esc($tenant['name']) ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body py-4">
                                                        <div class="mb-3">
                                                            <label class="form-label text-muted small fw-semibold">Custom Domain Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-light text-muted border-end-0">https://</span>
                                                                <input type="text" name="custom_domain" class="form-control border-start-0 ps-0 fw-semibold" value="<?= esc($tenant['custom_domain'] ?? '') ?>" placeholder="www.myhospital.com">
                                                            </div>
                                                            <div class="form-text mt-2">Bind a custom brand domain directly to this hospital tenant (Leave empty to clear).</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top-0 pt-0">
                                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success rounded-pill px-4 fw-semibold">Save Domain</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
