<?php
// ==========================================
// register.php - BBest.lk Registration
// ==========================================

session_start();
require_once __DIR__ . '/../includes/db.php';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$action = $_GET['action'] ?? "";

/* ==========================================
   AJAX / POST API Actions
   ========================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // STEP 1: SEND OTP
    if ($action === "send_otp") {
        $emailPhone = trim($_POST['emailPhone'] ?? '');

        if ($emailPhone === '') {
            echo "Error: Please enter an email address or phone number.";
            exit;
        }

        // Validate basic format (either valid email or numeric phone of 9-12 digits)
        $isEmail = filter_var($emailPhone, FILTER_VALIDATE_EMAIL);
        $isPhone = preg_match('/^\+?[0-9]{9,15}$/', $emailPhone);

        if (!$isEmail && !$isPhone) {
            echo "Error: Invalid email address or phone number format.";
            exit;
        }

        // Check if user already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email_or_phone = ? OR email = ? OR phone = ? LIMIT 1");
        $stmt->execute([$emailPhone, $emailPhone, $emailPhone]);
        if ($stmt->fetch()) {
            echo "Error: This email or phone number is already registered.";
            exit;
        }

        // Generate a 4-digit code
        $otp = rand(1000, 9999);

        $_SESSION['otp'] = $otp;
        $_SESSION['temp_user'] = $emailPhone;
        $_SESSION['otp_verified'] = false; // Reset verification state

        // Mock-sending of OTP: returning it directly in the text response for local simulation/testing
        echo "OTP Sent: $otp";
        exit;
    }

    // STEP 2: VERIFY OTP
    if ($action === "verify_otp") {
        $otpInput = trim($_POST['otp'] ?? '');
        $emailPhone = trim($_POST['emailPhone'] ?? '');

        if (!isset($_SESSION['otp']) || !isset($_SESSION['temp_user'])) {
            echo "Error: Session expired. Please request a new code.";
            exit;
        }

        if ($emailPhone !== $_SESSION['temp_user']) {
            echo "Error: User mismatch. Please restart registration.";
            exit;
        }

        if ($otpInput === (string)$_SESSION['otp']) {
            $_SESSION['otp_verified'] = true;
            echo "OTP Verified";
        } else {
            echo "Error: Invalid verification code. Please try again.";
        }
        exit;
    }

    // STEP 3: FINAL REGISTER
    if ($action === "final_register") {
        $emailPhone = trim($_POST['emailPhone'] ?? '');
        $password = $_POST['password'] ?? '';
        $type = trim($_POST['type'] ?? 'owner');

        if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true || $emailPhone !== $_SESSION['temp_user']) {
            echo "Error: Please verify your phone number or email first.";
            exit;
        }

        if (strlen($password) < 6) {
            echo "Error: Password must be at least 6 characters long.";
            exit;
        }

        // Verify if user already exists again to prevent race condition
        $stmt = $conn->prepare("SELECT id FROM users WHERE email_or_phone = ? OR email = ? OR phone = ? LIMIT 1");
        $stmt->execute([$emailPhone, $emailPhone, $emailPhone]);
        if ($stmt->fetch()) {
            echo "Error: This account is already registered.";
            exit;
        }

        // Determine if it is email or phone
        $isEmail = filter_var($emailPhone, FILTER_VALIDATE_EMAIL);
        $email = $isEmail ? $emailPhone : null;
        $phone = !$isEmail ? $emailPhone : null;

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        try {
            $conn->beginTransaction();

            // Insert core user record
            $stmt = $conn->prepare("
                INSERT INTO users (email, phone, email_or_phone, password_hash, user_type, is_verified, email_verified_at, phone_verified_at, last_login_at) 
                VALUES (?, ?, ?, ?, ?, 1, ?, ?, NOW())
            ");
            
            $emailVerifiedAt = $isEmail ? date('Y-m-d H:i:s') : null;
            $phoneVerifiedAt = !$isEmail ? date('Y-m-d H:i:s') : null;

            $stmt->execute([
                $email, 
                $phone, 
                $emailPhone, 
                $passwordHash, 
                $type, 
                $emailVerifiedAt, 
                $phoneVerifiedAt
            ]);

            $userId = $conn->lastInsertId();

            // Setup Profile
            $displayName = $isEmail ? explode('@', $email)[0] : $phone;
            $stmtProfile = $conn->prepare("
                INSERT INTO user_profiles (user_id, display_name) 
                VALUES (?, ?)
            ");
            $stmtProfile->execute([$userId, $displayName]);

            // Setup Company record if registering as a company
            if ($type === 'company') {
                $stmtCompany = $conn->prepare("
                    INSERT INTO companies (user_id, company_name) 
                    VALUES (?, ?)
                ");
                $stmtCompany->execute([$userId, $displayName . ' Co.']);
            }

            $conn->commit();

            // Auto-login after registration
            $_SESSION['user_id'] = $userId;
            
            // Clean up session registration temp states
            unset($_SESSION['otp']);
            unset($_SESSION['temp_user']);
            unset($_SESSION['otp_verified']);

            echo "Registration Successful";

        } catch (Exception $e) {
            $conn->rollBack();
            echo "Error: Failed to register. " . $e->getMessage();
        }
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - BBest.lk</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Montserrat', sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.register-container {
    width: 100%;
    max-width: 420px;
    padding: 20px;
    box-sizing: border-box;
}
.register-card {
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.06);
}
.register-card h2 {
    text-align: center;
    margin-top: 0;
    margin-bottom: 8px;
    color: #244E73;
}
.register-card p.subtitle {
    text-align: center;
    color: #6d7a88;
    font-size: 14px;
    margin-bottom: 24px;
}
.register-card label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
    font-size: 13px;
}
.register-card input, .register-card select {
    width: 100%;
    padding: 12px;
    margin-bottom: 16px;
    border-radius: 8px;
    border: 1px solid #dcdcdc;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    box-sizing: border-box;
    transition: border 0.3s;
}
.register-card input:focus, .register-card select:focus {
    border-color: #244E73;
    outline: none;
}
.register-card button {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 8px;
    background: #244E73;
    color: #fff;
    font-weight: 700;
    cursor: pointer;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    transition: background 0.3s;
}
.register-card button:hover {
    background: #1b3a56;
}
.error-messages {
    background: #ffebeb;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 16px;
    color: #c00;
    font-size: 13px;
    font-weight: 500;
    display: none;
}
.info-messages {
    background: #e1f5fe;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 16px;
    color: #0288d1;
    font-size: 13px;
    font-weight: 500;
    display: none;
}
.login-link {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}
.login-link a {
    color: #244E73;
    font-weight: 600;
    text-decoration: none;
}
.step-container {
    display: none;
}
.step-active {
    display: block;
}
</style>
</head>
<body>
<div class="register-container">
    <div class="register-card">
        <h2>Register Account</h2>
        <p class="subtitle">Join BBest.lk to list Properties, Vehicles & Services</p>

        <div class="error-messages" id="errorMessage"></div>
        <div class="info-messages" id="infoMessage"></div>

        <!-- STEP 1: Enter Email or Phone -->
        <div id="step-one" class="step-container step-active">
            <label for="emailPhoneField">Email or Phone Number</label>
            <input type="text" id="emailPhoneField" placeholder="e.g. name@example.com or 0771234567">
            <button type="button" onclick="handleSendOTP()">Get Verification Code</button>
        </div>

        <!-- STEP 2: Enter OTP -->
        <div id="step-two" class="step-container">
            <label for="otpField">Verification Code (OTP)</label>
            <input type="text" id="otpField" placeholder="Enter the 4-digit code sent to you">
            <button type="button" onclick="handleVerifyOTP()">Verify Code</button>
        </div>

        <!-- STEP 3: Enter Password & Details -->
        <div id="step-three" class="step-container">
            <label for="passwordField">Password</label>
            <input type="password" id="passwordField" placeholder="Minimum 6 characters">

            <label for="confirmPasswordField">Confirm Password</label>
            <input type="password" id="confirmPasswordField" placeholder="Re-enter password">

            <label for="userTypeField">I am a / an</label>
            <select id="userTypeField">
                <option value="owner">Individual Owner</option>
                <option value="agent">Agent / Broker</option>
                <option value="company">Business Company</option>
            </select>

            <button type="button" onclick="handleFinalRegister()">Register Account</button>
        </div>

        <p class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<script>
// State management
let regEmailPhone = "";

const errorDiv = document.getElementById("errorMessage");
const infoDiv = document.getElementById("infoMessage");

function showError(msg) {
    infoDiv.style.display = "none";
    errorDiv.textContent = msg;
    errorDiv.style.display = "block";
}

function showInfo(msg) {
    errorDiv.style.display = "none";
    infoDiv.textContent = msg;
    infoDiv.style.display = "block";
}

function clearMessages() {
    errorDiv.style.display = "none";
    infoDiv.style.display = "none";
}

// STEP 1: Get Code
function handleSendOTP() {
    const val = document.getElementById("emailPhoneField").value.trim();
    if (!val) {
        showError("Please enter an email address or phone number.");
        return;
    }
    
    clearMessages();
    regEmailPhone = val;

    fetch("register.php?action=send_otp", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "emailPhone=" + encodeURIComponent(val)
    })
    .then(res => res.text())
    .then(data => {
        if (data.startsWith("Error:")) {
            showError(data.replace("Error: ", ""));
        } else {
            showInfo(data); // Display Mock OTP in Info message
            document.getElementById("step-one").classList.remove("step-active");
            document.getElementById("step-two").classList.add("step-active");
        }
    })
    .catch(err => showError("Network error occurred. Please try again."));
}

// STEP 2: Verify Code
function handleVerifyOTP() {
    const otp = document.getElementById("otpField").value.trim();
    if (!otp) {
        showError("Please enter the verification code.");
        return;
    }

    clearMessages();

    fetch("register.php?action=verify_otp", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "emailPhone=" + encodeURIComponent(regEmailPhone) + "&otp=" + encodeURIComponent(otp)
    })
    .then(res => res.text())
    .then(data => {
        if (data.startsWith("Error:")) {
            showError(data.replace("Error: ", ""));
        } else {
            showInfo("Verification successful. Please set your password.");
            document.getElementById("step-two").classList.remove("step-active");
            document.getElementById("step-three").classList.add("step-active");
        }
    })
    .catch(err => showError("Network error occurred."));
}

// STEP 3: Final Register
function handleFinalRegister() {
    const pass = document.getElementById("passwordField").value;
    const cpass = document.getElementById("confirmPasswordField").value;
    const type = document.getElementById("userTypeField").value;

    if (pass.length < 6) {
        showError("Password must be at least 6 characters.");
        return;
    }

    if (pass !== cpass) {
        showError("Passwords do not match.");
        return;
    }

    clearMessages();

    fetch("register.php?action=final_register", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "emailPhone=" + encodeURIComponent(regEmailPhone) + 
              "&password=" + encodeURIComponent(pass) + 
              "&type=" + encodeURIComponent(type)
    })
    .then(res => res.text())
    .then(data => {
        if (data.startsWith("Error:")) {
            showError(data.replace("Error: ", ""));
        } else {
            alert("Registration successful! Redirecting to home page...");
            window.location.href = "index.php";
        }
    })
    .catch(err => showError("Network error occurred."));
}
</script>
</body>
</html>