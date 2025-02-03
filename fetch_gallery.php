<?php
include 'includes/config.php';

$query = "SELECT id, image_url, caption FROM gallery ORDER BY uploaded_at DESC";
$result = $conn->query($query);

$images = [];
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}

echo json_encode($images);
?>
