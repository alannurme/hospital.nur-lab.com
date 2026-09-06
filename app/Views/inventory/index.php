<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Inventory & Assets | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-box-seam me-1"></i> Asset & Supply Chain
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Store Management</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Inventory & Medical Supplies</h4>
            <p class="text-muted small mb-0">Surgical gloves, syringes, oxygen cylinders, PPE kits & medical asset tracking for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newInventoryModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-box-arrow-in-down-fill"></i>
                <span>Add Inventory Stock</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Stock Items</span>
                        <h3 class="fw-extrabold text-dark mb-0">48 SKUs</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-box-seam-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Surgical Gloves (Box)</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">120 Boxes</h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Disposable Syringes 5ml</span>
                        <h3 class="fw-extrabold text-dark mb-0">1,500 Pcs</h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-eyedropper fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Oxygen Cylinders (Large)</span>
                        <h3 class="fw-extrabold text-danger mb-0">18 Units</h3>
                        <small class="text-danger fw-semibold" style="font-size: 0.72rem;">Re-order Alert (< 20)</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 44px; height: 44px; background: #fee2e2;">
                        <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Stock Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-box-seam text-success" style="color: #0d7c66 !important;"></i> Medical Equipment & Surgical Supplies Stock Directory
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Store Inventory Roster
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Item Name & SKU</th>
                        <th>Category</th>
                        <th>Available Stock</th>
                        <th>Supplier / Vendor</th>
                        <th>Unit Price</th>
                        <th>Stock Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    SG
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Surgical Gloves Powder-Free</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">SKU: INV-GLV-102 • Size: M/L</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge border rounded-pill px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                Surgical Consumables
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark font-monospace">120 Boxes</div>
                            <small class="text-muted" style="font-size: 0.72rem;">Min Re-order: 30 Boxes</small>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark small"><i class="bi bi-building text-success me-1" style="color: #0d7c66 !important;"></i> MedTech Pharma Ltd.</span>
                        </td>
                        <td>
                            <strong class="font-monospace" style="color: #0d7c66;">৳ 450.00 / Box</strong>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Adequate Stock</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold shadow-sm" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Updating stock for Surgical Gloves');">
                                <i class="bi bi-pencil-square me-1"></i> Update Stock
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #dc2626; font-size: 0.9rem;">
                                    OX
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Medical Oxygen Cylinder (47L)</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">SKU: INV-OXY-204 • High Pressure</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-semibold" style="font-size: 0.78rem;">
                                Medical Gas & Oxygen
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-danger font-monospace">18 Units</div>
                            <small class="text-danger fw-semibold" style="font-size: 0.72rem;">Min Re-order: 20 Units</small>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-building text-danger me-1"></i> Linde Bangladesh Ltd.</span>
                        </td>
                        <td>
                            <strong class="font-monospace text-dark">৳ 1,200.00 / Refill</strong>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">Re-order Alert</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-danger rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Ordering refill for Oxygen Cylinders');">
                                <i class="bi bi-arrow-repeat me-1"></i> Re-order Stock
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add Inventory Stock -->
<div class="modal fade" id="newInventoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-box-arrow-in-down-fill text-success me-2" style="color: #0d7c66 !important;"></i> Add Medical Supply / Asset
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Inventory item added successfully!'); bootstrap.Modal.getInstance(document.getElementById('newInventoryModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Item Name & SKU Code *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Surgical Gloves (INV-GLV-102)" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Category *</label>
                            <select class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Surgical">Surgical Consumables</option>
                                <option value="Oxygen">Medical Gas & Oxygen</option>
                                <option value="PPE">PPE & Hygiene Supplies</option>
                                <option value="Diagnostic">Diagnostic Test Reagents</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Initial Quantity *</label>
                            <input type="number" class="form-control rounded-3 p-2.5 fw-bold" placeholder="100" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Unit Cost (BDT) *</label>
                            <input type="number" step="0.01" class="form-control rounded-3 p-2.5 fw-bold" placeholder="450.00" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Supplier Vendor *</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. MedTech Pharma Ltd." required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Inventory Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
