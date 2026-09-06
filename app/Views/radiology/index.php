<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Radiology & Diagnostic Imaging | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Radiology & Diagnostic Imaging</h4>
            <p class="text-muted small mb-0">X-Ray, Ultrasonography (USG), CT Scan, MRI & ECG test workflow for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newImagingOrderModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-x-ray"></i>
                <span>New Imaging Order</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Imaging Scans</span>
                        <h3 class="fw-extrabold text-dark mb-0">28 Orders</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-cpu-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Digital X-Ray</span>
                        <h3 class="fw-extrabold text-dark mb-0">14 Done</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-body-text fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">USG (Ultrasonography)</span>
                        <h3 class="fw-extrabold text-dark mb-0">09 Scans</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #f3e8ff; color: #9333ea;">
                        <i class="bi bi-activity fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">CT Scan & MRI</span>
                        <h3 class="fw-extrabold text-dark mb-0">05 Scheduled</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-disc-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Imaging Orders Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-x-ray text-success" style="color: #0d7c66 !important;"></i> Radiology & Imaging Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Live Imaging Orders
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Test / Scan Type</th>
                        <th>Ref. Doctor</th>
                        <th>Order Date</th>
                        <th>Report Status</th>
                        <th class="pe-4 text-end">DICOM Report</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    FH
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Faruk Hossain</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Code: P-1002 • Male</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Chest X-Ray Digital PA View
                            </span>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small">Dr. Mahbub Rahman</span>
                        </td>
                        <td class="text-muted small">Sep 06, 2026</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Completed</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Viewing DICOM scan for Faruk Hossain');">
                                <i class="bi bi-file-earmark-medical me-1"></i> View Scan
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #9333ea; font-size: 0.9rem;">
                                    NS
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Nasrin Sultana</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Code: P-1005 • Female</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #f3e8ff; color: #9333ea; border-color: #e9d5ff; font-size: 0.78rem;">
                                Whole Abdomen USG Scan
                            </span>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small">Dr. Farhana Islam</span>
                        </td>
                        <td class="text-muted small">Sep 06, 2026</td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Processing</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Scan report still processing');">
                                <i class="bi bi-clock me-1"></i> Pending
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Imaging Order -->
<div class="modal fade" id="newImagingOrderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-x-ray text-success me-2" style="color: #0d7c66 !important;"></i> Order Radiology Scan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Radiology imaging order placed!'); bootstrap.Modal.getInstance(document.getElementById('newImagingOrderModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / ID *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Faruk Hossain (P-1002)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Scan Modality *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="X-Ray">Digital X-Ray</option>
                                <option value="USG">Ultrasonography (USG)</option>
                                <option value="CT">CT Scan</option>
                                <option value="MRI">MRI Scan</option>
                                <option value="ECG">ECG / Echo</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Test Fee (BDT)</label>
                            <input type="number" class="form-control rounded-3 p-2.5 fw-bold" placeholder="1200.00" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Clinical Indications / Notes</label>
                        <textarea class="form-control rounded-3 p-2.5 fw-semibold" rows="2" placeholder="Chest pain, trauma suspicion, or routine check..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Submit Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
