<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Ward & Bed Management | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Ward & Bed Occupancy Management</h4>
            <p class="text-muted small mb-0">Real-time status of General Wards, Private Cabins, ICU, CCU & Maternity bed allocations for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#allocateBedModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-door-open-fill"></i>
                <span>Allocate New Bed</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Bed Capacity</span>
                        <h3 class="fw-extrabold text-dark mb-0">50 Beds</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-hospital-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Occupied Beds</span>
                        <h3 class="fw-extrabold text-dark mb-0">37 Beds</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-person-workspace fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Available Free Beds</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">13 Free</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Hospital Occupancy</span>
                        <h3 class="fw-extrabold text-dark mb-0">74 %</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-pie-chart-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ward Cards Grid -->
    <div class="row g-4 mb-4">
        <!-- General Ward A -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #0d7c66 !important;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-building text-success" style="color: #0d7c66 !important;"></i> General Ward A
                    </h6>
                    <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">12/15 Occupied</span>
                </div>
                <small class="text-muted d-block mb-3">Male Medical & Surgical Ward • 2nd Floor</small>
                
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between small text-muted mb-1">
                        <span>Occupancy Rate</span>
                        <span class="fw-bold text-dark">80%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px; background: #e2e8f0;">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 80%; background: #0d7c66;"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">3 Beds Free</span>
                    <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing General Ward A details');">
                        View Ward
                    </button>
                </div>
            </div>
        </div>

        <!-- VIP Cabins -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #d97706 !important;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill text-warning"></i> VIP Deluxe Cabins
                    </h6>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1 fw-bold">04/05 Occupied</span>
                </div>
                <small class="text-muted d-block mb-3">Single AC Deluxe Cabins • 4th Floor</small>
                
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between small text-muted mb-1">
                        <span>Occupancy Rate</span>
                        <span class="fw-bold text-dark">80%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px; background: #e2e8f0;">
                        <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 80%"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">1 Cabin Available</span>
                    <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing VIP Cabins details');">
                        View Cabins
                    </button>
                </div>
            </div>
        </div>

        <!-- ICU Ward -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #dc2626 !important;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-heart-pulse-fill text-danger"></i> ICU Critical Unit
                    </h6>
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1 fw-bold">06/10 Occupied</span>
                </div>
                <small class="text-muted d-block mb-3">Intensive Care Unit • 3rd Floor</small>
                
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between small text-muted mb-1">
                        <span>Occupancy Rate</span>
                        <span class="fw-bold text-dark">60%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px; background: #e2e8f0;">
                        <div class="progress-bar bg-danger rounded-pill" role="progressbar" style="width: 60%"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">4 Beds Free</span>
                    <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing ICU Ward details');">
                        View ICU Wards
                    </button>
                </div>
            </div>
        </div>

        <!-- Pediatric Ward -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #0284c7 !important;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-emoji-smile-fill text-info"></i> Pediatric Ward
                    </h6>
                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1 fw-bold">05/08 Occupied</span>
                </div>
                <small class="text-muted d-block mb-3">Children & Neonatal Care Unit • 1st Floor</small>
                
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between small text-muted mb-1">
                        <span>Occupancy Rate</span>
                        <span class="fw-bold text-dark">62%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px; background: #e2e8f0;">
                        <div class="progress-bar bg-info rounded-pill" role="progressbar" style="width: 62%"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-3 py-1">3 Beds Free</span>
                    <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing Pediatric Ward details');">
                        View Ward
                    </button>
                </div>
            </div>
        </div>

        <!-- Maternity Ward -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden" style="border-top: 4px solid #9333ea !important;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-gender-female text-purple" style="color:#9333ea;"></i> Maternity & Labor Ward
                    </h6>
                    <span class="badge bg-purple-subtle text-purple border rounded-pill px-3 py-1 fw-bold" style="background:#f3e8ff; color:#9333ea; border-color:#e9d5ff;">08/10 Occupied</span>
                </div>
                <small class="text-muted d-block mb-3">Ante-Natal & Delivery Unit • 5th Floor</small>
                
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between small text-muted mb-1">
                        <span>Occupancy Rate</span>
                        <span class="fw-bold text-dark">80%</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 8px; background: #e2e8f0;">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 80%; background:#9333ea;"></div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                    <span class="badge border rounded-pill px-3 py-1 fw-semibold" style="background:#f3e8ff; color:#9333ea; border-color:#e9d5ff;">2 Beds Free</span>
                    <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Viewing Maternity Ward details');">
                        View Ward
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Allocate Bed -->
<div class="modal fade" id="allocateBedModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-door-open-fill text-success me-2" style="color: #0d7c66 !important;"></i> Allocate Hospital Bed
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Bed allocated successfully!'); bootstrap.Modal.getInstance(document.getElementById('allocateBedModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Select Patient Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Anowar Hossain (PAT-1082)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Select Ward Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="General A">General Ward A</option>
                                <option value="VIP Cabin">VIP Deluxe Cabin</option>
                                <option value="ICU">ICU Critical Care</option>
                                <option value="Pediatric">Pediatric Ward</option>
                                <option value="Maternity">Maternity Ward</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Bed / Room No. *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Bed 08 / Cabin 402" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Daily Rate (BDT) *</label>
                        <input type="number" step="0.01" class="form-control rounded-3 p-2.5 fw-bold" placeholder="2500.00" required>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Allocation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
