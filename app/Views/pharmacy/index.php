<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Pharmacy Inventory & Medicines | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Pharmacy Medicine Inventory</h4>
            <p class="text-muted small mb-0">Manage hospital pharmaceutical stock, unit prices & inventory levels for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newMedicineModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-capsule"></i>
                <span>Add Medicine Item</span>
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background: #e6f4f1; color: #0d7c66;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php
        $totalItems = count($items);
        $inStockCount = count(array_filter($items, fn($i) => ($i['stock_qty'] ?? 0) > 100));
        $lowStockCount = count(array_filter($items, fn($i) => ($i['stock_qty'] ?? 0) > 0 && ($i['stock_qty'] ?? 0) <= 100));
        $totalValue = array_sum(array_map(fn($i) => ($i['stock_qty'] ?? 0) * ($i['unit_price'] ?? 0), $items));
    ?>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Medicine Items</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= $totalItems ?></h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Adequate In-Stock</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= $inStockCount ?></h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Low Stock Alerts</span>
                        <h3 class="fw-extrabold text-warning mb-0"><?= $lowStockCount ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Stock Value</span>
                        <h3 class="fw-extrabold text-dark mb-0">৳ <?= number_format($totalValue, 0) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pharmacy Inventory List Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-prescription2 text-success" style="color: #0d7c66 !important;"></i> Pharmaceutical Stock Directory
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= $totalItems ?> Stock Items
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Medicine Item Name</th>
                        <th>Category</th>
                        <th>Available Stock Qty</th>
                        <th>Unit Price</th>
                        <th>Stock Status</th>
                        <th class="pe-4 text-end">Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($items)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-capsule fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No pharmacy items in inventory yet. Click "Add Medicine Item" to add stock.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #0d7c66; font-size: 0.9rem;">
                                            <i class="bi bi-capsule"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;"><?= esc($item['item_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.75rem;">ID: MED-<?= sprintf('%04d', $item['id'] ?? rand(100, 999)) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge border rounded-pill px-3 py-1 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.75rem;">
                                        <?= esc($item['category']) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark font-monospace" style="font-size: 0.9rem;"><?= number_format($item['stock_qty']) ?></span>
                                    <small class="text-muted">units</small>
                                </td>
                                <td>
                                    <strong class="font-monospace" style="color: #0d7c66;">৳ <?= number_format($item['unit_price'], 2) ?></strong>
                                </td>
                                <td>
                                    <?php if ($item['stock_qty'] > 100): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">In Stock</span>
                                    <?php elseif ($item['stock_qty'] > 0): ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Low Stock</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">Out of Stock</span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end text-muted small">
                                    <?= date('M d, Y', strtotime($item['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Medicine Item -->
<div class="modal fade" id="newMedicineModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-capsule-fill text-success me-2" style="color: #0d7c66 !important;"></i> Add Medicine to Inventory
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('pharmacy/create') ?>" method="POST">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Medicine Item Name *</label>
                        <input type="text" name="item_name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Napa Extra 500mg" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Category</label>
                        <select name="category" class="form-select rounded-3 p-2.5 fw-semibold">
                            <option value="Tablet">Tablet / Capsule</option>
                            <option value="Syrup">Syrup / Suspension</option>
                            <option value="Injection">Injection / IV</option>
                            <option value="Ointment">Ointment / Cream</option>
                            <option value="Equipment">Medical Supply / Bandage</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Stock Quantity *</label>
                            <input type="number" name="stock_qty" class="form-control rounded-3 p-2.5 fw-bold" placeholder="500" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Unit Price (BDT) *</label>
                            <input type="number" step="0.01" name="unit_price" class="form-control rounded-3 p-2.5 fw-bold" placeholder="2.50" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Medicine
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
