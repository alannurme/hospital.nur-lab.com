<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nur Lab Hospital SaaS - Next-Gen Cloud Hospital Management System</title>
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
            --primary-gradient: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            --hero-bg: #0f172a;
        }

        body {
            font-family: var(--bs-body-font-family);
            color: #1e293b;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* Glassmorphism Navbar */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Section */
        .hero-section {
            background: radial-gradient(circle at 50% 0%, #1e293b 0%, #0f172a 100%);
            color: #ffffff;
            padding: 100px 0 120px;
            position: relative;
        }

        .hero-badge {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: #38bdf8;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .gradient-text {
            background: linear-gradient(135deg, #38bdf8 0%, #60a5fa 50%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Feature Cards */
        .feature-card {
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem 2rem;
            background: #ffffff;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: #38bdf8;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        /* Pricing Section */
        .pricing-card {
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem 2rem;
            background: #ffffff;
            transition: all 0.3s ease;
            position: relative;
        }

        .pricing-card.featured {
            border: 2px solid #0284c7;
            background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 100%);
            box-shadow: 0 20px 40px rgba(2, 132, 199, 0.1);
        }

        .pricing-card:hover {
            transform: translateY(-6px);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 32px;
            padding: 80px 40px;
            color: #ffffff;
        }

        footer {
            background: #0f172a;
            color: #94a3b8;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fs-4" href="<?= base_url() ?>">
                <i class="bi bi-hospital text-primary fs-3"></i>
                <span>NUR LAB SAAS</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item"><a class="nav-link text-white" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#solutions">Solutions</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#pricing">Pricing</a></li>
                </ul>
                <div class="ms-lg-4 mt-3 mt-lg-0 d-flex gap-2">
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                    </a>
                    <a href="<?= base_url('register-hospital') ?>" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                        Register Hospital <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container pt-5">
            <div class="hero-badge mb-4">
                <i class="bi bi-stars"></i> Next-Generation Multi-Tenant Healthcare Cloud
            </div>
            
            <h1 class="display-3 fw-extrabold mb-4 px-lg-5">
                Empower Your Hospital with <br>
                <span class="gradient-text">Smart SaaS Management</span>
            </h1>

            <p class="lead text-slate-300 mb-5 max-w-2xl mx-auto text-light opacity-75" style="max-width: 750px;">
                Complete multi-tenant solution for hospitals, clinics, and diagnostic centers. Streamline patient records, doctor scheduling, appointment booking, and billing seamlessly.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5">
                <a href="<?= base_url('register-hospital') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                    Start Free 14-Day Trial <i class="bi bi-rocket-takeoff ms-2"></i>
                </a>
                <a href="<?= base_url('login') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold">
                    Demo Hospital Login <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <!-- Stats Bar -->
            <div class="row g-4 justify-content-center mt-4">
                <div class="col-6 col-md-3">
                    <h2 class="fw-extrabold text-white mb-0">99.9%</h2>
                    <small class="text-muted text-uppercase fw-semibold">Uptime SLA</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-extrabold text-white mb-0">100%</h2>
                    <small class="text-muted text-uppercase fw-semibold">Tenant Data Isolation</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-extrabold text-white mb-0">50,000+</h2>
                    <small class="text-muted text-uppercase fw-semibold">Patients Managed</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-extrabold text-white mb-0">24 / 7</h2>
                    <small class="text-muted text-uppercase fw-semibold">Dedicated Support</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Powerful Features</span>
                <h2 class="fw-extrabold text-dark display-5 mt-2">Everything Your Hospital Needs</h2>
                <p class="text-muted">Built for modern healthcare administrators, doctors, and receptionists.</p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-primary-subtle text-primary">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Multi-Tenant Isolation</h4>
                        <p class="text-muted mb-0">Each hospital runs in complete data isolation with encrypted `tenant_id` scope protection.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-info-subtle text-info">
                            <i class="bi bi-person-wheelchair"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Patient EMR Records</h4>
                        <p class="text-muted mb-0">Digital patient registration, medical history, age, gender, blood group, and instant search.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-success-subtle text-success">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Doctor & Schedule Management</h4>
                        <p class="text-muted mb-0">Manage doctor profiles, departments, consultation fees, and weekly duty shifts.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-warning-subtle text-warning">
                            <i class="bi bi-calendar2-check"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Appointment Booking</h4>
                        <p class="text-muted mb-0">Seamless appointment scheduling with real-time consultation fee calculation and status updates.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-danger-subtle text-danger">
                            <i class="bi bi-journal-medical"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Lab Reports & Diagnostics</h4>
                        <p class="text-muted mb-0">Generate digital pathology & diagnostic lab reports linked directly to patient IDs.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon bg-purple-subtle text-purple" style="background:#f3e8ff; color:#9333ea;">
                            <i class="bi bi-sliders"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Super Admin Control</h4>
                        <p class="text-muted mb-0">Central SaaS control center to monitor hospital subscriptions, toggle tenants, and view revenue analytics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="text-primary fw-bold text-uppercase tracking-wider">Flexible Pricing</span>
                <h2 class="fw-extrabold text-dark display-5 mt-2">Transparent Subscription Plans</h2>
                <p class="text-muted">Choose the plan that best fits your medical organization's size.</p>
            </div>

            <div class="row g-4 align-items-center justify-content-center">
                <!-- Standard Plan -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pricing-card">
                        <h4 class="fw-bold text-dark mb-2">Standard Plan</h4>
                        <p class="text-muted small">Ideal for small clinics & diagnostic labs</p>
                        <div class="my-4">
                            <span class="display-5 fw-extrabold text-dark">৳ 4,999</span>
                            <span class="text-muted">/ month</span>
                        </div>
                        <ul class="list-unstyled mb-4 gap-3 d-flex flex-column text-secondary small">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Up to 500 Patients</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Up to 10 Doctors</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Unlimited Appointments</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Basic Lab Reports</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Email Support</li>
                        </ul>
                        <a href="<?= base_url('register-hospital') ?>" class="btn btn-outline-primary rounded-pill w-100 py-2.5 fw-bold">Select Standard</a>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="pricing-card featured">
                        <span class="badge bg-primary rounded-pill px-3 py-2 position-absolute top-0 end-0 m-3 fw-semibold">MOST POPULAR</span>
                        <h4 class="fw-bold text-dark mb-2">Premium Plan</h4>
                        <p class="text-muted small">Best for general & specialized hospitals</p>
                        <div class="my-4">
                            <span class="display-5 fw-extrabold text-primary">৳ 9,999</span>
                            <span class="text-muted">/ month</span>
                        </div>
                        <ul class="list-unstyled mb-4 gap-3 d-flex flex-column text-secondary small">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Unlimited Patients</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Unlimited Doctors</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Advanced Appointment Scheduling</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Full Lab & Billing Suite</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> 24/7 Priority Support</li>
                        </ul>
                        <a href="<?= base_url('register-hospital') ?>" class="btn btn-primary rounded-pill w-100 py-2.5 fw-bold shadow">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <div class="container mb-5">
        <div class="cta-section text-center">
            <h2 class="display-5 fw-extrabold mb-3">Ready to Modernize Your Hospital?</h2>
            <p class="lead opacity-75 mb-4 mx-auto" style="max-width: 600px;">
                Register your hospital in 2 minutes and experience the future of cloud healthcare management.
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="<?= base_url('register-hospital') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                    Register Hospital Tenant <i class="bi bi-building-add ms-2"></i>
                </a>
                <a href="<?= base_url('login') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold">
                    Login to Dashboard <i class="bi bi-box-arrow-in-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container text-center">
            <a class="navbar-brand d-inline-flex align-items-center gap-2 fs-4 mb-3" href="<?= base_url() ?>">
                <i class="bi bi-hospital text-primary fs-3"></i>
                <span>NUR LAB SAAS</span>
            </a>
            <p class="mb-2 text-muted small">&copy; <?= date('Y') ?> Nur Lab Multi-Tenant SaaS Hospital Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
