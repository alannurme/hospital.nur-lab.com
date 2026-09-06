<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Physiotherapy & Rehabilitation Center | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-body-text me-1"></i> Physical Medicine
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Rehab & Recovery</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Physiotherapy & Rehabilitation Center</h4>
            <p class="text-muted small mb-0">Physical therapy sessions, neuro rehabilitation, post-stroke recovery & sports injury therapy for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newPhysioModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Book Physio Session</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Active Rehab Sessions</span>
                        <h3 class="fw-extrabold text-dark mb-0">18 Sessions</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-body-text fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Neuro & Stroke Rehab</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">08 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-cpu-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Ortho & Joint Physio</span>
                        <h3 class="fw-extrabold text-dark mb-0">10 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-bandaid-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Active Physiotherapists</span>
                        <h3 class="fw-extrabold text-dark mb-0">04 Therapists</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Physiotherapy Sessions Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-activity text-success" style="color: #0d7c66 !important;"></i> Today's Physical Rehabilitation Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Live Therapy Schedule
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Therapy Category</th>
                        <th>Assigned Physiotherapist</th>
                        <th>Session Progress</th>
                        <th>Schedule Time</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    MR
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Mizanur Rahman</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: PHY-102 • Male (58)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Neuro & Post-Stroke Rehab
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-success me-1" style="color: #0d7c66 !important;"></i> Dr. Alim Reza (PT)</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">Session <span style="color: #0d7c66;">04 / 10</span></div>
                            <div class="progress rounded-pill mt-1" style="height: 6px; width: 100px; background: #e2e8f0;">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: 40%; background: #0d7c66;"></div>
                            </div>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-success" style="color: #0d7c66 !important;"></i> Today, 11:00 AM
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">In-Progress</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Logging session progress for Mizanur Rahman');">
                                <i class="bi bi-play-circle me-1"></i> Log Session
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0284c7; font-size: 0.9rem;">
                                    NA
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Nusrat Jahan</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: PHY-105 • Female (34)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Orthopedic Knee Joint Rehab
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-person-badge text-info me-1"></i> Dr. Farhana Islam (PT)</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">Session 02 / 06</div>
                            <div class="progress rounded-pill mt-1" style="height: 6px; width: 100px; background: #e2e8f0;">
                                <div class="progress-bar bg-info rounded-pill" role="progressbar" style="width: 33%"></div>
                            </div>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-info"></i> Today, 03:30 PM
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1">Scheduled</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Session scheduled at 03:30 PM');">
                                <i class="bi bi-clock me-1"></i> Scheduled
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Book Physio Session -->
<div class="modal fade" id="newPhysioModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-plus-circle-fill text-success me-2" style="color: #0d7c66 !important;"></i> Book Physiotherapy Session
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Physiotherapy session booked!'); bootstrap.Modal.getInstance(document.getElementById('newPhysioModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Code *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Mizanur Rahman (PAT-1042)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Therapy Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Neuro Rehab">Neuro & Post-Stroke Rehab</option>
                                <option value="Ortho Rehab">Orthopedic Knee & Joint</option>
                                <option value="Sports Rehab">Sports Injury Recovery</option>
                                <option value="Spine Physio">Spine & Back Pain Physio</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Assigned Physiotherapist *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Alim Reza (PT)" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Session Date & Time *</label>
                        <input type="datetime-local" class="form-control rounded-3 p-2.5 fw-semibold" required value="<?= date('Y-m-d\TH:i') ?>">
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
