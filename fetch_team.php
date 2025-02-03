<?php
include 'includes/config.php';

$query = "SELECT id, name, role, photo_url FROM team ORDER BY id ASC";
$result = $conn->query($query);

$team = [];
while ($row = $result->fetch_assoc()) {
    $team[] = $row;
}

echo json_encode($team);
?>
