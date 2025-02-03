<?php include 'includes/header.php'; ?>
<main>
    <section id="donate">
        <div class="container">
            <h2>Support Crown Misters</h2>
            <p>Your generous donation helps us spread God's word through music, missions, and outreach.</p>

            <!-- Donation Form -->
            <div class="donation-form">
                <h3>Make a Donation</h3>
                <form action="process_donation.php" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="number" name="amount" placeholder="Donation Amount (KSh)" required>
                    
                    <label for="payment-method">Choose Payment Method:</label>
                    <select name="payment_method" id="payment-method" required>
                        <option value="mpesa">M-Pesa</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank">Bank Transfer</option>
                        <option value="card">Credit/Debit Card</option>
                    </select>

                    <button type="submit" class="btn">Donate Now</button>
                </form>
            </div>

            <!-- Mobile Money Instructions -->
            <div class="mpesa-instructions">
                <h3>How to Donate via M-Pesa</h3>
                <ol>
                    <li>Go to your **M-Pesa** menu.</li>
                    <li>Select **Lipa na M-Pesa**.</li>
                    <li>Choose **Paybill** and enter **Business Number: 123456**.</li>
                    <li>Enter **Account Name: CrownMisters**.</li>
                    <li>Enter the amount you wish to donate.</li>
                    <li>Enter your M-Pesa PIN and confirm the transaction.</li>
                </ol>
                <p><strong>Confirmation:</strong> After payment, please email us your transaction details at <a href="mailto:crownmisterschoir@gmail.com">crownmisterschoir@gmail.com</a>.</p>
            </div>

            <!-- QR Code Option -->
            <div class="qr-code">
                <h3>Scan to Donate</h3>
                <img src="images/qr-code.png" alt="QR Code for Donations">
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
