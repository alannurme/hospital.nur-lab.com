<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Hospital Management System</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bs-body-font-family: 'Inter', system-ui, -apple-system, sans-serif;
            --sidebar-width: 275px;
            --sidebar-bg: #ffffff;
            --sidebar-item-bg: #f8fafc;
            --sidebar-item-hover: #f1f5f9;
            --sidebar-text: #475569;
            --sidebar-text-active: #0d7c66;
            --medcare-green: #0d7c66;
            --medcare-light-green: #e6f4f1;
            --medcare-accent: #10b981;
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: #f1f5f5;
            color: #1e293b;
            min-height: 100vh;
        }

        /* Utility classes for fractional padding used across views */
        .p-3-5, .p-3\.5 { padding: 1.25rem !important; }
        .p-2-5, .p-2\.5 { padding: 0.75rem !important; }
        .py-3-5, .py-3\.5 { padding-top: 1.25rem !important; padding-bottom: 1.25rem !important; }
        .px-3-5, .px-3\.5 { padding-left: 1.25rem !important; padding-right: 1.25rem !important; }
        .card { min-height: auto; }
        .text-card-hover:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }

        /* Clean Crisp White Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #ffffff;
            color: #475569;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.03);
        }

        .sidebar-brand-header {
            padding: 1.5rem 1.25rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-brand-logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #0d7c66;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(13, 124, 102, 0.3);
        }

        /* User Profile Widget */
        .sidebar-user-widget {
            padding: 1rem;
            margin: 0.75rem 0.75rem 0.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }
        .sidebar-user-widget:hover {
            background: #f1f5f9;
        }

        .user-avatar-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #0d7c66;
            color: #ffffff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 8px rgba(13, 124, 102, 0.25);
        }

        /* Search Box */
        .sidebar-search-box {
            padding: 0.5rem 0.75rem 0.75rem;
        }
        .sidebar-search-input {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #0f172a;
            border-radius: 12px;
            padding: 0.55rem 0.75rem 0.55rem 2.25rem;
            font-size: 0.85rem;
            width: 100%;
            transition: all 0.2s ease;
        }
        .sidebar-search-input::placeholder {
            color: #94a3b8;
        }
        .sidebar-search-input:focus {
            background: #ffffff;
            border-color: #0d7c66;
            color: #0f172a;
            box-shadow: 0 0 0 3px rgba(13, 124, 102, 0.15);
            outline: none;
        }
        .sidebar-search-wrapper {
            position: relative;
        }
        .sidebar-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.88rem;
        }

        /* Menu Accordion Items */
        .sidebar-menu {
            padding: 0.5rem 0.75rem;
            flex-grow: 1;
            overflow-y: auto;
        }
        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .menu-category-header {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #94a3b8;
            padding: 0.75rem 0.75rem 0.35rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.68rem 0.9rem;
            color: #475569;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            margin-bottom: 0.25rem;
            cursor: pointer;
        }

        .nav-link-custom:hover {
            background: #f1f5f9;
            color: #0d7c66;
        }

        .nav-link-custom.active {
            background: linear-gradient(135deg, #0b4f43 0%, #0d7c66 100%);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(13, 124, 102, 0.3);
        }

        /* Sub-menu items */
        .sub-menu {
            padding-left: 1rem;
            margin-bottom: 0.25rem;
            display: none;
        }
        .sub-menu.show {
            display: block;
        }

        .sub-link-custom {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.5rem 0.75rem;
            color: #64748b;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sub-link-custom:hover, .sub-link-custom.active {
            color: #0d7c66;
            background: #e6f4f1;
            font-weight: 600;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #f1f5f5;
        }

        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            background: #ffffff;
            color: #0f172a;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
            border-color: #0284c7;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Light Sleek Sidebar Navigation -->
    <aside class="sidebar" id="sidebar">
        <!-- User Profile Header Widget -->
        <div class="sidebar-user-widget">
            <div class="d-flex align-items-center gap-2 overflow-hidden">
                <div class="user-avatar-circle">
                    <?= strtoupper(substr(session()->get('user_name') ?? 'U', 0, 1)) ?>
                </div>
                <div class="overflow-hidden">
                    <div class="fw-bold text-dark text-truncate" style="font-size: 0.9rem; line-height: 1.3; margin-bottom: 2px;"><?= session()->get('user_name') ?></div>
                    <small class="text-muted d-block text-truncate" style="font-size: 0.78rem; line-height: 1.3;"><?= session()->get('tenant_name') ?></small>
                </div>
            </div>
            <i class="bi bi-chevron-down text-muted small ms-1"></i>
        </div>

        <!-- Search Box -->
        <div class="sidebar-search-box">
            <div class="sidebar-search-wrapper">
                <i class="bi bi-search sidebar-search-icon"></i>
                <input type="text" class="sidebar-search-input" placeholder="Search..." id="sidebarSearchInput">
            </div>
        </div>

        <!-- Menu Navigation Accordions -->
        <div class="sidebar-menu">
            <?php if (session()->get('impersonated_by')): ?>
                <div class="menu-category-header text-primary">Impersonation Mode</div>
                <a href="<?= base_url('hospital/doctors/return-admin') ?>" class="nav-link-custom text-primary border border-primary-subtle mb-3" style="background: #f0f9ff;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-fill-gear text-primary"></i>
                        <span>Return to Admin Account</span>
                    </div>
                </a>
            <?php endif; ?>

            <?php if (session()->get('isImpersonated') || session()->get('user_role') === 'superadmin'): ?>
                <div class="menu-category-header text-warning">Super Admin Mode</div>
                <a href="<?= base_url('superadmin/return') ?>" class="nav-link-custom text-warning border border-warning-subtle mb-3" style="background: #fffbeb;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-shield-lock-fill text-warning"></i>
                        <span>Return to Super Admin</span>
                    </div>
                </a>
            <?php endif; ?>

            <?php if (session()->get('user_role') === 'doctor' || session()->get('impersonated_by')): ?>
                <!-- Doctor Specific Sidebar Navigation -->
                <div class="menu-category-header">Doctor Workstation</div>

                <a href="<?= base_url('hospital/panel/doctor') ?>" class="nav-link-custom <?= strpos(current_url(), 'panel/doctor') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-stethoscope text-primary"></i>
                        <span>Doctor OPD Portal</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/appointments') ?>" class="nav-link-custom <?= strpos(current_url(), 'appointments') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-calendar2-check-fill text-warning"></i>
                        <span>OPD Appointments</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/patients') ?>" class="nav-link-custom <?= strpos(current_url(), 'patients') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-folder-fill text-info"></i>
                        <span>Patient Records</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/lab-reports') ?>" class="nav-link-custom <?= strpos(current_url(), 'lab-reports') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-journal-medical text-purple" style="color:#9333ea;"></i>
                        <span>Lab Test Reports</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/telemedicine') ?>" class="nav-link-custom <?= strpos(current_url(), 'telemedicine') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-camera-video text-primary"></i>
                        <span>Telemedicine Calls</span>
                    </div>
                </a>
            <?php else: ?>
                <!-- Full Hospital Admin Navigation -->
                <div class="menu-category-header">Main Menu</div>

                <a href="<?= base_url('hospital/dashboard') ?>" class="nav-link-custom <?= current_url() == base_url('hospital/dashboard') ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-grid-1x2-fill text-primary"></i>
                        <span>Dashboard</span>
                    </div>
                </a>

                <!-- Role Workstations Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'panel') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('rolePanelsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-display-fill text-warning"></i>
                            <span>Role Workstations</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'panel') !== false ? 'show' : '' ?>" id="rolePanelsMenu">
                        <a href="<?= base_url('hospital/panel/doctor') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/doctor') ? 'active' : '' ?>">
                            <i class="bi bi-stethoscope"></i> Doctor Portal
                        </a>
                        <a href="<?= base_url('hospital/panel/receptionist') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/receptionist') ? 'active' : '' ?>">
                            <i class="bi bi-headset"></i> Receptionist Desk
                        </a>
                        <a href="<?= base_url('hospital/panel/nurse') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/nurse') ? 'active' : '' ?>">
                            <i class="bi bi-heart-pulse"></i> Nurse Station
                        </a>
                        <a href="<?= base_url('hospital/panel/pathologist') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/pathologist') ? 'active' : '' ?>">
                            <i class="bi bi-journal-medical"></i> Pathologist Desk
                        </a>
                        <a href="<?= base_url('hospital/panel/pharmacist') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/pharmacist') ? 'active' : '' ?>">
                            <i class="bi bi-capsule"></i> Pharmacist Desk
                        </a>
                        <a href="<?= base_url('hospital/panel/accountant') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/panel/accountant') ? 'active' : '' ?>">
                            <i class="bi bi-receipt"></i> Accountant Console
                        </a>
                    </div>
                </div>

                <!-- Patients Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'patients') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('patientsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-folder-fill text-info"></i>
                            <span>Patients</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'patients') !== false ? 'show' : '' ?>" id="patientsMenu">
                        <a href="<?= base_url('hospital/patients') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/patients') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> Patient Directory
                        </a>
                        <a href="<?= base_url('hospital/patients/create') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/patients/create') ? 'active' : '' ?>">
                            <i class="bi bi-plus-lg"></i> Register Patient
                        </a>
                    </div>
                </div>

                <!-- Doctors Accordion -->
                <div>
                    <div class="nav-link-custom <?= current_url() == base_url('hospital/doctors') || current_url() == base_url('hospital/doctors/create') ? 'active' : '' ?>" onclick="toggleSubMenu('doctorsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-person-badge-fill text-primary"></i>
                            <span>Doctors</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'doctors') !== false ? 'show' : '' ?>" id="doctorsMenu">
                        <a href="<?= base_url('hospital/doctors') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/doctors') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> Doctor Directory
                        </a>
                        <a href="<?= base_url('hospital/doctors/create') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/doctors/create') ? 'active' : '' ?>">
                            <i class="bi bi-plus-lg"></i> Add New Doctor
                        </a>
                    </div>
                </div>

                <!-- Medical Departments -->
                <a href="<?= base_url('hospital/departments') ?>" class="nav-link-custom <?= strpos(current_url(), 'departments') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-building text-info"></i>
                        <span>Medical Departments</span>
                    </div>
                </a>

                <!-- Hospital Staff Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'staff') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('staffMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-people-fill text-info"></i>
                            <span>Hospital Staff</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'staff') !== false ? 'show' : '' ?>" id="staffMenu">
                        <a href="<?= base_url('hospital/staff') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/staff') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> All Staff Members
                        </a>
                        <a href="<?= base_url('hospital/staff/shifts') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/staff/shifts') ? 'active' : '' ?>">
                            <i class="bi bi-clock-history"></i> Shift Management / Roster
                        </a>
                    </div>
                </div>

                <!-- Appointments Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'appointments') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('appointmentsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-calendar2-check-fill text-warning"></i>
                            <span>Appointments</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'appointments') !== false ? 'show' : '' ?>" id="appointmentsMenu">
                        <a href="<?= base_url('hospital/appointments') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/appointments') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> All Appointments
                        </a>
                    </div>
                </div>

                <div class="menu-category-header">Medical & Services</div>

                <a href="<?= base_url('hospital/lab-reports') ?>" class="nav-link-custom <?= strpos(current_url(), 'lab-reports') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-journal-medical text-purple" style="color:#9333ea;"></i>
                        <span>Lab Reports</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/billing') ?>" class="nav-link-custom <?= strpos(current_url(), 'billing') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-receipt-cutoff text-success"></i>
                        <span>Invoices & Billing</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/pharmacy') ?>" class="nav-link-custom <?= strpos(current_url(), 'pharmacy') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-capsule text-danger"></i>
                        <span>Pharmacy</span>
                    </div>
                </a>

                <!-- Emergency & ICU Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'emergency') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('emergencyMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-exclamation text-danger"></i>
                            <span>Emergency & ICU</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'emergency') !== false ? 'show' : '' ?>" id="emergencyMenu">
                        <a href="<?= base_url('hospital/emergency') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/emergency') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> Emergency Patients
                        </a>
                    </div>
                </div>

                <!-- Bed & Ward Management Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'beds') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('bedsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-hospital text-primary"></i>
                            <span>Bed Management</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= strpos(current_url(), 'beds') !== false ? 'show' : '' ?>" id="bedsMenu">
                        <a href="<?= base_url('hospital/beds') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/beds') ? 'active' : '' ?>">
                            <i class="bi bi-pin-angle"></i> Ward & Bed Status
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('hospital/radiology') ?>" class="nav-link-custom <?= strpos(current_url(), 'radiology') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-x-ray text-info"></i>
                        <span>Radiology & Imaging</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/blood-bank') ?>" class="nav-link-custom <?= strpos(current_url(), 'blood-bank') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-droplet-fill text-danger"></i>
                        <span>Blood Bank</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/ambulance') ?>" class="nav-link-custom <?= strpos(current_url(), 'ambulance') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-truck text-warning"></i>
                        <span>Ambulance Service</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/ot-schedules') ?>" class="nav-link-custom <?= strpos(current_url(), 'ot-schedules') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-scissors text-danger"></i>
                        <span>Operation Theatre (OT)</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/telemedicine') ?>" class="nav-link-custom <?= strpos(current_url(), 'telemedicine') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-camera-video text-primary"></i>
                        <span>Telemedicine Video Call</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/organ-donation') ?>" class="nav-link-custom <?= strpos(current_url(), 'organ-donation') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-heart-pulse text-danger"></i>
                        <span>Organ Donation & Transplant</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/vaccination') ?>" class="nav-link-custom <?= strpos(current_url(), 'vaccination') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-capsule-pill text-success"></i>
                        <span>Vaccination Center</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/birth-death-records') ?>" class="nav-link-custom <?= strpos(current_url(), 'birth-death-records') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-person text-purple" style="color:#9333ea;"></i>
                        <span>Birth & Death Records</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/diabetic-care') ?>" class="nav-link-custom <?= strpos(current_url(), 'diabetic-care') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-activity text-primary"></i>
                        <span>Diabetic & Chronic Care</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/physiotherapy') ?>" class="nav-link-custom <?= strpos(current_url(), 'physiotherapy') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-body-text text-info"></i>
                        <span>Physiotherapy & Rehab</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/dietary') ?>" class="nav-link-custom <?= strpos(current_url(), 'dietary') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-egg-fried text-warning"></i>
                        <span>Dietary & Meal Services</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/insurance') ?>" class="nav-link-custom <?= strpos(current_url(), 'insurance') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-shield-check text-success"></i>
                        <span>Insurance & TPA Claims</span>
                    </div>
                </a>

                <div class="menu-category-header">System & Administration</div>

                <a href="<?= base_url('hospital/waste-management') ?>" class="nav-link-custom <?= strpos(current_url(), 'waste-management') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-trash3-fill text-warning"></i>
                        <span>Bio-Medical Waste Mgmt</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/feedback') ?>" class="nav-link-custom <?= strpos(current_url(), 'feedback') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <span>Patient Feedback & NPS</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/inventory') ?>" class="nav-link-custom <?= strpos(current_url(), 'inventory') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-box-seam text-info"></i>
                        <span>Inventory & Supplies</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/hr-payroll') ?>" class="nav-link-custom <?= strpos(current_url(), 'hr-payroll') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-workspace text-primary"></i>
                        <span>Human Resources (HR)</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/reports') ?>" class="nav-link-custom <?= strpos(current_url(), 'reports') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-graph-up-arrow text-success"></i>
                        <span>Reports & Analytics</span>
                    </div>
                </a>

                <a href="<?= base_url('hospital/subscription') ?>" class="nav-link-custom <?= strpos(current_url(), 'subscription') !== false ? 'active' : '' ?>">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-credit-card-2-front-fill text-info"></i>
                        <span>My Subscription</span>
                    </div>
                </a>

                <!-- Settings Accordion -->
                <div>
                    <div class="nav-link-custom <?= strpos(current_url(), 'settings') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('hospitalSettingsMenu', this)">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-gear-fill text-secondary"></i>
                            <span>Settings</span>
                        </div>
                        <i class="bi bi-chevron-down small transition-transform"></i>
                    </div>
                    <div class="sub-menu <?= (current_url() == base_url('hospital/settings') || current_url() == base_url('hospital/settings/custom-url')) ? 'show' : '' ?>" id="hospitalSettingsMenu">
                        <a href="<?= base_url('hospital/settings') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/settings') ? 'active' : '' ?>">
                            <i class="bi bi-gear-fill"></i> Hospital Settings
                        </a>
                        <a href="<?= base_url('hospital/settings/custom-url') ?>" class="sub-link-custom <?= current_url() == base_url('hospital/settings/custom-url') ? 'active' : '' ?>">
                            <i class="bi bi-link-45deg"></i> Custom URL
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Bottom Collapse Button -->
        <div class="sidebar-bottom-toggle" id="sidebarCollapseBtn">
            <i class="bi bi-chevron-double-left fs-5"></i>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <header class="top-navbar d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none border" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <h5 class="fw-bold text-dark mb-0"><?= session()->get('tenant_name') ?></h5>
                    <small class="text-muted">Cloud Hospital SaaS Edition</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="<?= base_url('appointments') ?>" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> Book Visit
                </a>
                <div class="vr my-1"></div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light border rounded-pill px-3 dropdown-toggle fw-semibold" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1 text-primary"></i> <?= session()->get('user_name') ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><span class="dropdown-item-text text-muted small">Role: <?= session()->get('user_role') ?></span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="p-4 flex-grow-1">
            <!-- Flash Alerts -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>

        <footer class="bg-white py-3 px-4 border-top text-center text-muted small">
            &copy; <?= date('Y') ?> <?= session()->get('tenant_name') ?>. Powered by CodeIgniter 4 Multi-Tenant SaaS.
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSubMenu(id, element) {
            const subMenu = document.getElementById(id);
            if (subMenu) {
                subMenu.classList.toggle('show');
                element.classList.toggle('active');
            }
        }

        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
