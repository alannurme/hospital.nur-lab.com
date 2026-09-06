<?= $this->extend('layouts/superadmin') ?>

<?= $this->section('title') ?>System Users Management<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h3 class="fw-bold text-dark mb-1">System Users</h3>
        <p class="text-muted mb-0">Global directory of all Super Admins and Hospital Admins/Staff.</p>
    </div>
</div>

<div class="card card-custom">
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="ps-4">User Name</th>
                        <th>Email</th>
                        <th>Assigned Hospital / Tenant</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Joined Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No users found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                            <?= strtoupper(substr($u['name'], 0, 2)) ?>
                                        </div>
                                        <div class="fw-semibold text-dark"><?= esc($u['name']) ?></div>
                                    </div>
                                </td>
                                <td><?= esc($u['email']) ?></td>
                                <td>
                                    <?php if ($u['tenant_id']): ?>
                                        <span class="fw-semibold text-dark"><?= esc($u['hospital_name']) ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-purple-subtle text-purple" style="background:#f3e8ff; color:#9333ea;">Global SaaS Platform</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($u['role'] === 'superadmin'): ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">Super Admin</span>
                                    <?php else: ?>
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill text-capitalize"><?= esc($u['role']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1"><?= esc($u['status']) ?></span>
                                </td>
                                <td class="pe-4 text-end text-muted small"><?= date('M d, Y', strtotime($u['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
