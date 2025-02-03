<?php include 'includes/header.php'; ?>
<main>
    <section id="about">
        <div class="container">
            <h2>About Crown Misters</h2>
            <p>Crown Misters is a Gusii-origin-based choir, formed in 2018, dedicated to spreading God's word through song, missions, and outreach projects. We fellowship at <strong>Nyanchwa Mission Hospital SDA Church</strong> in Kisii Town.</p>
        </div>

        <!-- Mission & Vision -->
        <div class="mission-vision">
            <h3>Our Mission</h3>
            <p>To spread the Gospel through uplifting music, touching lives, and bringing people closer to God.</p>

            <h3>Our Vision</h3>
            <p>To become a leading gospel choir that inspires faith through music, both locally and globally.</p>
        </div>

        <!-- Meet the Team (Dynamic from Database) -->
        <section id="team">
            <h3>Meet Our Choir Leaders</h3>
            <div class="team-container" id="team-members">
                <!-- Team members will be loaded here using AJAX -->
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials">
            <h3>What People Say</h3>
            <div class="testimonial">
                <p>"Crown Misters has truly uplifted my faith through their music. Their performances are powerful and touching!"</p>
                <span>- Church Member</span>
            </div>
            <div class="testimonial">
                <p>"Being part of this choir has been a blessing. It's more than just music—it's a family!"</p>
                <span>- Choir Member</span>
            </div>
        </section>

        <!-- Admin Section: Add Team Members -->
        <?php if (isset($_SESSION['admin'])): ?>
            <div class="upload-form">
                <h3>Add a Team Member</h3>
                <form action="upload_team.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Member Name" required>
                    <input type="text" name="role" placeholder="Role (e.g., Director, Secretary)" required>
                    <input type="file" name="photo" accept="image/*" required>
                    <button type="submit" class="btn">Add Member</button>
                </form>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
