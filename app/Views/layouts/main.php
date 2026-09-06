<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Hospital SaaS Platform</title>
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
            --primary-gradient: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            --accent-gradient: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 500;
            color: #94a3b8 !important;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
        }

        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        footer {
            margin-top: auto;
            background: #0f172a;
            color: #64748b;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fs-4" href="<?= base_url('dashboard') ?>">
                <i class="bi bi-hospital text-primary fs-3"></i>
                <span><?= session()->get('tenant_name') ?? 'HOSPITAL SAAS' ?></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-1">
                    <?php if (session()->get('user_role') === 'superadmin'): ?>
                        <li class="nav-item">
                            <a class="nav-link text-warning fw-bold" href="<?= base_url('superadmin') ?>">
                                <i class="bi bi-shield-lock me-1"></i> Super Admin
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('patients') ?>"><i class="bi bi-people me-1"></i> Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('doctors') ?>"><i class="bi bi-person-badge me-1"></i> Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('appointments') ?>"><i class="bi bi-calendar-event me-1"></i> Appointments</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-2">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-light rounded-pill px-3 py-1 dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> <?= session()->get('user_name') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><span class="dropdown-item-text text-muted small">Role: <?= session()->get('user_role') ?></span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" class="btn btn-outline-light rounded-pill px-3">Login</a>
                        <a href="<?= base_url('register-hospital') ?>" class="btn btn-primary rounded-pill px-3">Register Hospital</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
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
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container text-center">
            <p class="mb-0 text-secondary">&copy; <?= date('Y') ?> Multi-Tenant SaaS Hospital Management System. Built with CodeIgniter 4 & Bootstrap 5.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
