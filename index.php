<?php include 'includes/header.php'; ?>
<main>
    <!-- Hero Section with Background Video -->
    <section class="hero">
        <video autoplay muted loop id="hero-video">
            <source src="videos/choir-bg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay">
            <h1>Welcome to Crown Misters</h1>
            <p>Sing to the Lord a new song! - Psalm 96:1</p>
            <a href="join.php" class="btn">Join Our Choir</a>
            <a href="https://www.youtube.com/channel/yourchannel" class="btn btn-alt" target="_blank">Watch on YouTube</a>
        </div>
    </section>

    <!-- About Us -->
    <section id="about">
        <div class="container">
            <h2>About Crown Misters</h2>
            <p>Crown Misters is a Gusii-origin-based choir, formed in 2018, dedicated to spreading God's word through song, missions, and outreach projects. We fellowship at <strong>Nyanchwa Mission Hospital SDA Church</strong> in Kisii Town.</p>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section id="events">
        <h2>Upcoming Events</h2>
        <p>Stay updated on rehearsals and performances:</p>

        <?php
        include 'includes/config.php';

        // Fetch upcoming events using prepared statement
        $events_sql = "SELECT title, event_date, location FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 5";
        $stmt = $conn->prepare($events_sql);
        $stmt->execute();
        $events_result = $stmt->get_result();

        if ($events_result->num_rows > 0):
        ?>
            <ul>
                <?php while ($event = $events_result->fetch_assoc()): ?>
                    <li>
                        <strong><?= htmlspecialchars($event['title']); ?></strong> 
                        - <?= date('F j, Y', strtotime($event['event_date'])); ?> 
                        at <?= htmlspecialchars($event['location']); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No upcoming events at the moment. Stay tuned!</p>
        <?php endif; ?>
    </section>

    <!-- Choir Services -->
    <section id="services">
        <h2>Our Choir Services</h2>
        <p>Join our choir and become part of a family that sings to glorify God.</p>
        <ul>
            <li><strong>Weekly Rehearsals:</strong> Practice every Sunday and Wednesday.</li>
            <li><strong>Performances:</strong> Participate in church services and special events.</li>
            <li><strong>Spiritual Growth:</strong> Sing and learn new hymns while growing spiritually.</li>
        </ul>
    </section>

    <!-- Gallery Section -->
    <section id="gallery">
        <h2>Our Gallery</h2>
        <div class="gallery-container">
            <img src="/assets/images/image.png" alt="Choir Performance">
            <img src="/assets/images/image1.png" alt="Mission Outreach">
            <img src="/assets/images/image2.png" alt="Rehearsal Session">
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials">
        <h2>What People Say About Us</h2>
        <div class="testimonial">
            <p>"Crown Misters has truly uplifted my faith through their music. Their performances are powerful and touching!"</p>
            <span>- Church Member</span>
        </div>
        <div class="testimonial">
            <p>"Being part of this choir has been a blessing. It's more than just music—it's a family!"</p>
            <span>- Choir Member</span>
        </div>
    </section>

    <!-- Videos Section -->
    <section id="videos">
        <h2>Latest Performance</h2>
        <?php
        $youtube_channel_id = "yourchannelID";
        $api_key = "your_youtube_api_key";
        $youtube_url = "https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=$youtube_channel_id&maxResults=1&key=$api_key";
        $youtube_data = file_get_contents($youtube_url);
        $youtube_json = json_decode($youtube_data, true);

        if (!empty($youtube_json['items'][0])) {
            $video_id = $youtube_json['items'][0]['id']['videoId'];
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen></iframe>';
        } else {
            echo "<p>No videos found.</p>";
        }
        ?>
    </section>

    <!-- Call to Action -->
    <section id="join">
        <h2>Join Crown Misters</h2>
        <p>Want to be part of our choir? Reach out to us and join our mission.</p>
        <a href="join.php" class="btn">Join Us Now</a>
    </section>

    <!-- Newsletter Signup -->
    <section id="newsletter">
        <h2>Stay Updated</h2>
        <form action="subscribe.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="btn">Subscribe</button>
        </form>
    </section>

    <!-- Contact -->
    <section id="contact">
        <h2>Contact Us</h2>
        <p><strong>Davis (Director):</strong> +254 111 289 899</p>
        <p><strong>Shallot (Secretary):</strong> +254 727 456 619</p>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
