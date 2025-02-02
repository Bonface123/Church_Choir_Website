<?php include 'includes/header.php'; ?>
<?php include 'includes/config.php'; ?>

<main>
    <h1>Choir Members</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Joined Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM members ORDER BY joined_date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['joined_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No members yet.</td></tr>";
        }
        ?>
    </table>
</main>

<?php include 'includes/footer.php'; ?>
