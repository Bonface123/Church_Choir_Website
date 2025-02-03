<?php
include 'includes/config.php';

$query = "SELECT id, title, audio_url FROM music ORDER BY uploaded_at DESC";
$result = $conn->query($query);

$music = [];
while ($row = $result->fetch_assoc()) {
    $music[] = $row;
}

echo json_encode($music);
?>
