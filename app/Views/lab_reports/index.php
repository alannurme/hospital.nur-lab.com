<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Pathology & Lab Reports | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Pathology & Lab Reports Directory</h4>
            <p class="text-muted small mb-0">Diagnostic test results, clinical pathology reports & patient investigations for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newLabReportModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-journal-plus"></i>
                <span>Generate Lab Report</span>
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background: #e6f4f1; color: #0d7c66;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Lab Reports</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($reports) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-journal-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Hematology Tests</span>
                        <h3 class="fw-extrabold text-dark mb-0">
                            <?= count(array_filter($reports, fn($r) => strtolower($r['category'] ?? '') === 'hematology')) ?>
                        </h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-droplet-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Biochemistry Tests</span>
                        <h3 class="fw-extrabold text-dark mb-0">
                            <?= count(array_filter($reports, fn($r) => strtolower($r['category'] ?? '') === 'biochemistry')) ?>
                        </h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-flask-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Radiology Investigations</span>
                        <h3 class="fw-extrabold text-dark mb-0">
                            <?= count(array_filter($reports, fn($r) => str_contains(strtolower($r['category'] ?? ''), 'radiology'))) ?>
                        </h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-cpu-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lab Reports List Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-journal-text text-success" style="color: #0d7c66 !important;"></i> Pathology & Diagnostic Test Records
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($reports) ?> Reports Generated
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Test Name</th>
                        <th>Category</th>
                        <th>Patient Name</th>
                        <th>Ref. Doctor</th>
                        <th>Result Summary</th>
                        <th>Test Fee</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Date Generated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($reports)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No lab reports generated yet. Click "Generate Lab Report" to create a new pathology record.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($reports as $r): ?>
                            <?php $patientInitials = strtoupper(substr($r['patient_name'] ?? 'P', 0, 2)); ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="fw-bold text-dark" style="font-size: 0.92rem;"><?= esc($r['test_name']) ?></div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: LAB-<?= sprintf('%04d', $r['id'] ?? rand(100, 999)) ?></small>
                                </td>
                                <td>
                                    <span class="badge border rounded-pill px-3 py-1 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.75rem;">
                                        <?= esc($r['category']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #0d7c66; font-size: 0.8rem;">
                                            <?= esc($patientInitials) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.88rem;"><?= esc($r['patient_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.72rem;"><?= esc($r['patient_code']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-semibold text-dark small"><?= esc($r['doctor_name'] ?? 'Self / Direct') ?></span>
                                </td>
                                <td>
                                    <small class="text-muted" style="max-width: 220px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.8rem;">
                                        <?= esc($r['result_summary'] ?? 'Standard Panel Normal') ?>
                                    </small>
                                </td>
                                <td>
                                    <strong class="font-monospace" style="color: #0d7c66;">৳ <?= number_format($r['fee'], 2) ?></strong>
                                </td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1"><?= esc($r['status'] ?? 'Ready') ?></span>
                                </td>
                                <td class="pe-4 text-end text-muted small">
                                    <?= date('M d, Y', strtotime($r['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Lab Report -->
<div class="modal fade" id="newLabReportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-journal-plus text-success me-2" style="color: #0d7c66 !important;"></i> Generate New Lab Report
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('lab-reports/create') ?>" method="POST">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Select Patient *</label>
                        <select name="patient_id" class="form-select rounded-3 p-2.5 fw-semibold" required>
                            <option value="">-- Choose Registered Patient --</option>
                            <?php foreach ($patients as $p): ?>
                                <option value="<?= $p['id'] ?>"><?= esc($p['name']) ?> (<?= esc($p['patient_code']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Ref. Doctor</label>
                        <select name="doctor_id" class="form-select rounded-3 p-2.5 fw-semibold">
                            <option value="">-- Direct Patient / Self Walk-in --</option>
                            <?php foreach ($doctors as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= esc($d['name']) ?> (<?= esc($d['department']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Test Name *</label>
                            <input type="text" name="test_name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. CBC / Lipid Profile" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Category</label>
                            <select name="category" class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="Hematology">Hematology</option>
                                <option value="Biochemistry">Biochemistry</option>
                                <option value="Microbiology">Microbiology</option>
                                <option value="Radiology">Radiology (X-Ray / USG)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Test Fee (BDT) *</label>
                        <input type="number" step="0.01" name="fee" class="form-control rounded-3 p-2.5 fw-bold" placeholder="500.00" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Result Summary / Clinical Notes</label>
                        <textarea name="result_summary" class="form-control rounded-3 p-2.5 fw-semibold" rows="2" placeholder="Key lab findings or test values..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Lab Report
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
