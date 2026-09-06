<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Invoices & Billing Management | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Invoices & Patient Billing</h4>
            <p class="text-muted small mb-0">Manage clinical billing statements, payment collections & revenue tracking for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newInvoiceModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Create Invoice</span>
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
        $totalBilled = array_sum(array_column($invoices, 'total_amount'));
        $totalCollected = array_sum(array_column($invoices, 'paid_amount'));
        $totalDue = $totalBilled - $totalCollected;
    ?>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Invoices</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($invoices) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-receipt fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Billed Revenue</span>
                        <h3 class="fw-extrabold text-dark mb-0">৳ <?= number_format($totalBilled, 0) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-wallet2 fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Cash Collected</span>
                        <h3 class="fw-extrabold text-dark mb-0">৳ <?= number_format($totalCollected, 0) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #dcfce7; color: #16a34a;">
                        <i class="bi bi-cash-coin fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Outstanding Dues</span>
                        <h3 class="fw-extrabold text-danger mb-0">৳ <?= number_format($totalDue, 0) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fee2e2; color: #dc2626;">
                        <i class="bi bi-exclamation-circle-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoices List Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-spreadsheet text-success" style="color: #0d7c66 !important;"></i> Patient Billing Records & Statements
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($invoices) ?> Invoices Issued
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Invoice #</th>
                        <th>Patient Details</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Date Issued</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($invoices)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-receipt fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No billing invoices generated yet. Click "Create Invoice" to generate a patient bill.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($invoices as $inv): ?>
                            <?php 
                                $due = $inv['total_amount'] - $inv['paid_amount'];
                                $patientInitials = strtoupper(substr($inv['patient_name'] ?? 'P', 0, 2));
                            ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <span class="badge border rounded-pill px-3 py-1.5 font-monospace fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.78rem;">
                                        <?= esc($inv['invoice_code']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; background: #0d7c66; font-size: 0.82rem;">
                                            <?= esc($patientInitials) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.88rem;"><?= esc($inv['patient_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.72rem;"><?= esc($inv['patient_code']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-bold text-dark font-monospace">৳ <?= number_format($inv['total_amount'], 2) ?></td>
                                <td class="fw-bold text-success font-monospace" style="color: #0d7c66 !important;">৳ <?= number_format($inv['paid_amount'], 2) ?></td>
                                <td class="fw-bold font-monospace <?= $due > 0 ? 'text-danger' : 'text-muted' ?>">৳ <?= number_format($due, 2) ?></td>
                                <td>
                                    <?php if ($inv['payment_status'] === 'paid'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Paid</span>
                                    <?php elseif ($inv['payment_status'] === 'partial'): ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Partial</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">Unpaid</span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end text-muted small">
                                    <?= date('M d, Y', strtotime($inv['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Invoice -->
<div class="modal fade" id="newInvoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-receipt-cutoff text-success me-2" style="color: #0d7c66 !important;"></i> Create Patient Invoice
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('billing/create') ?>" method="POST">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Select Patient *</label>
                        <select name="patient_id" class="form-select rounded-3 p-2.5 fw-semibold" required>
                            <option value="">-- Choose Registered Patient --</option>
                            <?php foreach ($patients as $p): ?>
                                <option value="<?= $p['id'] ?>"><?= esc($p['name']) ?> (<?= esc($p['patient_code']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Total Bill Amount (BDT) *</label>
                            <input type="number" step="0.01" name="total_amount" class="form-control rounded-3 p-2.5 fw-bold" placeholder="1500.00" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Paid Amount (BDT) *</label>
                            <input type="number" step="0.01" name="paid_amount" class="form-control rounded-3 p-2.5 fw-bold text-success" placeholder="1500.00" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Generate Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
