<?php include 'includes/header.php'; ?>
<?php include 'includes/config.php'; ?>

<main>
    <h1>Upcoming Events</h1>
    <ul>
        <?php
        $sql = "SELECT title, event_date, location FROM events ORDER BY event_date ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>{$row['title']}</strong> - {$row['event_date']} at {$row['location']}</li>";
            }
        } else {
            echo "<li>No upcoming events.</li>";
        }
        ?>
    </ul>
</main>

<?php include 'includes/footer.php'; ?>
