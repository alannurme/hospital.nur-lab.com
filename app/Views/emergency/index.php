<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Emergency & ICU Management | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1 fw-bold">
                    <i class="bi bi-activity me-1"></i> 24/7 Trauma Unit
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Live Triage Queue</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Emergency & ICU Trauma Care</h4>
            <p class="text-muted small mb-0">Real-time emergency admissions, triage priority queue & ICU bed tracking for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-danger rounded-3 px-3.5 py-2 fw-bold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newEmergencyModal" style="font-size: 0.88rem;">
                <i class="bi bi-plus-circle-fill"></i>
                <span>New Emergency Admission</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #dc2626 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Trauma / ER Active</span>
                        <h3 class="fw-extrabold text-danger mb-0">04 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 44px; height: 44px; background: #fee2e2;">
                        <i class="bi bi-shield-exclamation fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #d97706 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">ICU Occupied Beds</span>
                        <h3 class="fw-extrabold text-dark mb-0">06 <span class="fs-6 text-muted fw-normal">/ 10 Beds</span></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-hospital fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Ventilators Available</span>
                        <h3 class="fw-extrabold text-dark mb-0">03 <span class="fs-6 text-muted fw-normal">Free</span></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-lungs-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #0284c7 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">On-Call Duty Doctors</span>
                        <h3 class="fw-extrabold text-dark mb-0">05 Ready</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Emergency Queue Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-activity text-danger"></i> Live Emergency Triage Queue
            </h6>
            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-semibold">
                High Priority Monitor
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name & Code</th>
                        <th>Triage Priority</th>
                        <th>Condition / Diagnosis</th>
                        <th>Assigned Doctor</th>
                        <th>Bed / Ward Location</th>
                        <th class="pe-4 text-end">Triage Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #dc2626; font-size: 0.9rem;">
                                    KH
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Kamrul Hasan</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Code: ER-102 • Age: 48 M</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger text-white rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.78rem;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Critical (Red)
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark small">Severe Cardiac Distress</div>
                            <small class="text-muted" style="font-size: 0.72rem;">BP: 160/100 • SpO2: 88%</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-danger me-1"></i> Dr. Mahbub Rahman</span>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                ICU-Bed 02 (Ventilator 1)
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-danger rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Update triage status for ER-102');">
                                <i class="bi bi-pencil-square me-1"></i> Update Triage
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
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Sufia Begum</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Code: ER-105 • Age: 36 F</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.78rem;">
                                <i class="bi bi-clock-history me-1"></i> Moderate (Yellow)
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark small">Acute Abdominal Trauma</div>
                            <small class="text-muted" style="font-size: 0.72rem;">BP: 120/80 • SpO2: 96%</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-warning me-1"></i> Dr. Farhana Islam</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Emergency Observation Bed 04
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Update triage status for ER-105');">
                                <i class="bi bi-pencil-square me-1"></i> Update Triage
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Emergency Admission -->
<div class="modal fade" id="newEmergencyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-shield-exclamation text-danger me-2"></i> Register New Emergency Admission
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Emergency patient admitted successfully!'); bootstrap.Modal.getInstance(document.getElementById('newEmergencyModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Full Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Rafiqul Islam" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Triage Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-bold text-danger" required>
                                <option value="Red">Critical (Red Code)</option>
                                <option value="Yellow">Moderate (Yellow Code)</option>
                                <option value="Green">Urgent Care (Green Code)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Primary Condition</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Acute Respiratory Distress">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Assigned Emergency Doctor / Bed</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Mahbub Rahman (ICU Bed 03)">
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger rounded-3 px-4 text-white fw-bold shadow-sm">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Admission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
