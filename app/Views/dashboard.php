<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Hospital Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <h2 class="fw-bold text-dark mb-1">Hospital Overview</h2>
        <p class="text-muted mb-0">Welcome back to Nur Lab Hospital Management System.</p>
    </div>
    <div class="col-auto">
        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
            <i class="bi bi-circle-fill me-1 fs-6"></i> System Online
        </span>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Total Patients</span>
                <h3 class="fw-bold mb-0 text-dark">1,248</h3>
                <small class="text-success fw-semibold"><i class="bi bi-arrow-up-short"></i> +12% this month</small>
            </div>
            <div class="stat-icon bg-primary-subtle text-primary">
                <i class="bi bi-people"></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Doctors On Duty</span>
                <h3 class="fw-bold mb-0 text-dark">34</h3>
                <small class="text-primary fw-semibold"><i class="bi bi-person-check"></i> 8 Departments</small>
            </div>
            <div class="stat-icon bg-info-subtle text-info">
                <i class="bi bi-person-badge"></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Appointments Today</span>
                <h3 class="fw-bold mb-0 text-dark">89</h3>
                <small class="text-warning fw-semibold"><i class="bi bi-clock"></i> 14 Pending</small>
            </div>
            <div class="stat-icon bg-warning-subtle text-warning">
                <i class="bi bi-calendar-event"></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card card-custom d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted fw-medium d-block mb-1">Lab Reports</span>
                <h3 class="fw-bold mb-0 text-dark">412</h3>
                <small class="text-success fw-semibold"><i class="bi bi-check-circle"></i> 98% Completed</small>
            </div>
            <div class="stat-icon bg-success-subtle text-success">
                <i class="bi bi-journal-check"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Appointments Table -->
<div class="card card-custom">
    <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0">Recent Patient Appointments</h5>
        <button class="btn btn-sm btn-outline-primary rounded-pill px-3">View All</button>
    </div>
    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light border-top border-bottom">
                    <tr>
                        <th class="ps-4">Patient Name</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                    RA
                                </div>
                                <div>
                                    <div class="fw-semibold">Rahim Ahmed</div>
                                    <small class="text-muted">ID: #PAT-8842</small>
                                </div>
                            </div>
                        </td>
                        <td>Dr. Tanvir Hasan</td>
                        <td>Cardiology</td>
                        <td>Sep 07, 2026 - 10:30 AM</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Confirmed</span></td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-light border"><i class="bi bi-three-dots"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                    SK
                                </div>
                                <div>
                                    <div class="fw-semibold">Sultana Karim</div>
                                    <small class="text-muted">ID: #PAT-8843</small>
                                </div>
                            </div>
                        </td>
                        <td>Dr. Nusrat Jahan</td>
                        <td>Neurology</td>
                        <td>Sep 07, 2026 - 11:15 AM</td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill">Pending</span></td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-light border"><i class="bi bi-three-dots"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                    KC
                                </div>
                                <div>
                                    <div class="fw-semibold">Kabir Hossain</div>
                                    <small class="text-muted">ID: #PAT-8844</small>
                                </div>
                            </div>
                        </td>
                        <td>Dr. Mahbub Rahman</td>
                        <td>Orthopedics</td>
                        <td>Sep 07, 2026 - 02:00 PM</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Confirmed</span></td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-light border"><i class="bi bi-three-dots"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
