<?php
// api/get-ads.php
// Example API to load approved ads on home/property/vehicle pages

require_once __DIR__ . "/../includes/db.php";

$listingGroup = $_GET["group"] ?? "property";

$stmt = $conn->prepare("
    SELECT
        ads.*,
        users.name AS user_name,
        users.profile_image AS user_image,
        categories.name AS category_name,
        sub_categories.name AS sub_category_name,
        locations.district,
        locations.city,
        media.media_url AS main_image
    FROM ads
    JOIN users ON users.id = ads.user_id
    JOIN categories ON categories.id = ads.category_id
    LEFT JOIN sub_categories ON sub_categories.id = ads.sub_category_id
    LEFT JOIN locations ON locations.id = ads.location_id
    LEFT JOIN listing_media media
        ON media.ad_id = ads.id AND media.is_main = 1
    WHERE ads.status = 'approved'
      AND ads.listing_group = ?
    ORDER BY ads.created_at DESC
    LIMIT 30
");
$stmt->execute([$listingGroup]);

echo json_encode([
    "success" => true,
    "ads" => $stmt->fetchAll()
]);
?>
