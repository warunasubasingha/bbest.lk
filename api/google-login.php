<?php
// api/google-login.php
// This receives Google login user details AFTER Google token verification.
// IMPORTANT: For production, verify the Google ID token on server before saving.
// Frontend should POST: google_id, name, email, picture

require_once __DIR__ . "/../includes/db.php";
session_start();

$data = json_decode(file_get_contents("php://input"), true);

$googleId = trim($data["google_id"] ?? "");
$name = trim($data["name"] ?? "");
$email = trim($data["email"] ?? "");
$picture = trim($data["picture"] ?? "");

if ($googleId === "" || $email === "" || $name === "") {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Missing login data"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE google_id = ? OR email = ? LIMIT 1");
$stmt->execute([$googleId, $email]);
$user = $stmt->fetch();

if ($user) {
    $update = $conn->prepare("
        UPDATE users
        SET google_id = ?, name = ?, profile_image = ?, auth_provider = 'google', last_login_at = NOW()
        WHERE id = ?
    ");
    $update->execute([$googleId, $name, $picture, $user["id"]]);
    $userId = $user["id"];
} else {
    $insert = $conn->prepare("
        INSERT INTO users (google_id, name, email, profile_image, auth_provider, email_verified_at, last_login_at)
        VALUES (?, ?, ?, ?, 'google', NOW(), NOW())
    ");
    $insert->execute([$googleId, $name, $email, $picture]);
    $userId = $conn->lastInsertId();

    $profile = $conn->prepare("
        INSERT INTO user_profiles (user_id, display_name, cover_image)
        VALUES (?, ?, NULL)
    ");
    $profile->execute([$userId, $name]);
}

$_SESSION["user_id"] = $userId;

echo json_encode([
    "success" => true,
    "user_id" => $userId,
    "message" => "Login successful"
]);
?>
