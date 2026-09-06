<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital SaaS Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 440px;
        }
    </style>
</head>
<body>
    <div class="login-card p-4 p-sm-5">
        <div class="text-center mb-4">
            <div class="bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-hospital fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">Welcome Back</h3>
            <p class="text-muted small">Sign in to your Hospital Management Account</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger rounded-3 small p-2 mb-3">
                <i class="bi bi-exclamation-circle me-1"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success rounded-3 small p-2 mb-3">
                <i class="bi bi-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST">
            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                    <input type="email" name="email" class="form-control bg-light border-start-0" placeholder="admin@nurlab.com" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                    <input type="password" name="password" class="form-control bg-light border-start-0" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-pill fw-bold shadow-sm mb-3">
                Sign In <i class="bi bi-arrow-right ms-1"></i>
            </button>

            <div class="text-center">
                <small class="text-muted">Want to register your hospital?</small>
                <a href="<?= base_url('register-hospital') ?>" class="small fw-semibold text-primary d-block mt-1">
                    Register New Hospital Tenant <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </form>

        <div class="mt-4 pt-3 border-top text-center">
            <small class="text-muted d-block mb-1">Demo Credentials:</small>
            <div class="bg-light p-2 rounded-3 text-start small">
                <div><strong>SuperAdmin:</strong> admin@saas.com / admin123</div>
                <div><strong>Hospital Admin:</strong> admin@nurlab.com / hospital123</div>
            </div>
        </div>
    </div>
</body>
</html>
