<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $name = htmlspecialchars($_POST["name"]);
    $role = htmlspecialchars($_POST["role"]);
    $photoName = basename($_FILES["photo"]["name"]);
    $targetDir = "images/team/";
    $targetFile = $targetDir . time() . "_" . $photoName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO team (name, role, photo_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $role, $targetFile);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Team member added successfully!'); window.location.href='about.php';</script>";
    } else {
        echo "<script>alert('Failed to upload image.'); window.location.href='about.php';</script>";
    }
}
?>
