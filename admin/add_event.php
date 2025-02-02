<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "INSERT INTO events (title, event_date, location, description) 
            VALUES ('$title', '$event_date', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Event added successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Add New Event</h1>
    <form method="POST">
        <label>Event Title:</label>
        <input type="text" name="title" required>

        <label>Event Date:</label>
        <input type="date" name="event_date" required>

        <label>Location:</label>
        <input type="text" name="location" required>

        <label>Description:</label>
        <textarea name="description" rows="4"></textarea>

        <button type="submit">Add Event</button>
    </form>
    <br>
    <a href="../events.php">View Events</a>
</body>
</html>
