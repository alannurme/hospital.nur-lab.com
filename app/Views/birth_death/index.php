<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Birth & Death Certificates Registry | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-file-earmark-person me-1"></i> Vital Statistics
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Civil Registration</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Birth & Death Certificates Registry</h4>
            <p class="text-muted small mb-0">Official newborn birth registration certificates, death records & government health portal sync for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newCertificateModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-file-earmark-plus-fill"></i>
                <span>Issue Certificate</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Vital Records</span>
                        <h3 class="fw-extrabold text-dark mb-0">15 Records</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-file-earmark-medical-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Birth Certificates</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">14 Babies</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-gender-female fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Death Certificates</span>
                        <h3 class="fw-extrabold text-dark mb-0">01 Record</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-secondary" style="width: 44px; height: 44px; background: #f1f5f9;">
                        <i class="bi bi-file-text-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Govt. Portal Sync</span>
                        <h3 class="fw-extrabold text-success mb-0" style="color: #0d7c66 !important;">100% Synced</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-cloud-check-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Birth & Death Certificates Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-person text-success" style="color: #0d7c66 !important;"></i> Official Vital Registration Records
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Civil Registration Archive
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Certificate Code</th>
                        <th>Record Type</th>
                        <th>Subject Name & Details</th>
                        <th>Attending Doctor</th>
                        <th>Date & Time</th>
                        <th>Portal Status</th>
                        <th class="pe-4 text-end">Certificate Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                CERT-BR-2026-092
                            </span>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Live Birth Registration
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Baby of Sufia Begum (Female)</div>
                            <small class="text-muted" style="font-size: 0.75rem;">Father: Rafiqul Islam • Weight: 3.2 kg</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-success me-1" style="color: #0d7c66 !important;"></i> Dr. Syeda Sultana</span>
                        </td>
                        <td class="text-muted small">Sep 05, 2026 - 08:45 AM</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Govt. Synced</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="window.print();">
                                <i class="bi bi-printer me-1"></i> Print Certificate
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="font-size: 0.78rem;">
                                CERT-DR-2026-014
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Death Certification
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Late Abdul Jabbar (Male, 78 yrs)</div>
                            <small class="text-muted" style="font-size: 0.75rem;">Cause: Cardiorespiratory Arrest</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-secondary me-1"></i> Dr. Mahbub Rahman</span>
                        </td>
                        <td class="text-muted small">Aug 28, 2026 - 11:20 PM</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Certified</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="window.print();">
                                <i class="bi bi-printer me-1"></i> Print Record
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Issue Certificate -->
<div class="modal fade" id="newCertificateModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-file-earmark-plus-fill text-success me-2" style="color: #0d7c66 !important;"></i> Issue Birth / Death Certificate
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Official certificate issued!'); bootstrap.Modal.getInstance(document.getElementById('newCertificateModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Certificate Record Type *</label>
                        <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                            <option value="Birth">Birth Certificate (Live Birth)</option>
                            <option value="Death">Death Certificate</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Subject Full Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Baby of Sufia Begum / Late Name" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Parent / Guardian Name</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="Father or Guardian Name">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Attending Doctor *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Syeda Sultana" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Date & Time of Event *</label>
                        <input type="datetime-local" class="form-control rounded-3 p-2.5 fw-semibold" required value="<?= date('Y-m-d\TH:i') ?>">
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Issue Official Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
