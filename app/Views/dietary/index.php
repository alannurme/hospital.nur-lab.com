<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Dietary & Clinical Nutrition | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-egg-fried me-1"></i> Clinical Nutrition
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">In-Patient Food Services</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Dietary & In-Patient Meal Management</h4>
            <p class="text-muted small mb-0">Customized therapeutic meal plans, nutritionist diets & ward meal deliveries for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newDietPlanModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Add Meal Plan</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total In-Patient Meals</span>
                        <h3 class="fw-extrabold text-dark mb-0">37 Meals</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-cup-hot-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Diabetic Soft Diets</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">18 Meals</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-apple fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">ICU Enteral Feeds</span>
                        <h3 class="fw-extrabold text-danger mb-0">06 Patients</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 44px; height: 44px; background: #fee2e2;">
                        <i class="bi bi-activity fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Regular Recovery Diets</span>
                        <h3 class="fw-extrabold text-dark mb-0">13 Meals</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-basket-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Patient Meal Plans Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-egg-fried text-success" style="color: #0d7c66 !important;"></i> Ward In-Patient Meal Delivery Worklist
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Daily Dietary Roster
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient & Ward Bed</th>
                        <th>Diet Plan Category</th>
                        <th>Clinical Restrictions</th>
                        <th>Meal Type</th>
                        <th>Delivery Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    AH
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Anowar Hossain</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">General Ward A • Bed 04</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Low Sugar Diabetic Soft Diet
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark small">No Added Sugar • Salt < 2g</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Calorie Target: 1800 kcal</small>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-success" style="color: #0d7c66 !important;"></i> Lunch (12:30 PM)
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Delivered</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Viewing meal plan for Anowar Hossain');">
                                <i class="bi bi-check-circle me-1"></i> Log Delivery
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #dc2626; font-size: 0.9rem;">
                                    KH
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Kamrul Hasan</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ICU Unit • Bed 02</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                High Protein Enteral Liquid Feed
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark small">Nasogastric Tube (NG Feed)</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Every 4 Hours (200 ml)</small>
                        </td>
                        <td class="text-muted small">
                            <i class="bi bi-clock me-1 text-danger"></i> Afternoon Feed (02:00 PM)
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">In Prep</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Preparing enteral feed');">
                                <i class="bi bi-hourglass-split me-1"></i> In Prep
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add Meal Plan -->
<div class="modal fade" id="newDietPlanModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-egg-fried text-success me-2" style="color: #0d7c66 !important;"></i> Assign Patient Diet Plan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Meal plan assigned!'); bootstrap.Modal.getInstance(document.getElementById('newDietPlanModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Patient Name / Room No. *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Anowar Hossain (Bed 04)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Therapeutic Diet Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Diabetic Soft">Diabetic Soft Diet</option>
                                <option value="Liquid Feed">ICU Liquid Tube Feed</option>
                                <option value="Low Salt">Low Salt Cardiac Diet</option>
                                <option value="Regular">Regular Recovery Meal</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Calorie Goal (kcal)</label>
                            <input type="number" class="form-control rounded-3 p-2.5 fw-bold" placeholder="1800">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Clinical Dietary Restrictions / Allergies</label>
                        <textarea class="form-control rounded-3 p-2.5 fw-semibold" rows="2" placeholder="e.g. No seafood, low sodium, sugar-free..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Meal Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
