<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($tenant['name']) ?> - Modern Healthcare & Specialist OPD</title>
    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
            --primary: #0284c7;
            --primary-dark: #0369a1;
            --secondary: #0f172a;
            --accent: #0ea5e9;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            font-family: var(--font-body);
            color: #1e293b;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: var(--font-heading);
        }

        /* Top Notice Bar - Light Luxury Version */
        .notice-ticker-bar {
            background: #f0f9ff;
            color: #0369a1;
            font-size: 0.84rem;
            padding: 0.55rem 0;
            border-bottom: 1px solid #e0f2fe;
            font-weight: 500;
        }

        /* Clean White Navbar */
        .navbar-light-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            padding: 0.65rem 0;
            box-shadow: 0 4px 25px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }

        .navbar-custom-container {
            max-width: 1400px !important;
            width: 100%;
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.3rem;
            color: #0f172a !important;
            letter-spacing: -0.02em;
            white-space: nowrap !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .navbar-brand span {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-nav {
            gap: 0.25rem;
        }

        .navbar-nav .nav-link {
            white-space: nowrap !important;
            font-size: 0.88rem;
            font-weight: 600;
            color: #475569 !important;
            padding: 0.5rem 0.9rem !important;
            border-radius: 50px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: #0284c7 !important;
            background: rgba(2, 132, 199, 0.08);
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            color: #0284c7 !important;
            background: #e0f2fe;
            font-weight: 700;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.25rem;
            box-shadow: 0 6px 16px rgba(2, 132, 199, 0.3);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover .brand-icon {
            transform: scale(1.05) rotate(-3deg);
        }

        .btn-nav-portal {
            background: linear-gradient(135deg, #0284c7 0%, #1d4ed8 100%);
            color: #ffffff !important;
            border: none;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.35);
            transition: all 0.25s ease;
        }

        .btn-nav-portal:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.45);
            color: #ffffff !important;
        }

        .btn-nav-er {
            border: 1.5 solid #ef4444;
            color: #dc2626 !important;
            background: rgba(254, 242, 242, 0.8);
            transition: all 0.25s ease;
        }

        .btn-nav-er:hover {
            background: #ef4444;
            color: #ffffff !important;
            border-color: #ef4444;
            box-shadow: 0 4px 14px rgba(239, 68, 68, 0.35);
        }

        /* Light Hero Section */
        .hero-light-wrapper {
            background: radial-gradient(circle at 90% 10%, rgba(2, 132, 199, 0.08) 0%, transparent 40%),
                        radial-gradient(circle at 10% 90%, rgba(16, 185, 129, 0.06) 0%, transparent 40%),
                        linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);
            padding: 130px 0 80px;
            position: relative;
        }

        .hero-light-title {
            font-size: 3.4rem;
            font-weight: 800;
            line-height: 1.15;
            color: #0f172a;
            letter-spacing: -0.03em;
        }

        .text-primary-gradient {
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Card Box */
        .hero-booking-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px -10px rgba(2, 132, 199, 0.12);
            border: 1px solid #e0f2fe;
            padding: 2rem;
        }

        /* Light Cards */
        .card-light {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .card-light:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px -5px rgba(2, 132, 199, 0.12);
            border-color: #38bdf8;
        }

        /* Pulse Red */
        .pulse-red-light {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #ef4444;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            animation: pulseLight 1.6s infinite;
        }

        @keyframes pulseLight {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 8px rgba(239, 68, 68, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        /* Department Icon Box */
        .dept-icon-light {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
            margin-bottom: 1.2rem;
        }

        /* Doctor Avatar Light */
        .doc-avatar-light {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            color: #ffffff;
            font-weight: 800;
            font-size: 1.35rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 16px rgba(2, 132, 199, 0.25);
            flex-shrink: 0;
        }

        /* Filter Pills */
        .filter-pill-btn {
            background: #ffffff;
            border: 1px solid var(--border-color);
            color: #475569;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            transition: all 0.2s ease;
        }

        .filter-pill-btn:hover, .filter-pill-btn.active {
            background: #0284c7;
            color: #ffffff;
            border-color: #0284c7;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
        }

        /* Symptom Tile */
        .symptom-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.25rem;
            cursor: pointer;
            transition: all 0.25s ease;
            text-align: center;
        }
        .symptom-card:hover {
            background: #ffffff;
            border-color: #0284c7;
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.1);
        }

        /* Day Badge Light */
        .day-pill-light {
            background: #f1f5f9;
            color: #334155;
            font-weight: 700;
            font-size: 0.75rem;
            padding: 0.28rem 0.68rem;
            border-radius: 50px;
        }

        /* Floating Emergency Button */
        .floating-emergency-light {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1050;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            border-radius: 50px;
            padding: 0.85rem 1.6rem;
            font-weight: 800;
            box-shadow: 0 12px 30px rgba(239, 68, 68, 0.35);
            display: flex;
            align-items: center;
            gap: 0.65rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .floating-emergency-light:hover {
            color: #ffffff;
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(239, 68, 68, 0.45);
        }

        .section-badge-light {
            background: #e0f2fe;
            color: #0284c7;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 0.4rem 1.1rem;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 0.75rem;
        }
    </style>
</head>
<body>

    <!-- Top Announcement Bar -->
    <div class="notice-ticker-bar">
        <div class="container-fluid navbar-custom-container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2 overflow-hidden text-truncate">
                <span class="badge bg-danger rounded-pill px-2.5">Notice</span>
                <span class="fw-medium text-truncate">
                    <?= esc(!empty($tenant['notice_ticker']) ? $tenant['notice_ticker'] : '📢 24/7 Emergency ER & Cardiac Ambulance Active | 📢 Online OPD Serial Booking & Digital Lab Reports Available') ?>
                </span>
            </div>
            <div class="d-none d-md-flex align-items-center gap-3 flex-shrink-0">
                <span><i class="bi bi-clock me-1 text-info"></i> OPD Hours: <?= esc(!empty($tenant['opd_hours']) ? $tenant['opd_hours'] : '08:00 AM - 10:00 PM') ?></span>
                <span><i class="bi bi-telephone me-1 text-success"></i> <?= esc($tenant['phone']) ?></span>
            </div>
        </div>
    </div>

    <!-- Light Clean Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light-custom sticky-top">
        <div class="container-fluid navbar-custom-container">
            <a class="navbar-brand d-flex align-items-center gap-2.5" href="#">
                <div class="brand-icon">
                    <i class="bi bi-hospital-fill"></i>
                </div>
                <span><?= esc($tenant['name']) ?></span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#lightNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="lightNav">
                <ul class="navbar-nav ms-auto align-items-center gap-lg-1.5 gap-2 mt-3 mt-lg-0">
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#overview">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#departments">Departments</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#doctors">Specialists</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#packages">Packages</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#reports">Lab Reports</a></li>
                    <li class="nav-item"><a class="nav-link text-dark fw-semibold" href="#faq">FAQ</a></li>
                    
                    <li class="nav-item ms-lg-2">
                        <a href="tel:<?= esc($tenant['phone']) ?>" class="btn btn-sm btn-nav-er rounded-pill px-3 py-2 fw-bold d-flex align-items-center gap-2">
                            <span class="pulse-red-light"></span> ER Hotline
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('login') ?>" class="btn btn-sm btn-nav-portal rounded-pill px-3.5 py-2 fw-bold d-flex align-items-center gap-1.5">
                            <i class="bi bi-person-fill"></i> Portal Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bright Light Hero Section -->
    <section class="hero-light-wrapper" id="overview">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="section-badge-light mb-3">
                        <i class="bi bi-patch-check-fill me-1"></i> Official Hospital OPD Portal
                    </span>

                    <h1 class="hero-light-title mb-3">
                        Exceptional Care, <br><span class="text-primary-gradient">Modern Medical Excellence</span>
                    </h1>
                    
                    <p class="lead text-secondary mb-4 fs-5" style="max-width: 600px;">
                        Providing 24/7 emergency care, senior consultant OPD clinics, electronic medical prescriptions, and high-precision diagnostic lab services at <strong><?= esc($tenant['name']) ?></strong>.
                    </p>

                    <div class="d-flex flex-wrap gap-2.5 mb-4">
                        <button type="button" class="btn btn-primary rounded-pill px-3.5 py-2.5 fw-bold shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            <i class="bi bi-calendar2-check-fill"></i> Book Doctor Serial
                        </button>
                        <a href="tel:<?= esc($tenant['phone']) ?>" class="btn btn-outline-secondary rounded-pill px-3.5 py-2.5 fw-semibold d-flex align-items-center gap-2">
                            <i class="bi bi-telephone-fill text-danger"></i> Emergency ER: <?= esc($tenant['phone']) ?>
                        </a>
                    </div>

                    <!-- Key Stats Grid -->
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-white rounded-4 border shadow-sm text-center">
                                <h3 class="fw-extrabold text-primary mb-0">24/7</h3>
                                <small class="text-muted fw-semibold" style="font-size: 0.78rem;">Emergency ER</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-white rounded-4 border shadow-sm text-center">
                                <h3 class="fw-extrabold text-info mb-0"><?= count($doctors) ?>+</h3>
                                <small class="text-muted fw-semibold" style="font-size: 0.78rem;">Specialist Doctors</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-white rounded-4 border shadow-sm text-center">
                                <h3 class="fw-extrabold text-success mb-0">6+</h3>
                                <small class="text-muted fw-semibold" style="font-size: 0.78rem;">Clinical Depts</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3 bg-white rounded-4 border shadow-sm text-center">
                                <h3 class="fw-extrabold text-warning mb-0">100%</h3>
                                <small class="text-muted fw-semibold" style="font-size: 0.78rem;">Digital Lab</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instant OPD Booking Card -->
                <div class="col-lg-5">
                    <div class="hero-booking-card">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <div>
                                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history text-primary me-2"></i> OPD Serial Booking</h5>
                                <small class="text-muted">Instant Doctor Chamber Reservation</small>
                            </div>
                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1.5 fw-bold">Live</span>
                        </div>

                        <form onsubmit="event.preventDefault(); openAppointmentModal();">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Medical Department</label>
                                <select id="heroDeptSelect" class="form-select fw-semibold" onchange="filterHeroDoctors()">
                                    <option value="">All Clinical Departments</option>
                                    <?php foreach ($allDepartments as $dName => $dInfo): ?>
                                        <option value="<?= esc($dName) ?>"><?= esc($dName) ?> (<?= esc($dInfo['bn']) ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Specialist Consultant</label>
                                <select id="heroDoctorSelect" class="form-select fw-semibold">
                                    <option value="">-- Choose Specialist Doctor --</option>
                                    <?php foreach ($doctors as $d): ?>
                                        <option value="<?= esc($d['id']) ?>" data-dept="<?= esc($d['department']) ?>">
                                            <?= esc($d['name']) ?> (<?= esc($d['department']) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-secondary">Appointment Date</label>
                                <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-check-circle-fill"></i> Proceed to Book Serial
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Find Doctor by Symptoms -->
    <section id="symptoms" class="py-5 bg-white border-bottom">
        <div class="container py-4">
            <div class="text-center mb-5" style="max-width: 650px; margin: 0 auto;">
                <span class="section-badge-light"><i class="bi bi-search me-1"></i> Quick Symptom Finder</span>
                <h2 class="fw-extrabold text-dark display-6">Find Doctor by Health Condition</h2>
                <p class="text-muted">Click on your health symptom to find the right medical specialist</p>
            </div>

            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('Cardiology')">
                        <div class="fs-2 text-danger mb-2"><i class="bi bi-heart-pulse-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Chest Pain / Heart</h6>
                        <small class="text-primary fw-semibold">Cardiology</small>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('Neurology')">
                        <div class="fs-2 text-info mb-2"><i class="bi bi-cpu-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Headache / Stroke</h6>
                        <small class="text-primary fw-semibold">Neurology</small>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('Orthopedics')">
                        <div class="fs-2 text-warning mb-2"><i class="bi bi-bandaid-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Bone / Fracture</h6>
                        <small class="text-primary fw-semibold">Orthopedics</small>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('Pediatrics')">
                        <div class="fs-2 text-success mb-2"><i class="bi bi-emoji-smile-fill"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Child Fever / Care</h6>
                        <small class="text-primary fw-semibold">Pediatrics</small>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('Gynecology & Obstetrics')">
                        <div class="fs-2 text-primary mb-2" style="color: #ec4899 !important;"><i class="bi bi-gender-female"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Pregnancy & Women</h6>
                        <small class="text-primary fw-semibold">Gynecology</small>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="symptom-card" onclick="filterDoctorsByDept('General Surgery')">
                        <div class="fs-2 text-secondary mb-2"><i class="bi bi-scissors"></i></div>
                        <h6 class="fw-bold text-dark mb-1">Surgery & Hernia</h6>
                        <small class="text-primary fw-semibold">General Surgery</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clinical Departments -->
    <section id="departments" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" style="max-width: 650px; margin: 0 auto;">
                <span class="section-badge-light"><i class="bi bi-building me-1"></i> Medical Specialties</span>
                <h2 class="fw-extrabold text-dark display-5">Our Medical Departments</h2>
                <p class="text-muted">Specialized outpatient & inpatient care units at <?= esc($tenant['name']) ?></p>
            </div>

            <div class="row g-4">
                <?php foreach ($allDepartments as $deptName => $info): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-light p-4 h-100 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="dept-icon-light" style="background: <?= $info['bg'] ?>; color: <?= $info['color'] ?>;">
                                    <i class="bi <?= $info['icon'] ?>"></i>
                                </div>
                                <span class="badge bg-light text-dark border rounded-pill px-3 py-1.5 fw-semibold small">
                                    <i class="bi bi-door-open text-primary me-1"></i> <?= esc($info['rooms']) ?>
                                </span>
                            </div>

                            <h4 class="fw-bold text-dark mb-1"><?= esc($deptName) ?></h4>
                            <h6 class="fw-semibold text-primary mb-2.5" style="font-size: 0.95rem;"><?= esc($info['bn']) ?></h6>
                            <p class="text-secondary small mb-4"><?= esc($info['desc']) ?></p>

                            <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                <small class="fw-bold text-dark">
                                    <i class="bi bi-people-fill text-info me-1"></i> <?= $departmentCounts[$deptName] ?? 0 ?> Doctors
                                </small>
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3.5 fw-semibold" onclick="filterDoctorsByDept('<?= esc($deptName) ?>')">
                                    View Doctors <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Doctors Directory & Interactive Filter -->
    <section id="doctors" class="py-5 bg-light border-top border-bottom">
        <div class="container py-5">
            <div class="text-center mb-4" style="max-width: 650px; margin: 0 auto;">
                <span class="section-badge-light"><i class="bi bi-person-badge me-1"></i> Specialist Consultants</span>
                <h2 class="fw-extrabold text-dark display-5">Specialist Doctors & Visiting Schedule</h2>
                <p class="text-muted">Book serial consultation with senior professors and specialists.</p>
            </div>

            <!-- Dynamic Filter Pills -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
                <button type="button" class="filter-pill-btn active" onclick="filterDoctorsByDept('all', this)">All Departments</button>
                <?php foreach ($allDepartments as $deptName => $info): ?>
                    <button type="button" class="filter-pill-btn" onclick="filterDoctorsByDept('<?= esc($deptName) ?>', this)"><?= esc($deptName) ?></button>
                <?php endforeach; ?>
            </div>

            <div class="row g-4" id="doctorsGrid">
                <?php if (empty($doctors)): ?>
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="bi bi-person-badge fs-1 d-block mb-2 opacity-50"></i>
                        No specialist doctors listed currently.
                    </div>
                <?php else: ?>
                    <?php foreach ($doctors as $doc): ?>
                        <div class="col-12 col-md-6 col-lg-4 doctor-card-item" data-dept="<?= esc($doc['department']) ?>">
                            <div class="card card-light p-4 h-100 d-flex flex-column">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="doc-avatar-light">
                                        <?= strtoupper(substr($doc['name'], 0, 2)) ?>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.12rem;"><?= esc($doc['name']) ?></h5>
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold small">
                                            <?= esc($doc['department']) ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="fw-semibold text-secondary small mb-1"><i class="bi bi-award-fill text-warning me-1"></i> <?= esc($doc['designation'] ?? 'Specialist Consultant') ?></div>
                                    <div class="text-muted small"><i class="bi bi-mortarboard-fill text-info me-1"></i> <?= esc($doc['specialization']) ?></div>
                                    <?php if (!empty($doc['bmdc_reg_no'])): ?>
                                        <small class="text-muted d-block mt-1"><i class="bi bi-card-checklist me-1"></i> BMDC Reg: <strong><?= esc($doc['bmdc_reg_no']) ?></strong></small>
                                    <?php endif; ?>
                                </div>

                                <!-- Chamber & Schedule -->
                                <div class="bg-light p-3 rounded-3 mb-3 border">
                                    <div class="d-flex align-items-center justify-content-between small text-dark fw-bold mb-2">
                                        <span><i class="bi bi-door-open-fill text-primary me-1"></i> <?= esc($doc['room_no'] ?? 'OPD Room') ?></span>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted d-block fw-semibold mb-1">Visiting Days:</small>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php 
                                            $vDays = explode(',', $doc['visiting_days'] ?? '');
                                            foreach ($vDays as $vd):
                                                $vdClean = trim($vd);
                                                if (!empty($vdClean)):
                                            ?>
                                                <span class="day-pill-light"><?= esc($vdClean) ?></span>
                                            <?php endif; endforeach; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block fw-semibold mb-1">Visiting Hours:</small>
                                        <small class="fw-bold text-dark"><i class="bi bi-clock me-1 text-primary"></i> <?= esc($doc['visiting_time'] ?? '05:00 PM - 09:00 PM') ?></small>
                                    </div>
                                </div>

                                <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                    <div>
                                        <small class="text-muted d-block">First Visit Fee</small>
                                        <span class="fw-extrabold text-success fs-5">৳ <?= number_format($doc['consultation_fee'], 2) ?></span>
                                    </div>
                                    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" onclick="selectDoctorForModal(<?= esc($doc['id']) ?>)">
                                        <i class="bi bi-calendar2-plus me-1"></i> Book Serial
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Health Packages & Diagnostic Packages -->
    <section id="packages" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5" style="max-width: 650px; margin: 0 auto;">
                <span class="section-badge-light"><i class="bi bi-bag-check-fill me-1"></i> Special Health Packages</span>
                <h2 class="fw-extrabold text-dark display-6">Diagnostic & Health Checkups</h2>
                <p class="text-muted">Discounted comprehensive health packages for preventive care.</p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-light p-4 h-100 text-center border-top border-primary border-3">
                        <div class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 fw-bold mb-3">Popular</div>
                        <h5 class="fw-bold text-dark mb-1">Executive Cardiac Checkup</h5>
                        <p class="text-muted small mb-3">Heart diagnostics & ECG package</p>
                        <h3 class="fw-extrabold text-primary mb-3">৳ 3,500</h3>
                        <ul class="list-unstyled text-start small text-secondary mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> 12-Lead ECG & Echo</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Full Lipid Profile</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Chest X-Ray Digital</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Cardiologist Consultation</li>
                        </ul>
                        <button class="btn btn-outline-primary rounded-pill w-100 fw-bold mt-auto" onclick="openAppointmentModal()">Book Package</button>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-light p-4 h-100 text-center border-top border-success border-3">
                        <div class="badge bg-success-subtle text-success rounded-pill px-3 py-1 fw-bold mb-3">Complete</div>
                        <h5 class="fw-bold text-dark mb-1">Full Body Master Checkup</h5>
                        <p class="text-muted small mb-3">Complete organ screening</p>
                        <h3 class="fw-extrabold text-success mb-3">৳ 5,500</h3>
                        <ul class="list-unstyled text-start small text-secondary mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Kidney & Liver Profile</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Blood Sugar & HbA1c</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Thyroid Hormone Test</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> USG Whole Abdomen</li>
                        </ul>
                        <button class="btn btn-outline-success rounded-pill w-100 fw-bold mt-auto" onclick="openAppointmentModal()">Book Package</button>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-light p-4 h-100 text-center border-top border-info border-3">
                        <div class="badge bg-info-subtle text-info rounded-pill px-3 py-1 fw-bold mb-3">Child Care</div>
                        <h5 class="fw-bold text-dark mb-1">Pediatric Wellness Checkup</h5>
                        <p class="text-muted small mb-3">Children health screening</p>
                        <h3 class="fw-extrabold text-info mb-3">৳ 1,800</h3>
                        <ul class="list-unstyled text-start small text-secondary mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Complete Blood Count (CBC)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Urine & Stool R/E</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Pediatrician Consultation</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Growth & Nutrition Chart</li>
                        </ul>
                        <button class="btn btn-outline-info rounded-pill w-100 fw-bold mt-auto" onclick="openAppointmentModal()">Book Package</button>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-light p-4 h-100 text-center border-top border-danger border-3">
                        <div class="badge bg-danger-subtle text-danger rounded-pill px-3 py-1 fw-bold mb-3">Women Care</div>
                        <h5 class="fw-bold text-dark mb-1">Women Health Screening</h5>
                        <p class="text-muted small mb-3">Maternity & Women Wellness</p>
                        <h3 class="fw-extrabold text-danger mb-3">৳ 4,200</h3>
                        <ul class="list-unstyled text-start small text-secondary mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Gynecologist Consultation</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> USG Pelvis / Abdomen</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Pap Smear Screening</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Calcium & Vitamin D3</li>
                        </ul>
                        <button class="btn btn-outline-danger rounded-pill w-100 fw-bold mt-auto" onclick="openAppointmentModal()">Book Package</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Digital Pathology Lab Report Search -->
    <section id="reports" class="py-5 bg-gradient-primary-subtle border-top border-bottom" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container py-4">
            <div class="row align-items-center justify-content-between g-4">
                <div class="col-lg-6">
                    <span class="section-badge-light bg-white text-primary border shadow-sm mb-2">
                        <i class="bi bi-file-earmark-medical-fill me-1 text-primary"></i> 24/7 Digital Pathology Portal
                    </span>
                    <h2 class="fw-extrabold text-dark display-6 mb-3">Download Diagnostic Lab Reports Online</h2>
                    <p class="text-secondary mb-4">
                        Already given blood or diagnostic samples at <strong><?= esc($tenant['name']) ?></strong>? Enter your Invoice/Bill Voucher ID below to instantly view, print, or download your official verified lab test report.
                    </p>

                    <!-- Quick Report Search Input Card -->
                    <div class="card p-3 p-md-4 rounded-4 shadow-sm border-0 bg-white">
                        <form onsubmit="event.preventDefault(); openLabReportModal();">
                            <label class="form-label fw-bold text-dark mb-2">
                                <i class="bi bi-qr-code-scan text-primary me-1"></i> Enter Bill / Voucher ID Code:
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light text-muted border-end-0 rounded-start-pill ps-3">
                                    <i class="bi bi-receipt"></i>
                                </span>
                                <input type="text" id="reportSearchId" class="form-control border-start-0 border-end-0 fw-bold text-primary" placeholder="e.g. LAB-8042" value="LAB-8042" required>
                                <button type="submit" class="btn btn-primary rounded-end-pill px-4 fw-bold shadow-sm">
                                    <i class="bi bi-search me-1"></i> Find Report
                                </button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2 px-1">
                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Try sample code: <strong class="text-primary cursor-pointer" onclick="document.getElementById('reportSearchId').value='LAB-8042'; openLabReportModal();">LAB-8042</strong></small>
                                <small class="text-success fw-bold"><i class="bi bi-shield-check me-1"></i> Verified Digital PDF</small>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 rounded-4 shadow-lg p-4 bg-white text-dark position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3 opacity-10 fs-1 text-primary">
                            <i class="bi bi-journal-medical"></i>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-primary text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="bi bi-check2-square fs-3"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">High-Precision Diagnostic Results</h5>
                                <small class="text-muted">Instant Access & Cloud Verification</small>
                            </div>
                        </div>

                        <ul class="list-unstyled text-secondary mb-4 small space-y-2">
                            <li class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-check-circle-fill text-success fs-6"></i> Verified by Senior Consultant Pathologists
                            </li>
                            <li class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-check-circle-fill text-success fs-6"></i> Instant Online Viewable & High-Quality Printable PDF
                            </li>
                            <li class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-check-circle-fill text-success fs-6"></i> Complete Patient & Reference Parameter Details
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-success fs-6"></i> 24/7 Secure Cloud Storage & QR Validation
                            </li>
                        </ul>

                        <button type="button" class="btn btn-outline-primary rounded-pill w-100 py-2.5 fw-bold d-flex align-items-center justify-content-center gap-2" onclick="openLabReportModal()">
                            <i class="bi bi-eye-fill"></i> Preview Demo Report (LAB-8042)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Frequently Asked Questions (FAQ) -->
    <section id="faq" class="py-5 bg-light border-top border-bottom">
        <div class="container py-4">
            <div class="text-center mb-5" style="max-width: 650px; margin: 0 auto;">
                <span class="section-badge-light"><i class="bi bi-question-circle me-1"></i> Patient Support</span>
                <h2 class="fw-extrabold text-dark display-6">Frequently Asked Questions</h2>
                <p class="text-muted">Find answers to common questions about OPD appointments & lab services.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion" id="hospitalFAQ">
                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold text-dark py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="bi bi-calendar-check text-primary me-2"></i> How do I book an OPD doctor serial online?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#hospitalFAQ">
                                <div class="accordion-body text-secondary small">
                                    You can easily book a doctor serial by clicking the <strong>"Book Doctor Serial Online"</strong> button on our homepage. Select your preferred doctor, enter patient name and mobile number, and pick the visit date. You will receive an instant confirmation on screen and an SMS notification on your mobile.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-dark py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="bi bi-file-earmark-medical text-success me-2"></i> How can I view or download my diagnostic lab reports?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#hospitalFAQ">
                                <div class="accordion-body text-secondary small">
                                    Enter your Bill Voucher ID (found on your payment receipt) in the <strong>"Download Digital Lab Reports"</strong> section on our homepage or log in to the patient portal to view and download official PDF test reports anytime.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-dark py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="bi bi-clock-history text-warning me-2"></i> What are the visiting hours for specialist OPD chambers?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#hospitalFAQ">
                                <div class="accordion-body text-secondary small">
                                    OPD Specialist Chambers are open Saturday through Thursday. Each consultant's specific visiting days and time slots (e.g. 05:00 PM - 09:00 PM) are clearly listed under their doctor profile on this website.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-dark py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="bi bi-shield-exclamation text-danger me-2"></i> Are Emergency ER and Cardiac Ambulance services available 24/7?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#hospitalFAQ">
                                <div class="accordion-body text-secondary small">
                                    Yes! Our Emergency Room (ER), Trauma Center, Intensive Care Unit (ICU), Blood Bank, 24/7 Pharmacy, and Cardiac Ambulance dispatch are fully operational 24 hours a day, 7 days a week. Call our ER Hotline <strong><?= esc($tenant['phone']) ?></strong> for instant emergency support.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency & Contact Section -->
    <section id="contact" class="py-5 bg-dark text-white">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-bold mb-3">24/7 Emergency Care</span>
                    <h2 class="display-6 fw-extrabold text-white mb-3">Ready for Emergency Medical Services</h2>
                    <p class="text-light opacity-75 lead fs-6 mb-4">Our trauma unit, ICU beds, ambulance service, and emergency medical officers are active 24/7.</p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-danger text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="bi bi-telephone-fill fs-5"></i>
                            </div>
                            <div>
                                <small class="text-light opacity-75 d-block">Emergency ER Hotline</small>
                                <strong class="fs-4 text-white"><?= esc($tenant['phone']) ?></strong>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="bi bi-geo-alt-fill fs-5"></i>
                            </div>
                            <div>
                                <small class="text-light opacity-75 d-block">Hospital Address</small>
                                <strong class="fs-6 text-white"><?= esc($tenant['address']) ?></strong>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-info text-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </div>
                            <div>
                                <small class="text-light opacity-75 d-block">Official Email</small>
                                <strong class="fs-6 text-white"><?= esc($tenant['email']) ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-light p-4 bg-white text-dark shadow-lg">
                        <h4 class="fw-bold mb-3"><i class="bi bi-send-fill text-primary me-2"></i> Send Message to Reception</h4>
                        <form onsubmit="event.preventDefault(); alert('Message sent successfully!');">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Your Name *</label>
                                <input type="text" class="form-control" placeholder="e.g. Anisur Rahman" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Phone Number *</label>
                                <input type="tel" class="form-control" placeholder="01711000000" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Inquiry Details</label>
                                <textarea class="form-control" rows="3" placeholder="Write your inquiry..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                                <i class="bi bi-paperplane me-1"></i> Send Inquiry Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Emergency Hotline Button -->
    <a href="tel:<?= esc($tenant['phone']) ?>" class="floating-emergency-light">
        <span class="pulse-red-light"></span> Emergency Call: <?= esc($tenant['phone']) ?>
    </a>

    <!-- Serial Booking Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom bg-primary text-white py-3 px-4 rounded-top-4">
                    <h5 class="modal-title fw-bold"><i class="bi bi-calendar-plus me-2"></i> OPD Serial Appointment Booking</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="modalSerialForm" onsubmit="event.preventDefault(); submitSerialBooking();">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-secondary">Select Doctor *</label>
                            <select id="modalDoctorSelect" class="form-select fw-semibold" required>
                                <option value="">-- Choose Specialist Doctor --</option>
                                <?php foreach ($doctors as $d): ?>
                                    <option value="<?= esc($d['id']) ?>">
                                        <?= esc($d['name']) ?> - <?= esc($d['department']) ?> (৳<?= number_format($d['consultation_fee'], 0) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-secondary">Patient Full Name *</label>
                            <input type="text" id="modalPatientName" class="form-control" placeholder="e.g. Abul Kashem" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-secondary">Patient Phone Number *</label>
                            <input type="tel" id="modalPatientPhone" class="form-control" placeholder="01711223344" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-secondary">Appointment Date *</label>
                            <input type="date" id="modalAppointmentDate" class="form-control" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                            <i class="bi bi-check-circle-fill me-1"></i> Confirm OPD Serial Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Digital Pathology Report Viewer Modal -->
    <div class="modal fade" id="labReportViewerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow-lg">
                <div class="modal-header border-bottom bg-dark text-white py-3 px-4 rounded-top-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-medical-fill text-info fs-4"></i>
                        <div>
                            <h5 class="modal-title fw-bold text-white mb-0">Official Digital Pathology Report</h5>
                            <small class="text-light opacity-75" id="viewReportIdLabel">Voucher Code: LAB-8042</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 p-md-5 bg-white text-dark">
                    <!-- Report Header -->
                    <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom">
                        <div>
                            <h4 class="fw-extrabold text-primary mb-1"><?= esc($tenant['name']) ?></h4>
                            <small class="text-muted d-block"><i class="bi bi-geo-alt me-1"></i> <?= esc($tenant['address']) ?></small>
                            <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Phone: <?= esc($tenant['phone']) ?></small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-bold mb-1">
                                <i class="bi bi-check-circle-fill me-1"></i> Verified & Final
                            </span>
                            <small class="text-muted d-block">Report Date: <?= date('d M Y') ?></small>
                        </div>
                    </div>

                    <!-- Patient Summary Card -->
                    <div class="p-3 bg-light rounded-4 border mb-4">
                        <div class="row g-2 small">
                            <div class="col-md-6">
                                <strong>Patient Name:</strong> <span id="reportPatientName">Abul Kashem</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Referred Doctor:</strong> <span>Dr. Mahbub Rahman (Cardiology)</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Age / Gender:</strong> <span>42 Yrs / Male</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Lab Voucher ID:</strong> <span class="fw-bold text-primary" id="reportVoucherCode">LAB-8042</span>
                            </div>
                        </div>
                    </div>

                    <!-- Report Test Category Tabs -->
                    <div class="d-flex flex-wrap gap-2 mb-3 border-bottom pb-3">
                        <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold active" id="tabCBC" onclick="switchReportCategory('CBC')">
                            <i class="bi bi-droplet-fill me-1"></i> CBC & Hematology
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" id="tabLipid" onclick="switchReportCategory('Lipid')">
                            <i class="bi bi-heart-pulse-fill me-1"></i> Lipid Profile (Cardiac)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" id="tabDiabetic" onclick="switchReportCategory('Diabetic')">
                            <i class="bi bi-activity me-1"></i> Diabetic & HbA1c
                        </button>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h6 class="fw-bold text-dark mb-0" id="reportCategoryTitle">
                            <i class="bi bi-droplet-fill text-danger me-1"></i> Test Results: Complete Blood Count (CBC) & Differential
                        </h6>
                        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2.5 py-1 fw-bold small" id="reportMethod">
                            Automated Hematology Analyzer (Sysmex XN)
                        </span>
                    </div>
                    
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-striped align-middle small" id="reportTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Test Parameter</th>
                                    <th>Observed Value</th>
                                    <th>Unit</th>
                                    <th>Reference Normal Range</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="reportTableBody">
                                <tr>
                                    <td class="fw-semibold">Hemoglobin (Hb)</td>
                                    <td class="fw-bold text-dark">14.2</td>
                                    <td class="text-muted">g/dL</td>
                                    <td class="text-muted">13.0 - 17.5</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Total RBC Count</td>
                                    <td class="fw-bold text-dark">4.85</td>
                                    <td class="text-muted">M/µL</td>
                                    <td class="text-muted">4.50 - 5.90</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Total WBC Count</td>
                                    <td class="fw-bold text-dark">7,800</td>
                                    <td class="text-muted">/µL</td>
                                    <td class="text-muted">4,000 - 11,000</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Platelet Count</td>
                                    <td class="fw-bold text-dark">245,000</td>
                                    <td class="text-muted">/µL</td>
                                    <td class="text-muted">150,000 - 450,000</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Neutrophils</td>
                                    <td class="fw-bold text-dark">62</td>
                                    <td class="text-muted">%</td>
                                    <td class="text-muted">40 - 75</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Lymphocytes</td>
                                    <td class="fw-bold text-dark">30</td>
                                    <td class="text-muted">%</td>
                                    <td class="text-muted">20 - 45</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">ESR (Westergren)</td>
                                    <td class="fw-bold text-dark">12</td>
                                    <td class="text-muted">mm/1st hr</td>
                                    <td class="text-muted">0 - 15</td>
                                    <td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pathologist Signature Footer -->
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-2 bg-light border rounded-3 text-center">
                                <i class="bi bi-qr-code fs-2 text-dark"></i>
                                <small class="d-block text-muted" style="font-size: 0.65rem;">Scan to Verify</small>
                            </div>
                            <div class="text-muted small">
                                <div><strong>Verification ID:</strong> <code class="text-primary fw-bold">7F8E-9A2B-NUR</code></div>
                                <div style="font-size: 0.78rem;"><i class="bi bi-shield-lock-fill text-success me-1"></i> Cryptographically Signed Digital Medical Record</div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="fw-bold text-dark mb-0">Dr. S. K. Roy</div>
                            <small class="text-muted d-block">MBBS, FCPS (Pathology), MPhil</small>
                            <small class="text-primary fw-semibold">Consultant Pathologist & Lab Director</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top py-3 px-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" onclick="window.print()">
                        <i class="bi bi-printer me-1"></i> Print / Download PDF Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterHeroDoctors() {
            const dept = document.getElementById('heroDeptSelect').value;
            const docSelect = document.getElementById('heroDoctorSelect');
            const options = docSelect.querySelectorAll('option');

            options.forEach(opt => {
                if (!opt.value) return;
                const optDept = opt.getAttribute('data-dept');
                if (!dept || optDept === dept) {
                    opt.style.display = 'block';
                } else {
                    opt.style.display = 'none';
                }
            });
            docSelect.value = '';
        }

        function filterDoctorsByDept(dept, element) {
            if (element) {
                document.querySelectorAll('.filter-pill-btn').forEach(btn => btn.classList.remove('active'));
                element.classList.add('active');
            }

            const docItems = document.querySelectorAll('.doctor-card-item');
            docItems.forEach(item => {
                const docDept = item.getAttribute('data-dept');
                if (dept === 'all' || docDept === dept) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });

            if (dept !== 'all') {
                const docSec = document.getElementById('doctors');
                if (docSec) docSec.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function openAppointmentModal() {
            const selectedDoc = document.getElementById('heroDoctorSelect').value;
            if (selectedDoc) {
                document.getElementById('modalDoctorSelect').value = selectedDoc;
            }
            const modal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            modal.show();
        }

        function selectDoctorForModal(docId) {
            document.getElementById('modalDoctorSelect').value = docId;
            const modal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            modal.show();
        }

        function submitSerialBooking() {
            const docName = document.getElementById('modalDoctorSelect').options[document.getElementById('modalDoctorSelect').selectedIndex].text;
            const patient = document.getElementById('modalPatientName').value;
            const phone   = document.getElementById('modalPatientPhone').value;
            const date    = document.getElementById('modalAppointmentDate').value;

            alert(`OPD Serial Booking Confirmed!\n\nPatient: ${patient}\nPhone: ${phone}\nDoctor: ${docName}\nDate: ${date}\n\nSMS Confirmation will be sent to your phone.`);
            
            const modalEl = document.getElementById('appointmentModal');
            const modal   = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
        }

        function openLabReportModal() {
            const searchVal = document.getElementById('reportSearchId')?.value || 'LAB-8042';
            document.getElementById('viewReportIdLabel').textContent = 'Voucher Code: ' + searchVal;
            document.getElementById('reportVoucherCode').textContent = searchVal;

            const modal = new bootstrap.Modal(document.getElementById('labReportViewerModal'));
            modal.show();
        }

        function switchReportCategory(category) {
            document.querySelectorAll('#labReportViewerModal .btn-primary').forEach(b => {
                b.classList.remove('btn-primary', 'active');
                b.classList.add('btn-outline-primary');
            });

            const activeBtn = document.getElementById('tab' + category);
            if (activeBtn) {
                activeBtn.classList.remove('btn-outline-primary');
                activeBtn.classList.add('btn-primary', 'active');
            }

            const titleEl  = document.getElementById('reportCategoryTitle');
            const methodEl = document.getElementById('reportMethod');
            const bodyEl   = document.getElementById('reportTableBody');

            if (category === 'CBC') {
                titleEl.innerHTML  = '<i class="bi bi-droplet-fill text-danger me-1"></i> Test Results: Complete Blood Count (CBC) & Differential';
                methodEl.textContent = 'Automated Hematology Analyzer (Sysmex XN)';
                bodyEl.innerHTML = `
                    <tr><td class="fw-semibold">Hemoglobin (Hb)</td><td class="fw-bold text-dark">14.2</td><td class="text-muted">g/dL</td><td class="text-muted">13.0 - 17.5</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Total RBC Count</td><td class="fw-bold text-dark">4.85</td><td class="text-muted">M/µL</td><td class="text-muted">4.50 - 5.90</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Total WBC Count</td><td class="fw-bold text-dark">7,800</td><td class="text-muted">/µL</td><td class="text-muted">4,000 - 11,000</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Platelet Count</td><td class="fw-bold text-dark">245,000</td><td class="text-muted">/µL</td><td class="text-muted">150,000 - 450,000</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Neutrophils</td><td class="fw-bold text-dark">62</td><td class="text-muted">%</td><td class="text-muted">40 - 75</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Lymphocytes</td><td class="fw-bold text-dark">30</td><td class="text-muted">%</td><td class="text-muted">20 - 45</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">ESR (Westergren)</td><td class="fw-bold text-dark">12</td><td class="text-muted">mm/1st hr</td><td class="text-muted">0 - 15</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                `;
            } else if (category === 'Lipid') {
                titleEl.innerHTML  = '<i class="bi bi-heart-pulse-fill text-primary me-1"></i> Test Results: Comprehensive Cardiac Lipid Profile';
                methodEl.textContent = 'Spectrophotometry / Direct Enzymatic';
                bodyEl.innerHTML = `
                    <tr><td class="fw-semibold">Total Cholesterol</td><td class="fw-bold text-dark">185</td><td class="text-muted">mg/dL</td><td class="text-muted">&lt; 200 Desirable</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Optimal</span></td></tr>
                    <tr><td class="fw-semibold">Triglycerides</td><td class="fw-bold text-dark">142</td><td class="text-muted">mg/dL</td><td class="text-muted">&lt; 150 Normal</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">HDL Cholesterol (Good)</td><td class="fw-bold text-dark">48</td><td class="text-muted">mg/dL</td><td class="text-muted">&gt; 40 Optimal</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Good</span></td></tr>
                    <tr><td class="fw-semibold">LDL Cholesterol (Bad)</td><td class="fw-bold text-dark">108</td><td class="text-muted">mg/dL</td><td class="text-muted">&lt; 130 Optimal</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Optimal</span></td></tr>
                    <tr><td class="fw-semibold">VLDL Cholesterol</td><td class="fw-bold text-dark">28.4</td><td class="text-muted">mg/dL</td><td class="text-muted">5.0 - 40.0</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">Cholesterol / HDL Ratio</td><td class="fw-bold text-dark">3.85</td><td class="text-muted">Ratio</td><td class="text-muted">3.3 - 4.4 Average Risk</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Low Risk</span></td></tr>
                `;
            } else if (category === 'Diabetic') {
                titleEl.innerHTML  = '<i class="bi bi-activity text-warning me-1"></i> Test Results: Glycated Hemoglobin (HbA1c) & Glucose';
                methodEl.textContent = 'HPLC (High-Performance Liquid Chromatography)';
                bodyEl.innerHTML = `
                    <tr><td class="fw-semibold">Fasting Blood Sugar (FBS)</td><td class="fw-bold text-dark">5.6</td><td class="text-muted">mmol/L</td><td class="text-muted">3.9 - 6.1 (Normal)</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">2 Hours Post-Prandial (2H ABF)</td><td class="fw-bold text-dark">7.2</td><td class="text-muted">mmol/L</td><td class="text-muted">&lt; 7.8 (Normal)</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                    <tr><td class="fw-semibold">HbA1c (Glycated Hb)</td><td class="fw-bold text-dark">5.8</td><td class="text-muted">%</td><td class="text-muted">&lt; 5.7 Normal / 5.7-6.4 Prediabetic</td><td><span class="badge bg-warning-subtle text-warning rounded-pill px-2.5 py-1"><i class="bi bi-exclamation-triangle me-1"></i> Pre-Diabetic</span></td></tr>
                    <tr><td class="fw-semibold">Estimated Avg Glucose (eAG)</td><td class="fw-bold text-dark">119.7</td><td class="text-muted">mg/dL</td><td class="text-muted">90 - 120</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Controlled</span></td></tr>
                    <tr><td class="fw-semibold">Urine Sugar (Fasting)</td><td class="fw-bold text-dark">Nil</td><td class="text-muted">-</td><td class="text-muted">Nil</td><td><span class="badge bg-success-subtle text-success rounded-pill px-2.5 py-1"><i class="bi bi-check-circle me-1"></i> Normal</span></td></tr>
                `;
            }
        }

    </script>
</body>
</html>
