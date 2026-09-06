<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Doctor Portal - OPD & Electronic Rx Prescription<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col">
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 mb-2 fw-semibold">OPD Specialist Workstation</span>
        <h3 class="fw-bold text-dark mb-1">Welcome, <?= esc(preg_replace('/^Dr\.\s*/i', 'Dr. ', session()->get('user_name') ?? 'Tanvir Hasan')) ?> 🩺</h3>
        <p class="text-muted mb-0">Live OPD Serial Queue, Electronic Prescriptions (Rx) & Patient History Records.</p>
    </div>
    <div class="col-auto">
        <button class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm d-flex align-items-center gap-2" onclick="openConsultationModal('P-1012', 'Mohammad Ali', '45 Yrs / Male', 'Chest Tightness & Dyspnea')">
            <i class="bi bi-journal-plus"></i> Write New Prescription (Rx)
        </button>
    </div>
</div>

<!-- Key Metrics Row -->
<div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-start border-4 border-primary shadow-sm h-100">
            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Today's OPD Patient Queue</span>
            <h2 class="fw-extrabold text-dark mb-0">12 Patients</h2>
            <small class="text-success fw-bold mt-1 d-block"><i class="bi bi-clock me-1"></i> 04 Waiting in Lobby</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-start border-4 border-success shadow-sm h-100">
            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Completed Prescriptions</span>
            <h2 class="fw-extrabold text-success mb-0">08 Attended</h2>
            <small class="text-muted fw-semibold mt-1 d-block"><i class="bi bi-check-all text-success me-1"></i> Prescriptions Saved & Dispatched</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card card-custom p-4 border-start border-4 border-info shadow-sm h-100">
            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Follow-up Schedules</span>
            <h2 class="fw-extrabold text-info mb-0">05 Patients</h2>
            <small class="text-primary fw-semibold mt-1 d-block"><i class="bi bi-calendar-event me-1"></i> Scheduled Next Week</small>
        </div>
    </div>
</div>

