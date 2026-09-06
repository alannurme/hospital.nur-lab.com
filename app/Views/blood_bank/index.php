<?= $this->extend('layouts/tenant') ?>

<?= $this->section('title') ?>Blood Bank & Donor Register | Medcare System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <!-- Header Title & Add Action Button -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Blood Bank Inventory & Donor Register</h4>
            <p class="text-muted small mb-0">Blood group stock monitoring, donor directory & emergency transfusion requisitions for <strong><?= session()->get('tenant_name') ?></strong>.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-emerald rounded-3 px-3.5 py-2 fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#newDonorModal" style="background: #0d7c66; border: none; font-size: 0.88rem;">
                <i class="bi bi-droplet-fill"></i>
                <span>Register Blood Donor</span>
            </button>
        </div>
    </div>

    <!-- Blood Group Stock Badges Grid -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">O+</span>
                <h5 class="fw-extrabold text-dark mb-0 mt-1">14 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">A+</span>
                <h5 class="fw-extrabold text-dark mb-0 mt-1">08 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">B+</span>
                <h5 class="fw-extrabold text-dark mb-0 mt-1">11 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">AB+</span>
                <h5 class="fw-extrabold text-dark mb-0 mt-1">05 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #d97706 !important;">
                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">O-</span>
                <h5 class="fw-extrabold text-warning mb-0 mt-1">02 Bags</h5>
                <small class="text-danger fw-semibold" style="font-size: 0.72rem;">Low Stock</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #d97706 !important;">
                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">A-</span>
                <h5 class="fw-extrabold text-warning mb-0 mt-1">03 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">B-</span>
                <h5 class="fw-extrabold text-dark mb-0 mt-1">04 Bags</h5>
                <small class="text-muted" style="font-size: 0.72rem;">Available</small>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-xl-1.5">
            <div class="card border-0 shadow-sm rounded-4 p-3 text-center bg-white h-100" style="border-top: 4px solid #dc2626 !important;">
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill mb-1 fw-extrabold" style="font-size: 1rem;">AB-</span>
                <h5 class="fw-extrabold text-danger mb-0 mt-1">01 Bag</h5>
                <small class="text-danger fw-bold" style="font-size: 0.72rem;">Critical</small>
            </div>
        </div>
    </div>

    <!-- Active Registered Donors Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-bottom border-light p-3.5 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-person-heart text-danger"></i> Registered Blood Donors & Volunteer Roster
            </h6>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">
                Voluntary Donor Network
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted uppercase small fw-bold">
                    <tr>
                        <th class="ps-4 py-3">Donor Name</th>
                        <th>Blood Group</th>
                        <th>Mobile Number</th>
                        <th>Location</th>
                        <th>Last Donated</th>
                        <th>Eligibility</th>
                        <th class="pe-4 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #dc2626; font-size: 0.9rem;">
                                    RA
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Rizwan Ahmed</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: DNR-104 • Voluntary</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger text-white rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.82rem;">O+ Positive</span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-telephone-fill text-muted me-1"></i> 01711998877</span>
                        </td>
                        <td class="text-muted small">Mirpur, Dhaka</td>
                        <td class="text-muted small">120 Days ago (May 2026)</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Eligible to Donate</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm border rounded-3 px-3 py-1.5 fw-semibold" style="background: #e6f4f1; color: #0d7c66; border-color: #b2dfdb !important; font-size: 0.8rem;" onclick="alert('Contacting donor Rizwan Ahmed');">
                                <i class="bi bi-telephone-outbound me-1"></i> Request Blood
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #0d7c66; font-size: 0.9rem;">
                                    TA
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.92rem;">Tariqul Alam</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">ID: DNR-109 • Regular</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger text-white rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.82rem;">B+ Positive</span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark small"><i class="bi bi-telephone-fill text-muted me-1"></i> 01822334455</span>
                        </td>
                        <td class="text-muted small">Uttara, Dhaka</td>
                        <td class="text-muted small">45 Days ago (Jul 2026)</td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">Rest Period (45d)</span>
                        </td>
                        <td class="pe-4 text-end">
                            <button class="btn btn-sm btn-outline-secondary rounded-3 px-3 py-1.5 fw-semibold" style="font-size: 0.8rem;" onclick="alert('Donor currently in rest period');">
                                <i class="bi bi-clock me-1"></i> Rest Period
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Register Blood Donor -->
<div class="modal fade" id="newDonorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 bg-white">
            <div class="modal-header border-bottom border-light pb-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-droplet-fill text-danger me-2"></i> Register New Blood Donor
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Blood donor registered successfully!'); bootstrap.Modal.getInstance(document.getElementById('newDonorModal')).hide();">
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-muted">Donor Full Name *</label>
                        <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Tanvir Hossain" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Blood Group *</label>
                            <select class="form-select rounded-3 p-2.5 fw-bold text-danger" required>
                                <option value="O+">O Positive (O+)</option>
                                <option value="A+">A Positive (A+)</option>
                                <option value="B+">B Positive (B+)</option>
                                <option value="AB+">AB Positive (AB+)</option>
                                <option value="O-">O Negative (O-)</option>
                                <option value="A-">A Negative (A-)</option>
                                <option value="B-">B Negative (B-)</option>
                                <option value="AB-">AB Negative (AB-)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Mobile Phone *</label>
                            <input type="tel" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="01711223344" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Last Donation Date</label>
                            <input type="date" class="form-control rounded-3 p-2.5 fw-semibold">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small text-muted">Location / Area</label>
                            <input type="text" class="form-control rounded-3 p-2.5 fw-semibold" placeholder="e.g. Dhanmondi, Dhaka">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-light pt-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3 px-4 fw-semibold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-emerald rounded-3 px-4 text-white fw-bold shadow-sm" style="background: #0d7c66; border:none;">
                        <i class="bi bi-check-circle-fill me-1"></i> Register Donor
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
