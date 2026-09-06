<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Super Admin Control Center</title>
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
            --sidebar-text-active: #0284c7;
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
        }

        /* Clean Light Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            z-index: 1040;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        /* Top User Profile Widget */
        .sidebar-user-widget {
            padding: 1.25rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            cursor: pointer;
            transition: background 0.2s ease;
            background: #f8fafc;
        }
        .sidebar-user-widget:hover {
            background: #f1f5f9;
        }

        .user-avatar-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9 0%, #6366f1 100%);
            color: #ffffff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Search Input */
        .sidebar-search-box {
            padding: 1rem;
        }
        .sidebar-search-input {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #0f172a;
            border-radius: 10px;
            padding: 0.55rem 0.75rem 0.55rem 2.25rem;
            font-size: 0.875rem;
            width: 100%;
        }
        .sidebar-search-input:focus {
            background: #ffffff;
            border-color: #0ea5e9;
            color: #0f172a;
            box-shadow: none;
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
            font-size: 0.9rem;
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
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #94a3b8;
            padding: 0.75rem 0.75rem 0.25rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.65rem 0.85rem;
            color: #475569;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            margin-bottom: 0.2rem;
            cursor: pointer;
        }

        .nav-link-custom:hover {
            background: var(--sidebar-item-hover);
            color: #0f172a;
        }

        .nav-link-custom.active {
            background: #eff6ff;
            color: var(--sidebar-text-active);
            font-weight: 700;
        }

        /* Sub-menu items */
        .sub-menu {
            padding-left: 1.25rem;
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
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sub-link-custom:hover, .sub-link-custom.active {
            color: #0ea5e9;
            background: #f1f5f9;
        }

        /* Footer Collapse Button */
        .sidebar-bottom-toggle {
            padding: 0.75rem;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s ease;
            background: #f8fafc;
        }
        .sidebar-bottom-toggle:hover {
            color: #0f172a;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #f8fafc;
        }

        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1030;
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
            border-color: #0ea5e9;
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
                    <?= strtoupper(substr(session()->get('user_name') ?? 'SA', 0, 2)) ?>
                </div>
                <div class="overflow-hidden">
                    <div class="fw-bold text-dark text-truncate" style="font-size: 0.9rem; line-height: 1.3; margin-bottom: 2px;"><?= session()->get('user_name') ?? 'Super Admin' ?></div>
                    <small class="text-muted d-block text-truncate" style="font-size: 0.78rem; line-height: 1.3;">SaaS Control Center</small>
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
            <div class="menu-category-header">Main Overview</div>

            <a href="<?= base_url('superadmin') ?>" class="nav-link-custom <?= current_url() == base_url('superadmin') ? 'active' : '' ?>">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-grid-1x2-fill text-primary"></i>
                    <span>Dashboard</span>
                </div>
            </a>

            <!-- Hospital Tenants Accordion -->
            <div>
                <div class="nav-link-custom <?= strpos(current_url(), 'tenants') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('tenantsMenu', this)">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-buildings-fill text-primary"></i>
                        <span>Hospital Tenants</span>
                    </div>
                    <i class="bi bi-chevron-down small transition-transform"></i>
                </div>
                <div class="sub-menu <?= strpos(current_url(), 'tenants') !== false ? 'show' : '' ?>" id="tenantsMenu">
                    <a href="<?= base_url('superadmin/tenants') ?>" class="sub-link-custom <?= current_url() == base_url('superadmin/tenants') ? 'active' : '' ?>">
                        <i class="bi bi-buildings"></i> All Hospital Tenants
                    </a>
                    <a href="<?= base_url('superadmin/tenants') ?>" class="sub-link-custom">
                        <i class="bi bi-check2-circle text-success"></i> URL & Domain Approvals
                    </a>
                    <a href="<?= base_url('register-hospital') ?>" target="_blank" class="sub-link-custom">
                        <i class="bi bi-plus-lg"></i> Add New Hospital
                    </a>
                </div>
            </div>

            <div class="menu-category-header">Platform Management</div>

            <a href="<?= base_url('superadmin/users') ?>" class="nav-link-custom <?= strpos(current_url(), 'users') !== false ? 'active' : '' ?>">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-people-fill text-info"></i>
                    <span>System Users</span>
                </div>
            </a>

            <a href="<?= base_url('superadmin/plans') ?>" class="nav-link-custom <?= strpos(current_url(), 'plans') !== false ? 'active' : '' ?>">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-credit-card-2-front-fill text-warning"></i>
                    <span>Subscription Plans</span>
                </div>
            </a>

            <a href="<?= base_url('superadmin/analytics') ?>" class="nav-link-custom <?= strpos(current_url(), 'analytics') !== false ? 'active' : '' ?>">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-graph-up-arrow text-success"></i>
                    <span>Revenue Analytics</span>
                </div>
            </a>

            <div class="menu-category-header">System Configuration</div>

            <a href="<?= base_url() ?>" target="_blank" class="nav-link-custom">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-box-arrow-up-right text-muted"></i>
                    <span>View Public SaaS</span>
                </div>
            </a>

            <!-- Settings Accordion -->
            <div>
                <div class="nav-link-custom <?= strpos(current_url(), 'settings') !== false ? 'active' : '' ?>" onclick="toggleSubMenu('superadminSettingsMenu', this)">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-gear-fill text-secondary"></i>
                        <span>Settings</span>
                    </div>
                    <i class="bi bi-chevron-down small transition-transform"></i>
                </div>
                <div class="sub-menu <?= strpos(current_url(), 'settings') !== false ? 'show' : '' ?>" id="superadminSettingsMenu">
                    <a href="<?= base_url('superadmin/settings') ?>" class="sub-link-custom <?= current_url() == base_url('superadmin/settings') ? 'active' : '' ?>">
                        <i class="bi bi-pin-angle"></i> Global Settings
                    </a>
                </div>
            </div>
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
                <div class="fw-bold text-dark fs-5 mb-0">Super Admin Control Center</div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="<?= base_url('register-hospital') ?>" target="_blank" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i> Register New Hospital
                </a>
                <div class="vr my-1"></div>
                <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
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
            &copy; <?= date('Y') ?> SaaS Super Admin Control Panel. Multi-Tenant Healthcare System.
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
