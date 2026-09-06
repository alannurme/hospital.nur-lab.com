<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Appointments Management | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Doctor Appointments Directory</h4>
            <p class="text-muted small mb-0">Manage outpatient consultations, clinical schedules & patient bookings for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-calendar-plus-fill"></i>
                <span>Book New Appointment</span>
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background: #e6f4f1; color: #0d7c66;">
            <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Stats Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Total Booked</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($appointments) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background: #0d7c66;">
                        <i class="bi bi-calendar-check-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Confirmed Sessions</span>
                        <h3 class="fw-extrabold text-dark mb-0">
                            <?= count(array_filter($appointments, fn($a) => ($a['status'] ?? '') === 'confirmed')) ?>
                        </h3>
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
                        <span class="text-muted fw-semibold small d-block mb-1">Consulting Doctors</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($doctors) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706;">
                        <i class="bi bi-person-badge-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3.5 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold small d-block mb-1">Registered Patients</span>
                        <h3 class="fw-extrabold text-dark mb-0"><?= count($patients) ?></h3>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e0f2fe; color: #0284c7;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointments Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-event text-success" style="color: #0d7c66 !important;"></i> Scheduled Appointments Roster
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                <?= count($appointments) ?> Appointments
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Patient Name</th>
                        <th>Assigned Doctor</th>
                        <th>Specialty / Dept</th>
                        <th>Date & Time</th>
                        <th>Consultation Fee</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Clinical Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2 text-success opacity-50" style="color: #0d7c66 !important;"></i>
                                No appointments booked yet. Click "Book New Appointment" to schedule a visit.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $apt): ?>
                            <?php $initials = strtoupper(substr($apt['patient_name'], 0, 2)); ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                            <?= esc($initials) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;"><?= esc($apt['patient_name']) ?></div>
                                            <small class="text-muted" style="font-size: 0.75rem;">ID: <?= esc($apt['patient_code']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark" style="font-size: 0.88rem;"><?= esc($apt['doctor_name']) ?></span>
                                </td>
                                <td>
                                    <span class="badge border rounded-pill px-3 py-1 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.75rem;">
                                        <?= esc($apt['department']) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-dark small">
                                        <i class="bi bi-clock text-muted me-1"></i> <?= date('M d, Y - h:i A', strtotime($apt['appointment_date'])) ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="font-monospace" style="color: #0d7c66;">৳ <?= number_format($apt['fee'], 2) ?></strong>
                                </td>
                                <td>
                                    <?php if ($apt['status'] === 'confirmed'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Confirmed</span>
                                    <?php elseif ($apt['status'] === 'pending'): ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Pending</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1"><?= esc($apt['status']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end text-muted small" style="max-width: 200px;">
                                    <?= esc($apt['notes'] ?? 'None') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Book Appointment Modal -->
<div class="modal fade" id="bookAppointmentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-calendar-plus-fill text-success me-2" style="color: #0d7c66 !important;"></i> Book Patient Appointment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('appointments/create') ?>" method="POST">
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

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Select Doctor *</label>
                        <select name="doctor_id" class="form-select rounded-3 p-2.5 fw-semibold" required>
                            <option value="">-- Choose Specialist Doctor --</option>
                            <?php foreach ($doctors as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= esc($d['name']) ?> - <?= esc($d['department']) ?> (Fee: ৳<?= number_format($d['consultation_fee'], 0) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Date & Time *</label>
                            <input type="datetime-local" name="appointment_date" class="form-control rounded-3 p-2.5 fw-semibold" required value="<?= date('Y-m-d\TH:i') ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Consultation Fee *</label>
                            <input type="number" step="0.01" name="fee" class="form-control rounded-3 p-2.5 fw-bold" placeholder="1000.00" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Clinical Notes / Reason</label>
                        <textarea name="notes" class="form-control rounded-3 p-2.5 fw-semibold" rows="2" placeholder="Symptoms or visit purpose..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
