<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Operation Theatre (OT) Schedules | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-scissors me-1"></i> Surgical Unit
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Live OT Operations</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Operation Theatre (OT) Schedules</h4>
            <p class="text-muted small mb-0">Surgery bookings, surgeon assignments, OT room availability & procedure schedules for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newOtModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-calendar-plus-fill"></i>
                <span>Book Surgery OT</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Today's Surgeries</span>
                        <h3 class="fw-extrabold text-dark mb-0">03 Booked</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-journal-medical fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #16a34a !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">OT Room 01 (Major)</span>
                        <h3 class="fw-extrabold text-success mb-0" style="font-size: 1.15rem;">Sterilized & Ready</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 44px; height: 44px; background: #dcfce7;">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #d97706 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">OT Room 02 (Minor)</span>
                        <h3 class="fw-extrabold text-warning mb-0" style="font-size: 1.15rem;">In-Progress</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-left: 4px solid #0284c7 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Surgical Team</span>
                        <h3 class="fw-extrabold text-dark mb-0">04 Surgeons</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scheduled Surgeries Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-scissors text-success" style="color: #0d7c66 !important;"></i> Scheduled Surgical Procedures Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Operation Theatre Roster
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Surgical Procedure</th>
                        <th>Lead Surgeon</th>
                        <th>OT Room</th>
                        <th>Schedule Time</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">OT Action</th>
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
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Abdul Kuddus</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: SURG-201 • Male (54)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Laparoscopic Cholecystectomy
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-person-badge text-success me-1" style="color: #0d7c66 !important;"></i> Prof. Dr. Shafiqul Islam</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Anesthesia: Dr. Nusrat Jahan</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.78rem;">
                                OT Room 01 (Major)
                            </span>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-success" style="color: #0d7c66 !important;"></i> Today, 10:30 AM
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Scheduled</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Managing OT schedule for SURG-201');">
                                <i class="bi bi-pencil-square me-1"></i> Manage OT
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #d97706; font-size: 0.9rem;">
                                    RS
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Runa Begum</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: SURG-205 • Female (28)</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Elective Caesarean Section (LUCS)
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-person-badge text-warning me-1"></i> Dr. Syeda Sultana</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Anesthesia: Dr. Mahbub Rahman</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.78rem;">
                                OT Room 02 (Minor)
                            </span>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-warning"></i> Today, 01:15 PM
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">In-Progress</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-warning text-dark rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing surgery in-progress status');">
                                <i class="bi bi-activity me-1"></i> Live Status
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Book Surgery OT -->
<div class="modal fade" id="newOtModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-calendar-plus-fill text-success me-2" style="color: #0d7c66 !important;"></i> Book Surgery Operation Theatre
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Surgery OT booked successfully!'); bootstrap.Modal.getInstance(document.getElementById('newOtModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Code *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Abdul Kuddus (PAT-1092)" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Surgical Procedure Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Laparoscopic Cholecystectomy" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Lead Surgeon *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Prof. Dr. Shafiqul Islam" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">OT Room *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="OT-1">OT Room 01 (Major)</option>
                                <option value="OT-2">OT Room 02 (Minor)</option>
                                <option value="OT-3">OT Room 03 (Emergency)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Scheduled Date & Time *</label>
                        <input type="datetime-local" class="form-control rounded-3 p-2.5 fw-semibold" required value="<?= date('Y-m-d\TH:i') ?>">
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm OT Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
