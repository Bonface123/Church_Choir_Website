<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audio"])) {
    $audioName = basename($_FILES["audio"]["name"]);
    $targetDir = "music/";
    $targetFile = $targetDir . time() . "_" . $audioName;
    
    if (move_uploaded_file($_FILES["audio"]["tmp_name"], $targetFile)) {
        $title = htmlspecialchars($_POST["title"]);
        $stmt = $conn->prepare("INSERT INTO music (title, audio_url) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $targetFile);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Song uploaded successfully!'); window.location.href='music.php';</script>";
    } else {
        echo "<script>alert('Failed to upload song.'); window.location.href='music.php';</script>";
    }
}
?>
