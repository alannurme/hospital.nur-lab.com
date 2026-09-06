<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Patient Feedback, Complaints & NPS | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-star-fill me-1"></i> Patient Experience
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Quality Assurance & Redressal</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Patient Feedback & Quality Assurance</h4>
            <p class="text-muted small mb-0">Patient satisfaction ratings, Net Promoter Score (NPS), grievance redressal & clinical suggestions for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newFeedbackModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-chat-left-heart-fill"></i>
                <span>Add Feedback Entry</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Satisfaction Rating</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">4.8 <span class="fs-6 text-warning">★</span></h3>
                        <small class="text-muted" style="font-size: 0.72rem;">Based on 340 Reviews</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-star-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Net Promoter Score</span>
                        <h3 class="fw-extrabold text-dark mb-0">+78 NPS</h3>
                        <small class="text-success fw-semibold" style="font-size: 0.72rem;">World Class Score</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-emoji-smile-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Resolved Tickets</span>
                        <h3 class="fw-extrabold text-dark mb-0">98.5 %</h3>
                        <small class="text-muted" style="font-size: 0.72rem;">Redressal Rate</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 44px; height: 44px; background: #dcfce7;">
                        <i class="bi bi-check-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Open Grievance Tickets</span>
                        <h3 class="fw-extrabold text-danger mb-0">01 Ticket</h3>
                        <small class="text-muted" style="font-size: 0.72rem;">In Quality Review</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 44px; height: 44px; background: #fee2e2;">
                        <i class="bi bi-exclamation-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Patient Reviews & Grievance Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-chat-left-text text-success" style="color: #0d7c66 !important;"></i> Patient Experience Reviews & Grievance Logs
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Patient Feedback Registry
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Rating</th>
                        <th>Department / Service</th>
                        <th>Patient Comments / Review</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    RA
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Rizwan Ahmed</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: FBD-801 • Outpatient</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-bold text-warning" style="background: #fffbe6; border-color: #fef08a !important; font-size: 0.82rem;">
                                ★★★★★ (5/5)
                            </span>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small"><i class="bi bi-building text-success me-1" style="color: #0d7c66 !important;"></i> Cardiology & OPD</span>
                        </td>
                        <td>
                            <small class="text-muted" style="max-width: 250px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.8rem;">
                                Excellent doctor behavior and very clean hospital environment. Prompt service!
                            </small>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Verified</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Thanking patient Rizwan Ahmed');">
                                <i class="bi bi-reply me-1"></i> Respond
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #dc2626; font-size: 0.9rem;">
                                    SB
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Sufia Begum</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: FBD-805 • In-Patient</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.82rem;">
                                ★★☆☆☆ (2/5)
                            </span>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small"><i class="bi bi-building text-danger me-1"></i> Billing & Pharmacy Desk</span>
                        </td>
                        <td>
                            <small class="text-muted" style="max-width: 250px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.8rem;">
                                Discharge billing process took 45 minutes delay at counter 2.
                            </small>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">In Redressal</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing redressal ticket details');">
                                <i class="bi bi-ticket-detailed me-1"></i> View Ticket
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add Feedback Entry -->
<div class="modal fade" id="newFeedbackModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-chat-left-heart-fill text-success me-2" style="color: #0d7c66 !important;"></i> Record Patient Feedback
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Feedback entry recorded!'); bootstrap.Modal.getInstance(document.getElementById('newFeedbackModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Phone *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Rizwan Ahmed (01711223344)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Satisfaction Rating *</label>
                            <select class="form-select rounded-3 p-2.5 fw-bold text-warning" required>
                                <option value="5">★★★★★ (5 Stars - Excellent)</option>
                                <option value="4">★★★★☆ (4 Stars - Good)</option>
                                <option value="3">★★★☆☆ (3 Stars - Average)</option>
                                <option value="2">★★☆☆☆ (2 Stars - Poor)</option>
                                <option value="1">★☆☆☆☆ (1 Star - Very Poor)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Department</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="OPD">OPD Consultation</option>
                                <option value="IPD">In-Patient Ward</option>
                                <option value="Pharmacy">Pharmacy Services</option>
                                <option value="Billing">Billing & Reception</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Patient Comments / Feedback</label>
                        <textarea class="form-control rounded-3 p-2.5 fw-semibold" rows="3" placeholder="Detailed feedback or grievance comments..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