<!-- Live Patient Waiting Queue Table -->
<div class="card card-custom shadow-sm overflow-hidden mb-4">
    <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
        <h5 class="fw-bold text-dark mb-0"><i class="bi bi-people-fill text-primary me-2"></i> Live Waiting Patient Serial Queue</h5>
        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1.5 fw-bold">OPD Chamber Live</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Serial Token #</th>
                    <th>Patient Name & ID</th>
                    <th>Age / Gender</th>
                    <th>Chief Medical Complaint</th>
                    <th>Vitals Status</th>
                    <th class="pe-4 text-end">Consultation Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($appointments)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                            No patient appointments queued for this doctor currently.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $idx = 1; foreach ($appointments as $app): ?>
                        <tr>
                            <td class="ps-4">
                                <span class="badge bg-<?= $idx === 1 ? 'danger' : ($idx === 2 ? 'primary' : 'secondary') ?> rounded-circle p-2 fs-6" style="width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center;">
                                    #<?= sprintf('%02d', $idx++) ?>
                                </span>
                            </td>
                            <td>
                                <strong class="text-dark d-block"><?= esc($app['patient_name']) ?></strong>
                                <small class="font-monospace text-primary"><?= esc($app['patient_code']) ?></small>
                            </td>
                            <td><?= esc($app['age']) ?> Yrs / <?= esc($app['gender']) ?></td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold">
                                    <?= esc($app['notes'] ?? 'General Consultation') ?>
                                </span>
                            </td>
                            <td><small class="text-muted">BP: 125/80 | Pulse: 78 | Temp: 98.4°F</small></td>
                            <td class="pe-4 text-end">
                                <button type="button" class="btn btn-sm btn-primary rounded-pill px-3.5 py-2 fw-bold shadow-sm d-inline-flex align-items-center gap-1.5" onclick="openConsultationModal('<?= esc($app['patient_code']) ?>', '<?= esc($app['patient_name']) ?>', '<?= esc($app['age']) ?> Yrs / <?= esc($app['gender']) ?>', '<?= esc($app['notes']) ?>')">
                                    <i class="bi bi-stethoscope"></i> Start Consultation
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Interactive Doctor Consultation & Electronic Prescription (Rx) Modal -->
<div class="modal fade" id="consultationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-dark text-white py-3 px-4 rounded-top-4">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-medical-fill text-primary fs-4"></i>
                    <div>
                        <h5 class="modal-title fw-bold text-white mb-0">Electronic Medical Prescription (Rx)</h5>
                        <small class="text-light opacity-75">OPD Chamber Workstation - Doctor Consultation</small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <div class="modal-body p-4 bg-light">
                <!-- Patient Banner -->
                <div class="card p-3 rounded-4 border-0 shadow-sm bg-white mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <small class="text-muted d-block">Patient Name</small>
                            <strong class="text-dark fs-6" id="modalPatientName">Mohammad Ali</strong>
                        </div>
                        <div class="col-md-3">
                            <small class="text-muted d-block">Patient ID & Demographics</small>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold" id="modalPatientCode">P-1012</span>
                            <span class="text-dark small ms-1" id="modalPatientDemo">45 Yrs / Male</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Chief Complaint</small>
                            <span class="fw-semibold text-danger" id="modalChiefComplaint">Chest Tightness & Dyspnea</span>
                        </div>
                        <div class="col-md-2 text-end">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-bold">Live Session</span>
                        </div>
                    </div>
                </div>

                <!-- Prescription Form Layout -->
                <div class="row g-4">
                    <!-- Left Column: Vitals & Diagnosis -->
                    <div class="col-md-4">
                        <div class="card p-3 rounded-4 border-0 shadow-sm bg-white h-100">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-activity text-primary me-1"></i> Patient Clinical Vitals</h6>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Blood Pressure (mmHg)</label>
                                <input type="text" class="form-control fw-bold" id="rxBP" value="135/85">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Pulse Rate (BPM)</label>
                                <input type="text" class="form-control fw-bold" id="rxPulse" value="82 BPM">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Body Temp (°F)</label>
                                <input type="text" class="form-control fw-bold" id="rxTemp" value="98.6 °F">
                            </div>
                            
                            <h6 class="fw-bold text-dark border-bottom pb-2 my-3"><i class="bi bi-clipboard-pulse text-danger me-1"></i> Clinical Diagnosis</h6>
                            <textarea class="form-control fw-semibold" id="rxDiagnosis" rows="3" placeholder="Enter clinical diagnosis notes...">Mild Hypertensive Heart Condition & Dyspnea</textarea>
                        </div>
                    </div>

                    <!-- Right Column: Rx Medicines & Lab Tests -->
                    <div class="col-md-8">
                        <div class="card p-4 rounded-4 border-0 shadow-sm bg-white h-100">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-3 d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-capsule-fill text-success me-1"></i> Prescribed Medicines (Rx)</span>
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold" onclick="addMedicineRow()">
                                    <i class="bi bi-plus-lg me-1"></i> Add Medicine
                                </button>
                            </h6>

                            <div class="table-responsive mb-3">
                                <table class="table table-bordered align-middle small" id="medicineTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Medicine Name & Strength</th>
                                            <th>Dosage (1+0+1)</th>
                                            <th>Duration</th>
                                            <th>Instructions</th>
                                            <th style="width:40px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="medicineTableBody">
                                        <tr>
                                            <td><input type="text" class="form-control form-control-sm fw-bold text-primary" value="Tab. Napa Extra (500mg)"></td>
                                            <td><input type="text" class="form-control form-control-sm text-center fw-bold" value="1 + 0 + 1"></td>
                                            <td><input type="text" class="form-control form-control-sm text-center" value="5 Days"></td>
                                            <td><input type="text" class="form-control form-control-sm" value="After Food"></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="this.closest('tr').remove()"><i class="bi bi-trash-fill"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control form-control-sm fw-bold text-primary" value="Tab. Seclo (20mg)"></td>
                                            <td><input type="text" class="form-control form-control-sm text-center fw-bold" value="1 + 0 + 1"></td>
                                            <td><input type="text" class="form-control form-control-sm text-center" value="7 Days"></td>
                                            <td><input type="text" class="form-control form-control-sm" value="Before Food"></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="this.closest('tr').remove()"><i class="bi bi-trash-fill"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6 class="fw-bold text-dark border-bottom pb-2 my-3"><i class="bi bi-flask-fill text-purple me-1" style="color:#9333ea;"></i> Advice Diagnostic Lab Tests</h6>
                            <input type="text" class="form-control fw-semibold" id="rxLabAdvise" value="Complete Blood Count (CBC), ECG 12-Lead, Serum Creatinine">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-white border-top py-3 px-4">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm" onclick="savePrescription()">
                    <i class="bi bi-check-circle-fill me-1"></i> Save & Print Rx Prescription
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openConsultationModal(code, name, demo, complaint) {
    document.getElementById('modalPatientCode').textContent = code;
    document.getElementById('modalPatientName').textContent = name;
    document.getElementById('modalPatientDemo').textContent = demo;
    document.getElementById('modalChiefComplaint').textContent = complaint;

    const modal = new bootstrap.Modal(document.getElementById('consultationModal'));
    modal.show();
}

function addMedicineRow() {
    const tbody = document.getElementById('medicineTableBody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td><input type="text" class="form-control form-control-sm fw-bold text-primary" placeholder="Medicine Name (e.g. Tab. Sergel 20mg)"></td>
        <td><input type="text" class="form-control form-control-sm text-center fw-bold" placeholder="1 + 0 + 1"></td>
        <td><input type="text" class="form-control form-control-sm text-center" placeholder="7 Days"></td>
        <td><input type="text" class="form-control form-control-sm" placeholder="After Food"></td>
        <td class="text-center"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="this.closest('tr').remove()"><i class="bi bi-trash-fill"></i></button></td>
    `;
    tbody.appendChild(tr);
}

function savePrescription() {
    const name = document.getElementById('modalPatientName').textContent;
    alert(`Rx Electronic Prescription Saved & Printed Successfully!\n\nPatient: ${name}\nStatus: Prescription Dispatched to Patient EHR.`);
    
    const modalEl = document.getElementById('consultationModal');
    const modal   = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
}
</script>
<?= $this->endSection() ?>
