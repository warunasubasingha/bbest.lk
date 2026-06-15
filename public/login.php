<?php
// ============================
// login.php - BBest.lk
// ============================

// Start session and DB connection
session_start();
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/lang.php';

// Redirect if already logged in
if(isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

// Handle POST login
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loginId = trim($_POST['login_id'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if($loginId === '' || $password === ''){
        $errors[] = "Please fill all required fields.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR phone=? LIMIT 1");
        $stmt->execute([$loginId,$loginId]);
        $user = $stmt->fetch();

        if($user && password_verify($password,$user['password_hash'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            $errors[] = "Invalid login credentials.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars(t('login_or_signup')) ?> - BBest.lk</title>
<link rel="stylesheet" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h2><?= htmlspecialchars(t('login_or_signup')) ?></h2>

        <?php if(!empty($errors)): ?>
            <div class="error-messages">
                <?php foreach($errors as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="">
            <label><?= htmlspecialchars(t('enter_email_or_phone')) ?></label>
            <input type="text" name="login_id" placeholder="<?= htmlspecialchars(t('enter_email_or_phone')) ?>" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit"><?= htmlspecialchars(t('login_or_signup')) ?></button>
        </form>

        <p class="divider">OR</p>

        <!-- Google / Phone login buttons -->
        <div class="social-login">
            <button class="google-login-btn" id="googleLoginBtn"><?= htmlspecialchars(t('continue_with_google')) ?></button>
            <button class="phone-login-btn" id="phoneLoginBtn"><?= htmlspecialchars(t('continue_with_phone')) ?></button>
        </div>

        <p class="signup-link">
            <?= htmlspecialchars("Don't have an account?") ?> <a href="register.php"><?= htmlspecialchars(t('signup')) ?></a>
        </p>
    </div>
</div>

<script>
// Placeholder JS for Google / Phone login
document.getElementById('googleLoginBtn').addEventListener('click', ()=>{
    alert('Google login coming soon');
});

document.getElementById('phoneLoginBtn').addEventListener('click', ()=>{
    alert('Phone login coming soon');
});
</script>

<style>
body{font-family:'Montserrat',sans-serif;background:#f4f6f9;margin:0;padding:0;display:flex;justify-content:center;align-items:center;height:100vh;}
.login-container{width:100%;max-width:400px;padding:20px;}
.login-card{background:#fff;padding:30px;border-radius:16px;box-shadow:0 10px 40px rgba(0,0,0,0.1);}
.login-card h2{text-align:center;margin-bottom:20px;}
.login-card form{display:flex;flex-direction:column;gap:12px;}
.login-card input{padding:10px;border-radius:8px;border:1px solid #ccc;}
.login-card button{padding:12px;border:none;border-radius:8px;background:#244E73;color:#fff;font-weight:700;cursor:pointer;}
.divider{text-align:center;margin:10px 0;color:#666;}
.social-login button{width:100%;padding:12px;border-radius:8px;border:1px solid #244E73;background:#fff;color:#244E73;margin-bottom:10px;cursor:pointer;font-weight:600;}
.error-messages{background:#ffebeb;padding:10px;border-radius:8px;margin-bottom:10px;color:#c00;}
.signup-link{text-align:center;margin-top:15px;}
.signup-link a{color:#244E73;font-weight:600;text-decoration:none;}
</style>
</body>
</html>