<?php include 'includes/header.php'; ?>
<!-- Contact -->
<section id="contact">
    <div class="container">
        <h2>Contact Us</h2>
        
        <!-- Contact Information -->
        <div class="contact-info">
            <p><strong>Davis (Director):</strong> <a href="tel:+254111289899">+254 111 289 899</a></p>
            <p><strong>Shallot (Secretary):</strong> <a href="tel:+254727456619">+254 727 456 619</a></p>
            <p><strong>Email:</strong> <a href="mailto:crownmisterschoir@gmail.com">crownmisterschoir@gmail.com</a></p>
            <p><strong>Follow Us:</strong>  
                <a href="https://facebook.com/yourpage" target="_blank">Facebook</a> |  
                <a href="https://instagram.com/yourpage" target="_blank">Instagram</a> |  
                <a href="https://www.youtube.com/channel/yourchannel" target="_blank">YouTube</a>
            </p>

        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="contact_process.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>

        <!-- Google Map -->
        <div class="map">
            <h3>Find Us</h3>
            <iframe 
                src="https://www.https://www.google.com/maps/search/nyanchwa+Mission+Hospital+SDA+Church+google+maps+location/@-0.6750427,34.7599268,15z?entry=ttu&g_ep=EgoyMDI1MDEyOS4xIKXMDSoASAFQAw%3D%3D" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
