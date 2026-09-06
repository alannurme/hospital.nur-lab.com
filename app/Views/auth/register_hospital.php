<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Hospital - Hospital SaaS Platform</title>
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
            padding: 20px 0;
        }
        .register-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="register-card p-4 p-sm-5">
        <div class="text-center mb-4">
            <div class="bg-success-subtle text-success d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-building-add fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">Register Your Hospital</h3>
            <p class="text-muted small">Start your 14-day free trial on our Multi-Tenant SaaS Platform</p>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger rounded-3 small p-2 mb-3">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <li><?= $err ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('register-hospital') ?>" method="POST">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Hospital Name *</label>
                    <input type="text" name="hospital_name" class="form-control bg-light" placeholder="e.g. City Care Hospital" required value="<?= old('hospital_name') ?>">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Admin Full Name *</label>
                    <input type="text" name="admin_name" class="form-control bg-light" placeholder="e.g. Dr. Al-Amin" required value="<?= old('admin_name') ?>">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Official Email *</label>
                    <input type="email" name="email" class="form-control bg-light" placeholder="admin@citycare.com" required value="<?= old('email') ?>">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Phone Number *</label>
                    <input type="text" name="phone" class="form-control bg-light" placeholder="01700000000" required value="<?= old('phone') ?>">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Password *</label>
                    <input type="password" name="password" class="form-control bg-light" placeholder="••••••••" required>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold small text-secondary">Subscription Plan</label>
                    <select name="package" class="form-select bg-light">
                        <option value="standard">Standard Plan (Up to 500 Patients)</option>
                        <option value="premium">Premium Plan (Unlimited)</option>
                        <option value="enterprise">Enterprise Custom</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold small text-secondary">Hospital Address</label>
                    <textarea name="address" class="form-control bg-light" rows="2" placeholder="Full address..."><?= old('address') ?></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 py-2.5 rounded-pill fw-bold shadow-sm mt-4 mb-3">
                <i class="bi bi-check-circle me-1"></i> Complete Registration
            </button>

            <div class="text-center">
                <small class="text-muted">Already registered?</small>
                <a href="<?= base_url('login') ?>" class="small fw-semibold text-primary">Sign in here</a>
            </div>
        </form>
    </div>
</body>
</html>
