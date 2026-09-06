<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Edit Doctor Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-12 col-lg-9 col-xl-8">
        <div class="card card-custom p-4 p-md-5">
            <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                <div>
                    <h4 class="fw-bold text-dark mb-1"><i class="bi bi-pencil-square text-primary me-2"></i> Edit Doctor Profile - <?= esc($doctor['name']) ?></h4>
                    <p class="text-muted small mb-0">Update doctor information, BMDC reg, fees & consultation schedule.</p>
                </div>
                <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <form action="<?= base_url('hospital/doctors/edit/' . $doctor['id']) ?>" method="POST">
                <?= csrf_field() ?>
                
                <!-- Personal & Account Details -->
                <h6 class="fw-bold text-primary mb-3"><i class="bi bi-person-circle me-1"></i> Personal & Identification</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary">Doctor Full Name *</label>
                        <input type="text" name="name" class="form-control fw-semibold" value="<?= esc($doctor['name']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary">BMDC Registration No *</label>
                        <input type="text" name="bmdc_reg_no" class="form-control" value="<?= esc($doctor['bmdc_reg_no'] ?? '') ?>" placeholder="e.g. A-45892" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary"><i class="bi bi-person-fill text-primary me-1"></i> Login Username *</label>
                        <input type="text" name="username" class="form-control fw-semibold" value="<?= esc($user['username'] ?? '') ?>" placeholder="e.g. dr.mahbub" required pattern="[a-zA-Z0-9\._]+" title="Username can contain letters, numbers, dots, and underscores">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary"><i class="bi bi-envelope-fill text-info me-1"></i> Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?= esc($user['email'] ?? '') ?>" placeholder="doctor@nurlab.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary">Phone Number *</label>
                        <input type="text" name="phone" class="form-control" value="<?= esc($doctor['phone'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary"><i class="bi bi-key-fill text-warning me-1"></i> Change Password</label>
                        <input type="password" name="password" class="form-control fw-bold" placeholder="Leave empty to keep current password">
                    </div>
                </div>

                <!-- Professional & Medical Specialty Details -->
                <h6 class="fw-bold text-primary mb-3"><i class="bi bi-mortarboard-fill me-1"></i> Medical Specialty & Qualifications</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary">Medical Department *</label>
                        <select name="department" class="form-select" required>
                            <?php 
                            $depts = [
                                'Cardiology' => 'Cardiology (হৃদরোগ)',
                                'Neurology' => 'Neurology (নিউরোমেডিসিন)',
                                'Orthopedics' => 'Orthopedics (অস্থিরোগ ও ট্রমা)',
                                'Pediatrics' => 'Pediatrics (শিশু রোগ)',
                                'Gynecology & Obstetrics' => 'Gynecology & Obstetrics (স্ত্রী ও প্রসূতি)',
                                'General Surgery' => 'General Surgery (সার্জারি)',
                                'Medicine' => 'General Medicine (মেডিসিন)',
                                'Dermatology' => 'Dermatology (চর্ম ও যৌন)',
                                'ENT' => 'ENT (কান, নাক, গলা)',
                                'Ophthalmology' => 'Ophthalmology (চক্ষু রোগ)',
                            ];
                            foreach ($depts as $key => $label): 
                            ?>
                                <option value="<?= $key ?>" <?= ($doctor['department'] ?? '') === $key ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-secondary">Designation / Title *</label>
                        <input type="text" name="designation" class="form-control" value="<?= esc($doctor['designation'] ?? '') ?>" placeholder="e.g. Associate Professor & Senior Consultant" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold small text-secondary">Degrees & Specializations *</label>
                        <input type="text" name="specialization" class="form-control" value="<?= esc($doctor['specialization'] ?? '') ?>" placeholder="e.g. MBBS (DMC), FCPS (Cardiology), MD (USA)" required>
                    </div>
                </div>

                <!-- Schedule & Consultation Fee -->
                <h6 class="fw-bold text-primary mb-3"><i class="bi bi-clock-history me-1"></i> OPD Schedule & Consultation Fee</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-secondary">First Consultation Fee (BDT) *</label>
                        <div class="input-group">
                            <span class="input-group-text">৳</span>
                            <input type="number" step="0.01" name="consultation_fee" class="form-control fw-bold text-success" value="<?= esc($doctor['consultation_fee'] ?? '0.00') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-secondary">Follow-Up Fee (BDT)</label>
                        <div class="input-group">
                            <span class="input-group-text">৳</span>
                            <input type="number" step="0.01" name="followup_fee" class="form-control" value="<?= esc($doctor['followup_fee'] ?? '0.00') ?>" placeholder="600.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-secondary">Room / Chamber No *</label>
                        <select name="room_no" class="form-select" required>
                            <option value="">-- Select OPD Room --</option>
                            <?php 
                            $rooms = [
                                'Room 101 (1st Floor)',
                                'Room 102 (1st Floor)',
                                'Room 105 (1st Floor)',
                                'Room 201 (2nd Floor)',
                                'Room 204 (2nd Floor)',
                                'Room 205 (2nd Floor)',
                                'Room 301 (3rd Floor)',
                                'Room 304 (3rd Floor)',
                                'Room 305 (3rd Floor)',
                                'Room 401 (4th Floor)',
                                'Room 403 (4th Floor)',
                                'Room 501 (5th Floor)',
                                'Room 505 (5th Floor)',
                            ];
                            $currentRoom = $doctor['room_no'] ?? '';
                            foreach ($rooms as $r): 
                            ?>
                                <option value="<?= $r ?>" <?= $currentRoom === $r ? 'selected' : '' ?>><?= $r ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 mt-4">
                        <label class="form-label fw-semibold small text-secondary d-block"><i class="bi bi-calendar-week me-1"></i> Select Visiting Days & Set Time Slots *</label>
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
                            $savedDays = array_map('trim', explode(',', $doctor['visiting_days'] ?? ''));

                            // Parse saved day times if formatted as Sat: 05:00 PM - 09:00 PM | Sun: 10:00 AM - 01:00 PM
                            $dayTimeSlots = [];
                            $rawTimeStr = $doctor['visiting_time'] ?? '';
                            if (!empty($rawTimeStr)) {
                                $parts = explode('|', $rawTimeStr);
                                foreach ($parts as $p) {
                                    $sub = explode(':', trim($p), 2);
                                    if (count($sub) === 2) {
                                        $dKey = trim($sub[0]);
                                        $tVal = trim($sub[1]);
                                        $dayTimeSlots[$dKey] = $tVal;
                                    }
                                }
                            }

                            foreach ($weekDays as $dayKey => $dayLabel): 
                                $isChecked = in_array($dayKey, $savedDays) || (empty($savedDays) && strpos($doctor['visiting_days'] ?? '', $dayKey) !== false);
                            ?>
                                <input type="checkbox" class="btn-check day-checkbox" id="edit_day_<?= $dayKey ?>" name="visiting_days[]" value="<?= $dayKey ?>" autocomplete="off" data-day="<?= $dayKey ?>" <?= $isChecked ? 'checked' : '' ?>>
                                <label class="btn btn-outline-primary rounded-pill px-3 py-1.5 fw-semibold" for="edit_day_<?= $dayKey ?>" title="<?= $dayLabel ?>"><?= $dayKey ?></label>
                            <?php endforeach; ?>
                        </div>

                        <!-- Dynamic Per-Day Time Slot Inputs -->
                        <div id="day_time_slots_container" class="row g-2 p-3 bg-light rounded-3 border">
                            <div class="col-12 text-muted small py-1" id="no_days_selected_msg">
                                <i class="bi bi-info-circle me-1"></i> Click on day pills above to select visiting days and customize time slots for each day.
                            </div>
                            <?php foreach ($weekDays as $dayKey => $dayLabel): 
                                $slotVal = $dayTimeSlots[$dayKey] ?? (!empty($rawTimeStr) && empty($dayTimeSlots) ? $rawTimeStr : '05:00 PM - 09:00 PM');
                            ?>
                                <div class="col-md-6 day-time-row" id="time_row_<?= $dayKey ?>" style="display: none;">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text fw-bold bg-white text-primary border-end-0" style="min-width: 60px;"><?= $dayKey ?></span>
                                        <input type="text" name="day_times[<?= $dayKey ?>]" class="form-control border-start-0" placeholder="e.g. 05:00 PM - 09:00 PM" value="<?= esc($slotVal) ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-top d-flex gap-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2.5 fw-bold shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Save Changes
                    </button>
                    <a href="<?= base_url('hospital/doctors') ?>" class="btn btn-light rounded-pill px-4 py-2.5 border">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const departmentSelect = document.querySelector('select[name="department"]');
        const roomSelect       = document.querySelector('select[name="room_no"]');
        const savedRoom        = <?= json_encode($doctor['room_no'] ?? '') ?>;

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
                if (room === savedRoom) {
                    opt.selected = true;
                }
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
