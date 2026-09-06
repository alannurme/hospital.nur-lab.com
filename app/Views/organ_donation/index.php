<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Organ Donation & Transplant Registry | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1 fw-bold">
                    <i class="bi bi-heart-pulse me-1"></i> Organ & Tissue Bank
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Transplant Registry</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Organ Donation & Transplant Registry</h4>
            <p class="text-muted small mb-0">Donor pledges, recipient waitlist matching & transplant surgery records for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newOrganDonorModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-person-heart"></i>
                <span>Register Organ Donor</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Registered Donors</span>
                        <h3 class="fw-extrabold text-dark mb-0">12 Donors</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-person-heart fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Recipient Waitlist</span>
                        <h3 class="fw-extrabold text-warning mb-0">05 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Successful Transplants</span>
                        <h3 class="fw-extrabold text-success mb-0" style="color: #0d7c66 !important;">08 Surgeries</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Compatible Matches</span>
                        <h3 class="fw-extrabold text-dark mb-0">02 Matches</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-diagram-3-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Organ Donor & Recipient Registry Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-heart-pulse text-danger"></i> Organ Pledges & Recipient Match Directory
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Transplant Registry
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Donor / Recipient Name</th>
                        <th>Organ Pledged / Needed</th>
                        <th>Blood Group & Tissue</th>
                        <th>Registration Type</th>
                        <th>Pledge Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    SK
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Shahidul Karim</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: ORG-102 • Age: 42 M</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Kidney (Renal Donation)
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-droplet-fill text-danger me-1"></i> O+ Positive</div>
                            <small class="text-muted" style="font-size: 0.72rem;">HLA Match Score: 94%</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.78rem;">
                                Living Voluntary Donor
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Matching Found</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Viewing transplant match details for ORG-102');">
                                <i class="bi bi-diagram-3 me-1"></i> Match Details
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #d97706; font-size: 0.9rem;">
                                    NA
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Nusrat Akhter</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: ORG-108 • Age: 29 F</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Cornea Tissue Pledge
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small"><i class="bi bi-droplet-fill text-danger me-1"></i> B+ Positive</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Tissue Type: Ocular</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.78rem;">
                                Cadaveric Pledge Card
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Pledged (Active)</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing pledge card for Nusrat Akhter');">
                                <i class="bi bi-card-checklist me-1"></i> Pledge Card
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Register Organ Donor -->
<div class="modal fade" id="newOrganDonorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-person-heart text-danger me-2"></i> Register Organ Donor Pledge
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Organ donor registered!'); bootstrap.Modal.getInstance(document.getElementById('newOrganDonorModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Donor Full Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Shahidul Karim" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Organ to Donate *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Kidney">Kidney (Renal)</option>
                                <option value="Cornea">Cornea Tissue</option>
                                <option value="Liver">Liver Lobe</option>
                                <option value="Heart">Heart Valve</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Blood Group *</label>
                            <select class="form-select rounded-3 p-2.5 fw-bold text-danger" required>
                                <option value="O+">O Positive (O+)</option>
                                <option value="A+">A Positive (A+)</option>
                                <option value="B+">B Positive (B+)</option>
                                <option value="AB+">AB Positive (AB+)</option>
                                <option value="O-">O Negative (O-)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Donor Contact / Mobile Phone *</label>
                        <input type="tel" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711223344" required>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Register Donor
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
