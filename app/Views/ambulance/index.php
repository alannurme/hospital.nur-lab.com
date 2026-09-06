<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Ambulance Fleet & Emergency Dispatch | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1 fw-bold">
                    <i class="bi bi-truck me-1"></i> 24/7 Dispatch Unit
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Fleet Operations</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Ambulance Fleet & Emergency Dispatch</h4>
            <p class="text-muted small mb-0">Emergency ambulance booking, driver duty logs & real-time vehicle availability for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newAmbulanceModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-telephone-outbound-fill"></i>
                <span>Dispatch Ambulance</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Fleet Vehicles</span>
                        <h3 class="fw-extrabold text-dark mb-0">05 Vehicles</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-truck fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Ready Standby</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">03 Available</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">On Duty Trips</span>
                        <h3 class="fw-extrabold text-warning mb-0">02 Active</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-geo-alt-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Drivers On Call</span>
                        <h3 class="fw-extrabold text-dark mb-0">05 On Duty</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ambulance Fleet Cards Grid -->
    <div class="row g-4 mb-4">
        <!-- AMB-01 -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #0d7c66;">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Vehicle #AMB-01</h6>
                            <small class="text-muted" style="font-size: 0.75rem;">Reg: Dhaka Metro Ch-11-2091</small>
                        </div>
                    </div>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold">Available</span>
                </div>

                <div class="mb-3 space-y-1">
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Vehicle Type:</span>
                        <span class="fw-bold text-dark">ICU Support AC Ambulance</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Assigned Driver:</span>
                        <span class="fw-bold text-dark">Abdul Karim</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small">
                        <span class="text-muted">Mobile Contact:</span>
                        <strong class="font-monospace text-dark">+880 1700 112233</strong>
                    </div>
                </div>

                <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                    <span class="text-muted small"><i class="bi bi-geo-fill me-1 text-success" style="color: #0d7c66 !important;"></i> Standby at Garage</span>
                    <button class="btn btn-sm rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Dispatching AMB-01');">
                        <i class="bi bi-telephone-outbound me-1"></i> Dispatch Trip
                    </button>
                </div>
            </div>
        </div>

        <!-- AMB-02 -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #d97706 !important;">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #d97706;">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Vehicle #AMB-02</h6>
                            <small class="text-muted" style="font-size: 0.75rem;">Reg: Dhaka Metro Ch-11-4082</small>
                        </div>
                    </div>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1 fw-bold">On Duty Trip</span>
                </div>

                <div class="mb-3 space-y-1">
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Vehicle Type:</span>
                        <span class="fw-bold text-dark">Standard Patient Transport</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Assigned Driver:</span>
                        <span class="fw-bold text-dark">Rafiqul Alam</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small">
                        <span class="text-muted">Mobile Contact:</span>
                        <strong class="font-monospace text-dark">+880 1800 445566</strong>
                    </div>
                </div>

                <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                    <span class="text-muted small"><i class="bi bi-geo-alt-fill me-1 text-warning"></i> En Route: Uttara -> Hospital</span>
                    <button class="btn btn-sm btn-outline-warning text-dark rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Contacting Driver Rafiqul Alam');">
                        <i class="bi bi-telephone me-1"></i> Call Driver
                    </button>
                </div>
            </div>
        </div>

        <!-- AMB-03 -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #0d7c66;">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Vehicle #AMB-03</h6>
                            <small class="text-muted" style="font-size: 0.75rem;">Reg: Dhaka Metro Ch-12-8810</small>
                        </div>
                    </div>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold">Available</span>
                </div>

                <div class="mb-3 space-y-1">
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Vehicle Type:</span>
                        <span class="fw-bold text-dark">Freezer Ambulance Unit</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <span class="text-muted">Assigned Driver:</span>
                        <span class="fw-bold text-dark">Monir Hossain</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between small">
                        <span class="text-muted">Mobile Contact:</span>
                        <strong class="font-monospace text-dark">+880 1900 778899</strong>
                    </div>
                </div>

                <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                    <span class="text-muted small"><i class="bi bi-geo-fill me-1 text-success" style="color: #0d7c66 !important;"></i> Standby at Garage</span>
                    <button class="btn btn-sm rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Dispatching AMB-03');">
                        <i class="bi bi-telephone-outbound me-1"></i> Dispatch Trip
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Dispatch Ambulance -->
<div class="modal fade" id="newAmbulanceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-telephone-outbound-fill text-success me-2" style="color: #0d7c66 !important;"></i> Dispatch Emergency Ambulance
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Ambulance dispatched successfully!'); bootstrap.Modal.getInstance(document.getElementById('newAmbulanceModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient / Caller Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Sultan Mahmood" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Select Vehicle *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="AMB-01">AMB-01 (ICU Support AC)</option>
                                <option value="AMB-03">AMB-03 (Freezer Ambulance)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Caller Mobile *</label>
                            <input type="tel" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711223344" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Pickup Location / Address *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. House 42, Road 11, Banani, Dhaka" required>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Dispatch
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
