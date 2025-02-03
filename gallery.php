<?php include 'includes/header.php'; ?>
<main>
    <section id="gallery">
        <div class="container">
            <h2>Our Gallery</h2>
            <p>Explore our choir performances, outreach programs, and special events.</p>

            <!-- Upload Section (Only for Admins) -->
            <?php if (isset($_SESSION['admin'])): ?>
                <div class="upload-form">
                    <h3>Upload a New Image</h3>
                    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image" required>
                        <input type="text" name="caption" placeholder="Image Caption" required>
                        <button type="submit" class="btn">Upload</button>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Gallery Images -->
            <div class="gallery-container" id="gallery-images">
                <!-- Images will be loaded dynamically using AJAX -->
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
