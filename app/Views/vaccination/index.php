<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Vaccination & Immunization Tracker | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-shield-check me-1"></i> Immunization Center
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">EPI & Travel Vaccines</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Vaccination & Immunization Tracker</h4>
            <p class="text-muted small mb-0">Childhood EPI vaccines, COVID-19 boosters, Hepatitis B, Tetanus & travel vaccine inventory for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newVaccinationModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-patch-check-fill"></i>
                <span>Administer Vaccine</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Vaccine Vials</span>
                        <h3 class="fw-extrabold text-dark mb-0">650 Vials</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-capsule-pill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Doses Given Today</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">42 Doses</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">EPI Infants Covered</span>
                        <h3 class="fw-extrabold text-dark mb-0">28 Children</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Adult / Travel Vaccines</span>
                        <h3 class="fw-extrabold text-dark mb-0">14 Doses</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-airplane-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vaccine Stock & Doses Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-shield-check text-success" style="color: #0d7c66 !important;"></i> Immunization Stock & Daily Administration Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Vaccine Inventory
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Vaccine Name</th>
                        <th>Target Disease</th>
                        <th>Available Stock</th>
                        <th>Doses Given Today</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    HB
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Hepatitis B (Engerix-B)</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Batch: HB-2026-X8</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Hepatitis B Virus (HBV)
                            </span>
                        </td>
                        <td class="fw-bold text-dark font-monospace" style="font-size: 0.9rem;">
                            250 Vials
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-check-circle text-success me-1" style="color: #0d7c66 !important;"></i> 14 Doses</span>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">In Stock</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Administering Hepatitis B vaccine');">
                                <i class="bi bi-patch-check me-1"></i> Administer
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0284c7; font-size: 0.9rem;">
                                    BP
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">BCG & Polio (OPV)</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">Batch: EPI-CHILD-2026</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Tuberculosis & Polio
                            </span>
                        </td>
                        <td class="fw-bold text-dark font-monospace" style="font-size: 0.9rem;">
                            400 Vials
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-check-circle text-info me-1"></i> 28 Doses</span>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">In Stock</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Administering BCG & Polio vaccine');">
                                <i class="bi bi-patch-check me-1"></i> Administer
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Administer Vaccine -->
<div class="modal fade" id="newVaccinationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-patch-check-fill text-success me-2" style="color: #0d7c66 !important;"></i> Administer Vaccine Dose
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Vaccine dose administered!'); bootstrap.Modal.getInstance(document.getElementById('newVaccinationModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient / Child Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Baby of Sufia Begum" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Vaccine Type *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Hepatitis B">Hepatitis B (Engerix-B)</option>
                                <option value="BCG">BCG & Polio (OPV)</option>
                                <option value="COVID-19">COVID-19 Booster</option>
                                <option value="Tetanus">Tetanus Toxoid (TT)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Dose Number *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="1">1st Dose (Initial)</option>
                                <option value="2">2nd Dose</option>
                                <option value="3">3rd Dose / Booster</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Administering Nurse / Medical Officer *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Sharmin Sultana (Senior Nurse)" required>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Record Vaccine Dose
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
