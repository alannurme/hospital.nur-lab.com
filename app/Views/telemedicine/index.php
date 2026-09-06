<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Telemedicine & Online Consultations | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-camera-video me-1"></i> Virtual Clinic
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Remote Health Services</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Telemedicine & Video Consultations</h4>
            <p class="text-muted small mb-0">Virtual doctor appointments, encrypted video call links & remote e-prescriptions for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newTelemedicineModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-camera-video-fill"></i>
                <span>Schedule Video Session</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Today's Sessions</span>
                        <h3 class="fw-extrabold text-dark mb-0">08 Calls</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-headset fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Live Active Call</span>
                        <h3 class="fw-extrabold text-success mb-0" style="color: #0d7c66 !important;">01 Active</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-record-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Completed Today</span>
                        <h3 class="fw-extrabold text-dark mb-0">05 Done</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-check-all fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">E-Prescriptions Sent</span>
                        <h3 class="fw-extrabold text-dark mb-0">07 Issued</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-file-earmark-medical-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Telemedicine Appointments Worklist Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-camera-video text-success" style="color: #0d7c66 !important;"></i> Scheduled Video Consultation Queue
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Live Video Roster
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Consulting Specialist</th>
                        <th>Encrypted Video Link</th>
                        <th>Time Slot</th>
                        <th>Session Status</th>
                        <th class="pe-4 text-end">Video Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    AM
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Arif Mahmud</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: TELE-102 • Male</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-person-badge text-success me-1" style="color: #0d7c66 !important;"></i> Dr. Mahbub Rahman</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Cardiology & ECG Consultant</small>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                meet.nur-lab.com/tele-102
                            </span>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-success" style="color: #0d7c66 !important;"></i> Today, 04:30 PM
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Ready</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-emerald text-white rounded-3 px-3 py-1.5 fw-bold shadow-sm" style="background: #0d7c66; border: none; font-size: 0.82rem;" onclick="alert('Joining Telemedicine Call for TELE-102');">
                                <i class="bi bi-camera-video me-1"></i> Join Call
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0284c7; font-size: 0.9rem;">
                                    SK
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Sharmin Khan</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: TELE-108 • Female</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-person-badge text-info me-1"></i> Dr. Farhana Islam</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Gynecology & Maternity</small>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-semibold" style="background: #e0f2fe; color: #0284c7; border-color: #bae6fd !important; font-size: 0.78rem;">
                                meet.nur-lab.com/tele-108
                            </span>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-info"></i> Today, 05:15 PM
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1">Upcoming</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Call starts at 05:15 PM');">
                                <i class="bi bi-clock me-1"></i> Scheduled
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Schedule Video Session -->
<div class="modal fade" id="newTelemedicineModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-camera-video-fill text-success me-2" style="color: #0d7c66 !important;"></i> Schedule Telemedicine Session
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Telemedicine session scheduled!'); bootstrap.Modal.getInstance(document.getElementById('newTelemedicineModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Mobile *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Arif Mahmud (01711223344)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Assigned Doctor *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Mahbub Rahman" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Consultation Fee (BDT)</label>
                            <input type="number" class="form-control rounded-3 p-2.5 fw-bold" placeholder="800.00" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Scheduled Session Time *</label>
                        <input type="datetime-local" class="form-control rounded-3 p-2.5 fw-semibold" required value="<?= date('Y-m-d\TH:i') ?>">
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Session
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
