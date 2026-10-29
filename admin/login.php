<?php
/**
 * AuraDent Admin Login Portal
 */

require_once __DIR__ . '/../includes/functions.php';

$error = '';

if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_user_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_full_name'] = $admin['full_name'];
            $_SESSION['admin_role'] = $admin['role'];

            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid administrative credentials. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sign In | AuraDent Dental Portal</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: radial-gradient(circle at 50% 10%, #0b1528, #070e1b);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }
    .login-box {
      background: #ffffff;
      border-radius: 20px;
      padding: 3rem 2.5rem;
      width: 100%;
      max-width: 440px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
    }
    @media (max-width: 480px) {
      body {
        padding: 1rem;
      }
      .login-box {
        padding: 2rem 1.4rem;
        border-radius: 16px;
      }
      .form-control {
        font-size: 1rem; /* 16px prevents iOS browser auto-zoom */
      }
    }
  </style>
</head>
<body>

  <div class="login-box">
    <!-- Header -->
    <div style="text-align: center; margin-bottom: 2rem;">
      <div style="width: 52px; height: 52px; background: linear-gradient(135deg, var(--color-obsidian), #1e293b); border: 1px solid rgba(197, 160, 89, 0.4); border-radius: 14px; display: inline-flex; align-items: center; justify-content: center; color: var(--color-gold); font-size: 1.6rem; margin-bottom: 1rem; box-shadow: var(--shadow-md);">
        💎
      </div>
      <h1 style="font-size: 1.7rem; font-weight: 800; color: #080c14; margin-bottom: 0.35rem;">Staff & Admin Portal</h1>
      <p style="font-size: 0.9rem; color: #64748b;">Aura Dental Atelier & Implant Institute</p>
    </div>

    <!-- Quick Demo Credentials Box -->
    <div style="background: #fdfbf7; border: 1px solid rgba(197, 160, 89, 0.35); border-radius: 12px; padding: 1rem; margin-bottom: 1.75rem; font-size: 0.85rem; color: #785a20;">
      <div style="font-weight: 700; margin-bottom: 0.25rem;">🔑 Demo Access Credentials:</div>
      <div>Username: <code>admin</code> | Password: <code>admin123</code></div>
      <button type="button" id="fillDemoBtn" style="background: none; border: none; color: #b38b38; font-weight: 700; cursor: pointer; padding: 0.25rem 0 0 0; text-decoration: underline;">
        Click to Auto-Fill Credentials
      </button>
    </div>

    <!-- Error Alert -->
    <?php if (!empty($error)): ?>
      <div style="background: #fee2e2; border: 1px solid #f87171; color: #b91c1c; padding: 0.85rem; border-radius: 8px; font-size: 0.88rem; font-weight: 600; margin-bottom: 1.5rem;">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" action="login.php">
      <div class="form-group">
        <label class="form-label" for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="admin" required autofocus>
      </div>

      <div class="form-group" style="margin-bottom: 1.75rem;">
        <label class="form-label" for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn btn-gold btn-lg" style="width: 100%;">
        Sign In to Portal &rarr;
      </button>
    </form>

    <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">
      <a href="<?= getPublicSiteUrl() ?>" style="color: #64748b; font-size: 0.88rem; text-decoration: none; font-weight: 600;">
        &larr; Return to Patient Website
      </a>
    </div>
  </div>

  <script>
    document.getElementById('fillDemoBtn').addEventListener('click', () => {
      document.getElementById('username').value = 'admin';
      document.getElementById('password').value = 'admin123';
    });
  </script>

</body>
</html>
