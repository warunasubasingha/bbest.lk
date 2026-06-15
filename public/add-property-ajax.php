<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$title = trim($_POST['title'] ?? '');
$propertyType = trim($_POST['property_type'] ?? '');
$purpose = trim($_POST['purpose'] ?? '');
$district = trim($_POST['district'] ?? '');
$city = trim($_POST['city'] ?? '');
$currency = trim($_POST['currency'] ?? 'LKR');
$price = trim($_POST['price'] ?? '');
$priceUnit = trim($_POST['price_unit'] ?? '');
$perch = trim($_POST['perch'] ?? '');
$bedrooms = trim($_POST['bedrooms'] ?? '');
$bathrooms = trim($_POST['bathrooms'] ?? '');
$description = trim($_POST['description'] ?? '');

if ($title === '' || $propertyType === '' || $purpose === '' || $district === '' || $city === '' || $price === '') {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
    exit;
}

$imageName = null;
if (!empty($_FILES['main_image']['name']) && is_uploaded_file($_FILES['main_image']['tmp_name'])) {
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed, true)) {
        echo json_encode(['success' => false, 'message' => 'Only JPG, PNG, and WEBP images are allowed.']);
        exit;
    }

    $uploadDir = __DIR__ . '/uploads/properties/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $imageName = 'property_' . time() . '_' . mt_rand(1000, 9999) . '.' . $ext;
    $targetPath = $uploadDir . $imageName;

    if (!move_uploaded_file($_FILES['main_image']['tmp_name'], $targetPath)) {
        echo json_encode(['success' => false, 'message' => 'Image upload failed.']);
        exit;
    }
}

/*
  DATABASE SAVE:
  Your table/column names are not included in the uploaded files, so add your INSERT here.

  Example only:

  require_once __DIR__ . '/../includes/db.php';
  $stmt = $pdo->prepare("INSERT INTO properties
    (title, property_type, purpose, district, city, currency, price, price_unit, perch, bedrooms, bathrooms, description, main_image, created_at)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
  $stmt->execute([$title, $propertyType, $purpose, $district, $city, $currency, $price, $priceUnit, $perch, $bedrooms, $bathrooms, $description, $imageName]);
*/

echo json_encode([
    'success' => true,
    'message' => 'Property submitted successfully.',
    'data' => [
        'title' => $title,
        'property_type' => $propertyType,
        'purpose' => $purpose,
        'city' => $city,
        'district' => $district,
        'image' => $imageName
    ]
]);
