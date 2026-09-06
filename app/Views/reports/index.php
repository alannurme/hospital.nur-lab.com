<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Reports & Financial Analytics | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                    <i class="bi bi-graph-up-arrow me-1"></i> Executive Intelligence
                </span>
                <span class="text-muted">•</span>
                <span class="text-muted small">Financial & Clinical Analytics</span>
            </div>
            <h4 class="fw-bold text-dark mb-0">Hospital Reports & Financial Analytics</h4>
            <p class="text-muted small mb-0">Patient footfall analytics, revenue reports, OPD census & department performance for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-outline-secondary rounded-3 px-3.5 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2" onclick="window.print()" style="font-size: 0.88rem;">
                <i class="bi bi-printer"></i>
                <span>Print Analytics</span>
            </button>
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" onclick="alert('Exporting PDF Summary');" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                <span>Export PDF Summary</span>
            </button>
        </div>
    </div>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Monthly Total Income</span>
                        <h3 class="fw-extrabold text-dark mb-0" style="color: #0d7c66 !important;">৳ 4,25,000</h3>
                        <small class="text-success fw-semibold" style="font-size: 0.72rem;"><i class="bi bi-arrow-up-right me-1"></i> +14.2% Growth</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Pathology Tests Done</span>
                        <h3 class="fw-extrabold text-dark mb-0">152 Reports</h3>
                        <small class="text-muted" style="font-size: 0.72rem;">Lab Investigations</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #f3e8ff; color: #9333ea;">
                        <i class="bi bi-flask-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total OPD Footfall</span>
                        <h3 class="fw-extrabold text-dark mb-0">310 Visits</h3>
                        <small class="text-muted" style="font-size: 0.72rem;">Outpatient Consultations</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 44px; height: 44px; background: #e0f2fe;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Pharmacy Sales Revenue</span>
                        <h3 class="fw-extrabold text-dark mb-0">৳ 1,40,000</h3>
                        <small class="text-muted" style="font-size: 0.72rem;">Medicine Counter</small>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning" style="width: 44px; height: 44px; background: #fef3c7;">
                        <i class="bi bi-capsule-pill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Dashboard Cards -->
    <div class="row g-4 mb-4">
        <!-- Monthly Revenue & Patient Footfall Chart Card -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-graph-up text-success" style="color: #0d7c66 !important;"></i> Monthly Revenue & Footfall Analytics Trend
                    </h6>
                    <span class="badge border rounded-pill px-3 py-1 fw-bold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important;">
                        2026 Fiscal Year
                    </span>
                </div>

                <!-- SVG Trend Chart Visual -->
                <div class="p-3 bg-light rounded-4 mb-3" style="min-height: 200px;">
                    <svg viewBox="0 0 500 150" class="w-100 h-100" style="overflow: visible;">
                        <defs>
                            <linearGradient id="emeraldGradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#0d7c66" stop-opacity="0.3" />
                                <stop offset="100%" stop-color="#0d7c66" stop-opacity="0.0" />
                            </linearGradient>
                        </defs>
                        <path d="M 0,110 Q 75,70 150,90 T 300,40 T 450,20 L 450,140 L 0,140 Z" fill="url(#emeraldGradient)" />
                        <path d="M 0,110 Q 75,70 150,90 T 300,40 T 450,20" fill="none" stroke="#0d7c66" stroke-width="3.5" />
                        
                        <circle cx="0" cy="110" r="5" fill="#0d7c66" />
                        <circle cx="150" cy="90" r="5" fill="#0d7c66" />
                        <circle cx="300" cy="40" r="5" fill="#0d7c66" />
                        <circle cx="450" cy="20" r="6" fill="#0d7c66" stroke="#ffffff" stroke-width="2" />
                    </svg>
                </div>

                <div class="row g-3 text-center border-top pt-3">
                    <div class="col-4">
                        <small class="text-muted d-block mb-1">IPD Hospitalization</small>
                        <strong class="text-dark font-monospace">৳ 2,10,000</strong>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block mb-1">OPD Consultations</small>
                        <strong class="text-dark font-monospace">৳ 75,000</strong>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block mb-1">Diagnostics & Lab</small>
                        <strong class="font-monospace" style="color: #0d7c66;">৳ 1,40,000</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Downloadable Analytical Reports Directory Card -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-spreadsheet text-success" style="color: #0d7c66 !important;"></i> Downloadable Reports
                </h6>

                <div class="list-group list-group-flush space-y-2">
                    <a href="#" class="list-group-item list-group-item-action border rounded-3 p-3 mb-2 d-flex align-items-center justify-content-between" onclick="event.preventDefault(); alert('Downloading Financial Ledger Report...');">
                        <div class="d-flex align-items-center gap-2.5">
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; background: #0d7c66;">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.85rem;">Financial Ledger Report</div>
                                <small class="text-muted" style="font-size: 0.72rem;">August 2026 • PDF / Excel</small>
                            </div>
                        </div>
                        <i class="bi bi-download text-muted"></i>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action border rounded-3 p-3 mb-2 d-flex align-items-center justify-content-between" onclick="event.preventDefault(); alert('Downloading Patient Census Report...');">
                        <div class="d-flex align-items-center gap-2.5">
                            <div class="rounded-circle text-info d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; background: #e0f2fe;">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.85rem;">Patient Census & OPD Log</div>
                                <small class="text-muted" style="font-size: 0.72rem;">Monthly Footfall Summary</small>
                            </div>
                        </div>
                        <i class="bi bi-download text-muted"></i>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action border rounded-3 p-3 mb-2 d-flex align-items-center justify-content-between" onclick="event.preventDefault(); alert('Downloading Inventory Valuation Report...');">
                        <div class="d-flex align-items-center gap-2.5">
                            <div class="rounded-circle text-warning d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; background: #fef3c7;">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.85rem;">Store Inventory Valuation</div>
                                <small class="text-muted" style="font-size: 0.72rem;">Medicine & Supply Audit</small>
                            </div>
                        </div>
                        <i class="bi bi-download text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
