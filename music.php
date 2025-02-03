<?php include 'includes/header.php'; ?>
<main>
    <section id="music">
        <div class="container">
            <h2>Our Music</h2>
            <p>Listen to and download our gospel songs. Be blessed!</p>

            <!-- Upload Section (Only for Admins) -->
            <?php if (isset($_SESSION['admin'])): ?>
                <div class="upload-form">
                    <h3>Upload a New Song</h3>
                    <form action="upload_music.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="audio" accept="audio/*" required>
                        <input type="text" name="title" placeholder="Song Title" required>
                        <button type="submit" class="btn">Upload</button>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Audio Player -->
            <div class="music-list" id="music-tracks">
                <!-- Songs will be loaded dynamically using AJAX -->
            </div>

            <!-- Video Section -->
            <div class="videos">
                <h3>Watch Our Performances</h3>
                <div id="youtube-videos">
                    <!-- YouTube videos will be loaded here -->
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
