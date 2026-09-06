<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Hospital Overview | Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Top Welcome Greeting & Quick Actions Header -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Dashboard</h4>
            <p class="text-muted small mb-0">Overview of <strong><?= session()->get('tenant_name') ?></strong> activities & live EMR records today.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= base_url('hospital/patients/create') ?>" class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-plus-lg"></i>
                <span>Add Patient</span>
            </a>
            <a href="<?= base_url('hospital/appointments') ?>" class="btn btn-outline-secondary rounded-3 px-3.5 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2" style="font-size: 0.88rem;">
                <i class="bi bi-calendar-event"></i>
                <span>Appointments</span>
            </a>
        </div>
    </div>

    <!-- 8 Medcare Metric Cards Grid (Interactive Clickable Links) -->
    <div class="row g-3 mb-4">
        <!-- Row 1: Card 1 - Appointments (Active Emerald) -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/appointments') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 text-white h-100 position-relative overflow-hidden text-decoration-none text-card-hover" style="background: #0d7c66; cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold fs-6 text-white">Appointments</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 42px; height: 42px; background: rgba(255, 255, 255, 0.2);">
                        <i class="bi bi-calendar-check fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-white mb-0" style="font-size: 1.8rem;"><?= number_format($total_appointments) ?></h2>
                    <small class="text-white opacity-90 fw-semibold" style="font-size: 0.75rem;">
                        <i class="bi bi-check-circle-fill me-1"></i> Live DB Record
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 1: Card 2 - Registered Doctors -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/doctors') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Total Doctors</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #e6f4f1; color: #0d7c66;">
                        <i class="bi bi-person-badge-fill fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;"><?= number_format($total_doctors) ?></h2>
                    <small class="fw-semibold" style="font-size: 0.75rem; color: #0d7c66;">
                        <i class="bi bi-person-check-fill me-1"></i> Active Consultants
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 1: Card 3 - Revenue Collection -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/billing') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Revenue Collection</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-success" style="width: 42px; height: 42px; background: #dcfce7; color: #16a34a !important;">
                        <i class="bi bi-cash-stack fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;">৳<?= number_format($total_revenue) ?></h2>
                    <small class="text-success fw-semibold" style="font-size: 0.75rem;">
                        <i class="bi bi-arrow-up-right me-1"></i> Received Cash
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 1: Card 4 - Pending Due Revenue -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/billing') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Pending Due</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-danger" style="width: 42px; height: 42px; background: #fee2e2; color: #dc2626 !important;">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;">৳<?= number_format($pending_revenue) ?></h2>
                    <small class="text-danger fw-semibold" style="font-size: 0.75rem;">
                        <i class="bi bi-exclamation-circle me-1"></i> Uncollected Bills
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 2: Card 5 - Lab Reports -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/lab-reports') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Lab Reports</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-info" style="width: 42px; height: 42px; background: #e0f2fe;">
                        <i class="bi bi-file-earmark-medical-fill fs-5" style="color: #0284c7;"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;"><?= number_format($total_lab_reports) ?></h2>
                    <small class="text-primary fw-semibold" style="font-size: 0.75rem;">
                        <i class="bi bi-journal-check me-1"></i> Pathology Tests
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 2: Card 6 - Total Invoices -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/billing') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Total Invoices</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #ffedd5; color: #ea580c;">
                        <i class="bi bi-receipt fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;"><?= number_format($total_invoices) ?></h2>
                    <small class="fw-semibold" style="font-size: 0.75rem; color: #ea580c;">
                        <i class="bi bi-file-text me-1"></i> Billing Ledger
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 2: Card 7 - Pharmacy Stock -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/pharmacy') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Pharmacy Stock</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #f3e8ff; color: #9333ea;">
                        <i class="bi bi-capsule fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;"><?= number_format($total_pharmacy) ?></h2>
                    <small class="text-purple fw-semibold" style="font-size: 0.75rem; color:#9333ea;">
                        <i class="bi bi-box-seam me-1"></i> Active Items
                    </small>
                </div>
            </a>
        </div>

        <!-- Row 2: Card 8 - Total Patients -->
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?= base_url('hospital/patients') ?>" class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100 text-decoration-none text-card-hover" style="cursor: pointer; transition: transform 0.2s ease, shadow 0.2s ease;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold text-dark fs-6">Total Patients</span>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-shield-heart-fill fs-5"></i>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-auto">
                    <h2 class="fw-extrabold text-dark mb-0" style="font-size: 1.8rem;"><?= number_format($total_patients) ?></h2>
                    <small class="fw-semibold" style="font-size: 0.75rem; color: #0d7c66;">
                        <i class="bi bi-people-fill me-1"></i> Registered EMR
                    </small>
                </div>
            </a>
        </div>
    </div>

    <!-- Main Content Row 1: Upcoming Appointments Table & Patient Admissions Chart -->
    <div class="row g-4 mb-4">
        <!-- Upcoming Appointments Table Card (60%) -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white h-100">
                <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold text-dark mb-0">Upcoming Appointments</h6>
                    <a href="<?= base_url('hospital/appointments') ?>" class="text-success small fw-semibold text-decoration-none" style="color: #0d7c66 !important;">View All →</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted uppercase small fw-bold">
                            <tr>
                                <th class="ps-4 py-3">Time</th>
                                <th>Patient Name</th>
                                <th>Type / Dept</th>
                                <th>Doctor</th>
                                <th class="pe-4 text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_appointments)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-calendar-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                        No recent appointments booked yet.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($recent_appointments as $apt): ?>
                                    <tr>
                                        <td class="ps-4 py-3 text-muted fw-semibold" style="font-size: 0.85rem;">
                                            <?= date('h:i A', strtotime($apt['appointment_date'])) ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;"><?= esc($apt['patient_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.75rem;"><?= esc($apt['patient_code']) ?></small>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                                                <?= esc($apt['department']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="fw-semibold text-dark small"><?= esc($apt['doctor_name']) ?></div>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <?php if ($apt['status'] === 'confirmed'): ?>
                                                <span class="badge text-white rounded-pill px-3 py-1 fw-semibold" style="background: #0d7c66; font-size: 0.75rem;">Confirmed</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-1 fw-semibold" style="font-size: 0.75rem;">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Patient Admissions Trend Line Chart Card (40%) -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0">Patient Admissions Trend</h6>
                    <small class="text-muted">Monthly Admissions</small>
                </div>
                <!-- Clean Modern Line Chart SVG -->
                <div class="position-relative py-3">
                    <svg viewBox="0 0 500 200" class="w-100" style="max-height: 220px; overflow: visible;">
                        <path d="M 0,160 Q 50,110 100,120 T 200,80 T 300,140 T 400,60 T 500,30" fill="none" stroke="#0d7c66" stroke-width="3" />
                        
                        <circle cx="0" cy="160" r="4" fill="#0d7c66" />
                        <circle cx="100" cy="120" r="4" fill="#0d7c66" />
                        <circle cx="200" cy="80" r="4" fill="#0d7c66" />
                        <circle cx="300" cy="140" r="4" fill="#0d7c66" />
                        <circle cx="400" cy="60" r="5" fill="#ffffff" stroke="#0d7c66" stroke-width="3" />
                        <circle cx="500" cy="30" r="5" fill="#ffffff" stroke="#0d7c66" stroke-width="3" />
                    </svg>
                    <div class="d-flex justify-content-between text-muted small mt-2 fw-semibold px-1" style="font-size: 0.72rem;">
                        <span>Day 0</span><span>Day 5</span><span>Day 10</span><span>Day 15</span><span>Day 20</span><span>Day 25</span><span>Day 30</span>
                    </div>
                </div>
                <div class="alert alert-light border-0 rounded-3 p-3 mb-0 mt-3 d-flex align-items-center justify-content-between" style="background:#f8fafc;">
                    <div class="d-flex align-items-center gap-2">
                        <span class="pulse-dot bg-success rounded-circle" style="width:8px; height:8px;"></span>
                        <span class="small fw-semibold text-dark">Live Admissions Queue</span>
                    </div>
                    <strong class="text-success small" style="color:#0d7c66 !important;">+18% Peak Growth</strong>
                </div>
            </div>
        </div>
    </    <!-- Main Content Row 2: Live Pathology Feed & Hospital Operational Shortcuts -->
    <div class="row g-4 mb-4">
        <!-- Live Pathology Feed (60%) -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-2 rounded-3 text-white d-flex align-items-center justify-content-center" style="background:#0d7c66; width:36px; height:36px;">
                            <i class="bi bi-ui-checks-grid fs-5"></i>
                        </span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Live Diagnostic & Lab Feed</h6>
                            <small class="text-muted" style="font-size:0.75rem;">Real-time pathology status update</small>
                        </div>
                    </div>
                    <a href="<?= base_url('hospital/lab-reports') ?>" class="btn btn-sm btn-light text-success fw-bold rounded-pill px-3" style="color: #0d7c66 !important; background:#e6f4f1; border:none; font-size:0.8rem;">Manage Lab →</a>
                </div>
                <div class="d-flex flex-column gap-3">
                    <?php if (empty($recent_lab_reports)): ?>
                        <div class="text-center py-4 text-muted small">No diagnostic reports uploaded yet today.</div>
                    <?php else: ?>
                        <?php foreach ($recent_lab_reports as $lab): ?>
                            <div class="p-3 rounded-3 border-0 d-flex align-items-center justify-content-between" style="background: #f8fafc; transition: all 0.2s ease;">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="rounded-circle text-white p-2 d-flex align-items-center justify-content-center shadow-sm" style="width:40px; height:40px; background:#0d7c66;">
                                        <i class="bi bi-file-earmark-medical fs-5"></i>
                                    </span>
                                    <div>
                                        <div class="fw-bold text-dark small mb-0"><?= esc($lab['test_name']) ?></div>
                                        <small class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-person-fill text-secondary me-1"></i> Patient ID: #<?= esc($lab['patient_id']) ?> • Report #<?= esc($lab['id']) ?></small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge text-white rounded-pill px-3 py-1.5 fw-semibold shadow-sm" style="background: #0d7c66; font-size: 0.75rem;"><?= esc(ucfirst($lab['status'])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Operational Quick Access & Action Grid (40%) -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-2 rounded-3 text-warning bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                            <i class="bi bi-lightning-charge-fill fs-5"></i>
                        </span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Quick Operations</h6>
                            <small class="text-muted" style="font-size:0.75rem;">Fast action module links</small>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <a href="<?= base_url('hospital/appointments/create') ?>" class="btn btn-light w-100 p-3 text-start rounded-4 border-0 d-block" style="background: #f8fafc; transition: all 0.2s ease;">
                            <div class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center mb-2 text-white shadow-sm" style="background:#0d7c66; width:34px; height:34px;">
                                <i class="bi bi-calendar-plus fs-5"></i>
                            </div>
                            <div class="fw-bold text-dark small mb-0">New Booking</div>
                            <small class="text-muted d-block" style="font-size:0.7rem;">OPD Appointment</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('hospital/billing/create') ?>" class="btn btn-light w-100 p-3 text-start rounded-4 border-0 d-block" style="background: #f8fafc; transition: all 0.2s ease;">
                            <div class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center mb-2 text-white shadow-sm bg-primary" style="width:34px; height:34px;">
                                <i class="bi bi-receipt fs-5"></i>
                            </div>
                            <div class="fw-bold text-dark small mb-0">Generate Bill</div>
                            <small class="text-muted d-block" style="font-size:0.7rem;">Patient Invoice</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('hospital/lab-reports/create') ?>" class="btn btn-light w-100 p-3 text-start rounded-4 border-0 d-block" style="background: #f8fafc; transition: all 0.2s ease;">
                            <div class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center mb-2 text-white shadow-sm bg-info" style="width:34px; height:34px;">
                                <i class="bi bi-virus fs-5"></i>
                            </div>
                            <div class="fw-bold text-dark small mb-0">Add Lab Test</div>
                            <small class="text-muted d-block" style="font-size:0.7rem;">Pathology Record</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('hospital/pharmacy') ?>" class="btn btn-light w-100 p-3 text-start rounded-4 border-0 d-block" style="background: #f8fafc; transition: all 0.2s ease;">
                            <div class="rounded-3 p-2 d-inline-flex align-items-center justify-content-center mb-2 text-white shadow-sm bg-warning" style="width:34px; height:34px;">
                                <i class="bi bi-capsule fs-5"></i>
                            </div>
                            <div class="fw-bold text-dark small mb-0">Medicine Stock</div>
                            <small class="text-muted d-block" style="font-size:0.7rem;">Pharmacy POS</small>
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('hospital/staff/shifts') ?>" class="btn btn-light w-100 rounded-3 py-2.5 fw-semibold text-dark border-0 shadow-sm d-flex align-items-center justify-content-center gap-2" style="background:#e6f4f1; color:#0d7c66 !important;">
                    <i class="bi bi-clock-history fs-5"></i> Manage Staff Duty Roster
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Row 3: Active On-Duty OPD Doctors & Hospital Financial Revenue Overview -->
    <div class="row g-4 mb-4">
        <!-- Active On-Duty Doctors (60%) -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-2 rounded-3 text-white d-flex align-items-center justify-content-center" style="background:#0d7c66; width:36px; height:36px;">
                            <i class="bi bi-person-check-fill fs-5"></i>
                        </span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">On-Duty OPD Consultants</h6>
                            <small class="text-muted" style="font-size:0.75rem;">Active specialist roster today</small>
                        </div>
                    </div>
                    <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-sm btn-light text-success fw-bold rounded-pill px-3" style="color: #0d7c66 !important; background:#e6f4f1; border:none; font-size:0.8rem;">All Doctors →</a>
                </div>
                <div class="row g-3">
                    <?php if (empty($active_doctors)): ?>
                        <div class="col-12 text-center py-4 text-muted small">No active doctors configured yet.</div>
                    <?php else: ?>
                        <?php foreach ($active_doctors as $doc): ?>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-4 border-0 d-flex align-items-center gap-3 shadow-xs" style="background:#f8fafc; border-left: 4px solid #0d7c66 !important;">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width:44px; height:44px; background:#0d7c66; font-size: 0.95rem;">
                                        <?= strtoupper(substr($doc['name'], 0, 2)) ?>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="fw-bold text-dark text-truncate small mb-0"><?= esc($doc['name']) ?></div>
                                        <small class="text-muted d-block text-truncate" style="font-size:0.75rem;"><?= esc($doc['department']) ?> • <?= esc($doc['room_no'] ?? 'Chamber 101') ?></small>
                                        <span class="badge text-white rounded-pill px-2.5 py-0.5 mt-1 fw-semibold" style="background:#0d7c66; font-size:0.65rem;"><i class="bi bi-circle-fill me-1" style="font-size:0.4rem;"></i> On Duty Now</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Emergency & Operational Capacity Card (40%) -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center gap-2 mb-4 pb-2 border-bottom border-light">
                    <span class="p-2 rounded-3 bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                        <i class="bi bi-hospital-fill fs-5"></i>
                    </span>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Emergency Capacity Live Status</h6>
                        <small class="text-muted" style="font-size:0.75rem;">Ward & bed occupancy tracker</small>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3.5">
                    <div class="p-2.5 rounded-3" style="background:#f8fafc;">
                        <div class="d-flex justify-content-between text-dark fw-semibold small mb-1.5">
                            <span><i class="bi bi-hospital me-1.5 text-success" style="color:#0d7c66 !important;"></i> General Ward Occupancy</span>
                            <span class="fw-bold" style="color:#0d7c66 !important;">72% (36/50 Beds)</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 9px; background:#e2e8f0;">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: 72%; background:#0d7c66;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="p-2.5 rounded-3" style="background:#f8fafc;">
                        <div class="d-flex justify-content-between text-dark fw-semibold small mb-1.5">
                            <span><i class="bi bi-heart-pulse-fill me-1.5 text-danger"></i> ICU / CCU Beds Available</span>
                            <span class="text-danger fw-bold">85% (17/20 Beds)</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 9px; background:#e2e8f0;">
                            <div class="progress-bar bg-danger rounded-pill" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="p-2.5 rounded-3" style="background:#f8fafc;">
                        <div class="d-flex justify-content-between text-dark fw-semibold small mb-1.5">
                            <span><i class="bi bi-capsule me-1.5 text-warning"></i> Pharmacy Stock Health</span>
                            <span class="text-warning fw-bold">94% Optimum</span>
                        </div>
                        <div class="progress rounded-pill" style="height: 9px; background:#e2e8f0;">
                            <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 94%;" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="alert border-0 rounded-3 p-3 mb-0 mt-1 d-flex align-items-center justify-content-between shadow-xs" style="background:#e6f4f1; color:#0d7c66;">
                        <small class="fw-bold"><i class="bi bi-telephone-inbound-fill me-1.5"></i> Emergency Hotline Desk</small>
                        <span class="badge text-white rounded-pill px-3 py-1 fw-bold shadow-xs" style="background:#0d7c66;">24/7 Active</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row 4: Recent Invoices & Patient Billing Summary Table -->
    <div class="row g-4 mb-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white border-bottom border-light p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-2 rounded-3 text-warning bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                            <i class="bi bi-cash-coin fs-5"></i>
                        </span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Recent Patient Invoices & Collections</h6>
                            <small class="text-muted" style="font-size:0.75rem;">Live billing ledger transactions</small>
                        </div>
                    </div>
                    <a href="<?= base_url('hospital/billing') ?>" class="btn btn-sm btn-light text-success fw-bold rounded-pill px-3" style="color: #0d7c66 !important; background:#e6f4f1; border:none; font-size:0.8rem;">View Billing Ledger →</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted uppercase small fw-bold">
                            <tr>
                                <th class="ps-4 py-3">Invoice Code</th>
                                <th>Patient Name</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th class="pe-4 text-end">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_invoices)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted small">No billing transactions recorded yet.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach (array_slice($recent_invoices, 0, 5) as $inv): ?>
                                    <tr>
                                        <td class="ps-4 py-3 fw-bold" style="font-size: 0.88rem; color:#0d7c66 !important;">
                                            <i class="bi bi-receipt me-1"></i> <?= esc($inv['invoice_code']) ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.88rem;"><?= esc($inv['patient_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.75rem;"><?= esc($inv['patient_code']) ?></small>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark" style="font-size: 0.88rem;">৳ <?= number_format($inv['total_amount'], 2) ?></span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-success" style="font-size: 0.88rem; color:#0d7c66 !important;">৳ <?= number_format($inv['paid_amount'], 2) ?></span>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <?php if ($inv['payment_status'] === 'paid'): ?>
                                                <span class="badge text-white rounded-pill px-3 py-1.5 fw-semibold shadow-xs" style="background: #0d7c66; font-size: 0.75rem;">Paid</span>
                                            <?php elseif ($inv['payment_status'] === 'partial'): ?>
                                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5 fw-semibold shadow-xs" style="font-size: 0.75rem;">Partial</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-1.5 fw-semibold shadow-xs" style="font-size: 0.75rem;">Unpaid</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   </div>
    </div>
</div>
<?= $this->endSection() ?>
