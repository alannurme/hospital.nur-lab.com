<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Diabetic & Chronic Disease Care | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-activity me-1"></i> Endocrinology & Diabetes
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Chronic Care Monitoring</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Diabetic & Chronic Disease Care</h4>
            <p class="text-muted small mb-0">Long-term diabetes tracking, HbA1c lab logs, insulin dosages & hypertension monitoring for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newDiabeticProfileModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-person-bounding-box"></i>
                <span>New Diabetic Profile</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Registered Diabetic Patients</span>
                        <h3 class="fw-extrabold text-dark mb-0">145 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-activity fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Hypertension & High BP</span>
                        <h3 class="fw-extrabold text-warning mb-0">82 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-heart-pulse-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Controlled Glucose Rate</span>
                        <h3 class="fw-extrabold text-success mb-0" style="color: #0d7c66 !important;">78% Goal Met</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Insulin Therapy Protocol</span>
                        <h3 class="fw-extrabold text-dark mb-0">34 Active</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-capsule fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Diabetic Patient Registry Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-activity text-success" style="color: #0d7c66 !important;"></i> Diabetic & Glycemic Monitoring Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                HbA1c & Blood Pressure Logs
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Diabetes Type</th>
                        <th>HbA1c & Fasting Glucose</th>
                        <th>BP Reading</th>
                        <th>Glycemic Control</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    AK
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Anowar Hossain</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: DIA-104 • Male (52)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Type-2 Diabetes Mellitus
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">HbA1c: <span class="text-success" style="color: #0d7c66 !important;">6.5%</span></div>
                            <small class="text-muted" style="font-size: 0.72rem;">Fasting Glucose: 6.2 mmol/L</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small">125 / 82 mmHg</span>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Controlled Goal</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Logging glucose reading for Anowar Hossain');">
                                <i class="bi bi-plus-circle me-1"></i> Log Glucose
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #d97706; font-size: 0.9rem;">
                                    SB
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Shahana Begum</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: DIA-109 • Female (46)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Type-2 Diabetes + Hypertension
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">HbA1c: <span class="text-warning">8.2%</span></div>
                            <small class="text-muted" style="font-size: 0.72rem;">Fasting Glucose: 9.8 mmol/L</small>
                        </td>
                        <td>
                            <span class="fw-bold text-danger small">148 / 95 mmHg</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Requires Adjust</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Adjusting dosage for Shahana Begum');">
                                <i class="bi bi-pencil-square me-1"></i> Adjust Dose
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Diabetic Profile -->
<div class="modal fade" id="newDiabeticProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-activity text-success me-2" style="color: #0d7c66 !important;"></i> Create Diabetic Patient Profile
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Diabetic patient profile created!'); bootstrap.Modal.getInstance(document.getElementById('newDiabeticProfileModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Code *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Anowar Hossain (PAT-1082)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Diabetes Classification *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Type 2">Type-2 Diabetes</option>
                                <option value="Type 1">Type-1 Diabetes</option>
                                <option value="Gestational">Gestational Diabetes</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">HbA1c Baseline (%) *</label>
                            <input type="number" step="0.1" class="form-control rounded-3 p-2.5 fw-bold" placeholder="7.5" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Initial Medication / Insulin Protocol</label>
                        <textarea class="form-control rounded-3 p-2.5 fw-semibold" rows="2" placeholder="e.g. Metformin 500mg BD + Diet control"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
