<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Register Patient | Medcare System<?= $this0->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8">
            <!-- Header Nav Bar -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-1">Register New Patient EMR</h4>
                    <p class="text-muted small mb-0">Fill out comprehensive patient demographic & medical details for <strong><?= session()->get('tenant_name') ?></strong>.</p>
                </div>
                <a href="<?= base_url('hospital/patients') ?>" class="btn btn-outline-secondary rounded-3 px-3 py-2 small fw-semibold d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Back to Directory
                </a>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <form action="<?= base_url('hospital/patients/create') ?>" method="POST">
                    <!-- Section 1: Basic Information -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">1</span>
                        <h6 class="fw-bold text-dark mb-0">Personal Demographic Information</h6>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Patient Full Name *</label>
                            <input type="text" name="name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Anisur Rahman" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Father / Husband / Guardian Name</label>
                            <input type="text" name="guardian_name" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Late Khalilur Rahman">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Mobile Phone Number *</label>
                            <input type="tel" name="phone" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711223344" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">NID / Birth Cert / Passport</label>
                            <input type="text" name="nid_passport" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. 1990269281728">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="patient@example.com">
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Age (Years) *</label>
                            <input type="number" name="age" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="35" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control rounded-3 p-2.5 fw-semibold">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Gender *</label>
                            <select name="gender" class="form-select rounded-3 p-2.5 fw-semibold" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Blood Group</label>
                            <select name="blood_group" class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="A-">A-</option>
                                <option value="O-">O-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>

                    <!-- Section 2: Contact & Emergency Details -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom pt-2">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">2</span>
                        <h6 class="fw-bold text-dark mb-0">Emergency Contact & Marital Status</h6>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Emergency Relative Contact No.</label>
                            <input type="tel" name="emergency_contact" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="Emergency Relative Mobile">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-muted">Marital Status</label>
                            <select name="marital_status" class="form-select rounded-3 p-2.5 fw-semibold">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>

                    <!-- Section 3: Permanent Address -->
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom pt-2">
                        <span class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background: #0d7c66; font-size: 0.8rem;">3</span>
                        <h6 class="fw-bold text-dark mb-0">Address & Residential Location</h6>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-muted">Full Residential Address</label>
                        <textarea name="address" class="form-control rounded-3 p-2.5 fw-semibold" rows="3" placeholder="House/Flat No, Road, Village/Area, Upazila, District..."></textarea>
                    </div>

                    <div class="pt-3 border-top d-flex gap-3">
                        <a href="<?= base_url('hospital/patients') ?>" class="btn btn-outline-secondary rounded-3 px-4 py-2.5 fw-semibold">Cancel</a>
                        <button type="submit" class="btn btn-emerald rounded-3 px-5 py-2.5 fw-bold text-white shadow-sm flex-grow-1" style="background: #0d7c66; border:none;">
                            <i class="bi bi-check-circle-fill me-1"></i> Save & Register Patient EMR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

