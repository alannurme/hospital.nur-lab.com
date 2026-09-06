<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Biomedical Waste Management | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-trash3 me-1"></i> Bio-Safety Operations
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Hazardous Waste Disposal</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Bio-Medical Waste Management</h4>
            <p class="text-muted small mb-0">Sharps disposal, infectious waste logs, color-coded segregation bins & environmental safety compliance for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newWasteModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Log Waste Disposal</span>
            </button>
        </div>
    </div>

    <!-- Color Coded Waste Category Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-top: 4px solid #eab308 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fw-bold small d-block mb-1 text-warning">Yellow Bag (Infectious)</span>
                        <h3 class="fw-extrabold text-dark mb-0">45 Kg Today</h3>
                        <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Soiled & Anatomical Waste</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef9c3;">
                        <i class="bi bi-biohazard fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fw-bold small d-block mb-1 text-danger">Red Bag (Contaminated)</span>
                        <h3 class="fw-extrabold text-dark mb-0">28 Kg Today</h3>
                        <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Tubing, Syringes & Catheters</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 44px; height: 44px; background: #fee2e2;">
                        <i class="bi bi-trash3-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-top: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fw-bold small d-block mb-1" style="color: #0d7c66;">White Box (Sharps)</span>
                        <h3 class="fw-extrabold text-dark mb-0">12 Kg Today</h3>
                        <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Needles & Scalpel Blades</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-shield-slash-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100" style="border-top: 4px solid #0284c7 !important;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fw-bold small d-block mb-1 text-info">Blue Box (Glassware)</span>
                        <h3 class="fw-extrabold text-dark mb-0">15 Kg Today</h3>
                        <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Medicine Vials & Ampoules</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-box-seam-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bio-Medical Waste Pickup & Incineration Log Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-journal-check text-success" style="color: #0d7c66 !important;"></i> Daily Waste Disposal & Vendor Transfer Log
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Environmental Compliance
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Disposal Log ID</th>
                        <th>Waste Category</th>
                        <th>Weight (Kg) & Source</th>
                        <th>Authorized Vendor / Handler</th>
                        <th>Transfer Date</th>
                        <th>Compliance Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                WST-2026-401
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Yellow Bin (Anatomical)
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">45.0 Kg</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Source: OT & ICU Wards</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-truck text-success me-1" style="color: #0d7c66 !important;"></i> PRISM Bangladesh Foundation</span>
                        </td>
                        <td class="text-muted small">Today, 09:30 AM</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Manifest Signed</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Viewing waste manifest receipt for WST-2026-401');">
                                <i class="bi bi-receipt me-1"></i> Receipt
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="font-size: 0.78rem;">
                                WST-2026-402
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Red Bin (Plastics / Syringes)
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark small">28.0 Kg</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Source: Pathology & Dialysis</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-truck text-secondary me-1"></i> PRISM Bangladesh Foundation</span>
                        </td>
                        <td class="text-muted small">Today, 09:30 AM</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Manifest Signed</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing waste manifest receipt for WST-2026-402');">
                                <i class="bi bi-receipt me-1"></i> Receipt
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Log Waste Disposal -->
<div class="modal fade" id="newWasteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-trash3-fill text-success me-2" style="color: #0d7c66 !important;"></i> Log Bio-Medical Waste Transfer
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Waste disposal log created!'); bootstrap.Modal.getInstance(document.getElementById('newWasteModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Waste Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Yellow">Yellow Bag (Infectious)</option>
                                <option value="Red">Red Bag (Contaminated Plastic)</option>
                                <option value="White">White Box (Sharps / Needles)</option>
                                <option value="Blue">Blue Box (Glass Vials)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Weight (Kg) *</label>
                            <input type="number" step="0.1" class="form-control rounded-3 p-2.5 fw-bold" placeholder="25.5" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Source Ward / Department *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. OT 01 & General Ward A" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Authorized Vendor Handler *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" value="PRISM Bangladesh Foundation" required>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Disposal Log
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
