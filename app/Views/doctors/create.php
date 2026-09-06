<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Add Doctor Profile | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8">
            <!-- Header Nav Bar -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-1">Add New Doctor Profile</h4>
                    <p class="text-muted small mb-0">Fill out complete professional information, BMDC registration & consultation schedule for <strong><?= session()->get('tenant_name') ?></strong>.</p>
                </div>
                <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2 small fw-semibold d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Back to Directory
                </a>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <form action="<?= base_url('hospital/doctors/create') ?>" method="POST">
                    <!-- Personal & Account Details -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">1</span>
                        <h6 class="fw-bold text-dark mb-0">Personal & System Identification</h6>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Doctor Full Name *</label>
                            <input type="text" name="name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dr. Mahbub Rahman" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">BMDC Registration No *</label>
                            <input type="text" name="bmdc_reg_no" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. A-45892" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Login Username *</label>
                            <input type="text" name="username" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. dr.mahbub" required pattern="[a-zA-Z0-9\._]+" title="Username can contain letters, numbers, dots, and underscores">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="doctor@nurlab.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Phone Number *</label>
                            <input type="text" name="phone" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711002233" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Login Password *</label>
                            <input type="password" name="password" class="form-control rounded-3 p-2.5 fw-bold" placeholder="Custom password (or default: doctor123)">
                        </div>
                    </div>

                    <!-- Professional & Medical Specialty Details -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom pt-2">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">2</span>
                        <h6 class="fw-bold text-dark mb-0">Medical Specialty & Qualifications</h6>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Medical Department *</label>
                            <select name="department" class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="">-- Select Medical Department --</option>
                                <option value="Cardiology">Cardiology (হৃদরোগ)</option>
                                <option value="Neurology">Neurology (নিউরোমেডিসিন)</option>
                                <option value="Orthopedics">Orthopedics (অস্থিরোগ ও ট্রমা)</option>
                                <option value="Pediatrics">Pediatrics (শিশু রোগ)</option>
                                <option value="Gynecology & Obstetrics">Gynecology & Obstetrics (স্ত্রী ও প্রসূতি)</option>
                                <option value="General Surgery">General Surgery (সার্জারি)</option>
                                <option value="Medicine">General Medicine (মেডিসিন)</option>
                                <option value="Dermatology">Dermatology (চর্ম ও যৌন)</option>
                                <option value="ENT">ENT (কান, নাক, গলা)</option>
                                <option value="Ophthalmology">Ophthalmology (চক্ষু রোগ)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Designation / Title *</label>
                            <input type="text" name="designation" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Associate Professor & Senior Consultant" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold small text-muted">Degrees & Specializations *</label>
                            <input type="text" name="specialization" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. MBBS (DMC), FCPS (Cardiology), MD (USA)" required>
                        </div>
                    </div>

                    <!-- Schedule & Consultation Fee -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom pt-2">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">3</span>
                        <h6 class="fw-bold text-dark mb-0">OPD Schedule & Consultation Fee</h6>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">First Consultation Fee (BDT) *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 fw-bold">৳</span>
                                <input type="number" step="0.01" name="consultation_fee" class="form-control rounded-end-3 p-2.5 fw-semibold" placeholder="1000.00" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Follow-Up Fee (BDT)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 fw-bold">৳</span>
                                <input type="number" step="0.01" name="followup_fee" class="form-control rounded-end-3 p-2.5 fw-semibold" placeholder="600.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Room / Chamber No *</label>
                            <select name="room_no" class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="">-- Select OPD Room --</option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <label class="form-label fw-semibold small text-dark d-block mb-2"><i class="bi bi-calendar-week text-success me-1"></i> Select Visiting Days & Set Time Slots *</label>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <?php 
                                $weekDays = [
                                    'Sat' => 'Saturday (শনিবার)',
                                    'Sun' => 'Sunday (রবিবার)',
                                    'Mon' => 'Monday (সোমবার)',
                                    'Tue' => 'Tuesday (মঙ্গলবার)',
                                    'Wed' => 'Wednesday (বুধবার)',
                                    'Thu' => 'Thursday (বৃহস্পতিবার)',
                                    'Fri' => 'Friday (শুক্রবার)',
                                ];
                                foreach ($weekDays as $dayKey => $dayLabel): 
                                ?>
                                    <input type="checkbox" class="btn-check day-checkbox" id="create_day_<?= $dayKey ?>" name="visiting_days[]" value="<?= $dayKey ?>" autocomplete="off" data-day="<?= $dayKey ?>">
                                    <label class="btn btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" for="create_day_<?= $dayKey ?>" title="<?= $dayLabel ?>"><?= $dayKey ?></label>
                                <?php endforeach; ?>
                            </div>

                            <!-- Dynamic Per-Day Time Slot Inputs -->
                            <div id="day_time_slots_container" class="row g-2 p-3 bg-light rounded-3 border">
                                <div class="col-12 text-muted small py-1" id="no_days_selected_msg">
                                    <i class="bi bi-info-circle me-1 text-success"></i> Click on day pills above to select visiting days and customize time slots.
                                </div>
                                <?php foreach ($weekDays as $dayKey => $dayLabel): ?>
                                    <div class="col-md-6 day-time-row" id="time_row_<?= $dayKey ?>" style="display: none;">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text fw-bold bg-white text-dark border-end-0" style="min-width: 60px;"><?= $dayKey ?></span>
                                            <input type="text" name="day_times[<?= $dayKey ?>]" class="form-control rounded-end-3" placeholder="e.g. 05:00 PM - 09:00 PM" value="05:00 PM - 09:00 PM">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-top d-flex gap-3">
                        <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-outline-secondary rounded-3 px-4 py-2.5 fw-semibold">Cancel</a>
                        <button type="submit" class="btn btn-emerald rounded-3 px-5 py-2.5 fw-bold text-white shadow-sm flex-grow-1" style="background: #0d7c66; border:none;">
                            <i class="bi bi-check-circle-fill me-1"></i> Save & Register Doctor Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                <div class="pt-3 border-top d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-2.5 rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Save Doctor Record
                    </button>
                    <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-light px-4 py-2.5 rounded-pill fw-semibold border">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const departmentSelect = document.querySelector('select[name="department"]');
        const roomSelect       = document.querySelector('select[name="room_no"]');

        const departmentRooms = {
            'Cardiology': [
                'Room 301 (3rd Floor)',
                'Room 302 (3rd Floor)',
                'Room 303 (3rd Floor)',
                'Room 304 (3rd Floor)',
                'Room 305 (3rd Floor)'
            ],
            'Neurology': [
                'Room 401 (4th Floor)',
                'Room 402 (4th Floor)',
                'Room 403 (4th Floor)'
            ],
            'Orthopedics': [
                'Room 201 (2nd Floor)',
                'Room 202 (2nd Floor)',
                'Room 203 (2nd Floor)',
                'Room 204 (2nd Floor)'
            ],
            'Pediatrics': [
                'Room 105 (1st Floor)',
                'Room 106 (1st Floor)',
                'Room 107 (1st Floor)',
                'Room 108 (1st Floor)'
            ],
            'Gynecology & Obstetrics': [
                'Room 501 (5th Floor)',
                'Room 502 (5th Floor)',
                'Room 503 (5th Floor)',
                'Room 504 (5th Floor)',
                'Room 505 (5th Floor)',
                'Room 506 (5th Floor)'
            ],
            'General Surgery': [
                'Room 205 (2nd Floor)',
                'Room 206 (2nd Floor)',
                'Room 207 (2nd Floor)',
                'Room 208 (2nd Floor)'
            ],
            'Medicine': [
                'Room 101 (1st Floor)',
                'Room 102 (1st Floor)',
                'Room 103 (1st Floor)',
                'Room 104 (1st Floor)'
            ],
            'Dermatology': [
                'Room 110 (1st Floor)',
                'Room 111 (1st Floor)'
            ],
            'ENT': [
                'Room 210 (2nd Floor)',
                'Room 211 (2nd Floor)'
            ],
            'Ophthalmology': [
                'Room 310 (3rd Floor)',
                'Room 311 (3rd Floor)'
            ]
        };

        function updateRooms() {
            const selectedDept = departmentSelect.value;
            if (!selectedDept) {
                roomSelect.innerHTML = '<option value="">-- Select Department First --</option>';
                return;
            }

            const rooms = departmentRooms[selectedDept] || [];
            roomSelect.innerHTML = '<option value="">-- Select OPD Room --</option>';
            rooms.forEach(function (room) {
                const opt = document.createElement('option');
                opt.value = room;
                opt.textContent = room;
                roomSelect.appendChild(opt);
            });
        }

        departmentSelect.addEventListener('change', updateRooms);
        updateRooms(); // initial load

        // Per-day time slot toggles
        const dayCheckboxes = document.querySelectorAll('.day-checkbox');
        const noDaysMsg     = document.getElementById('no_days_selected_msg');

        function toggleDayTimeRows() {
            let selectedCount = 0;
            dayCheckboxes.forEach(function (cb) {
                const day = cb.getAttribute('data-day');
                const timeRow = document.getElementById('time_row_' + day);
                if (cb.checked) {
                    if (timeRow) timeRow.style.display = 'block';
                    selectedCount++;
                } else {
                    if (timeRow) timeRow.style.display = 'none';
                }
            });

            if (noDaysMsg) {
                noDaysMsg.style.display = selectedCount === 0 ? 'block' : 'none';
            }
        }

        dayCheckboxes.forEach(function (cb) {
            cb.addEventListener('change', toggleDayTimeRows);
        });
        toggleDayTimeRows();
    });
</script>
<?= $this->endSection() ?>
