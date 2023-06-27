<link rel="stylesheet" href="../../css/booking.css" />
<section class="main">
<div class="contact-heading">
    <h1>Contact us</h1>
</div>
<section class="contact">
    <section class="contactForm">
        <form action="../controllers/processForm.php" method="post">
            <input type="text" name="user" placeholder="Enter your Full Name" />
            <input type="email" name="email" placeholder="Enter your E-Mail" />
            <textarea name="message" placeholder=""></textarea>

            <select id="contactPurpose" name="contactPurpose">
                <option selected="selected" disabled="disabled" value="Select a type of request">Select a type of request</option>
                <option value="booking">booking</option>
                <option value="shipping">shipping</option>
                <option value="complaint">complaint</option>
                <option value="other">other</option>
            </select>


            <button class="main-btn" type="submit" onclick="return Validate()">Submit</button>
        </form>



        <label class="GDPR">
            <input type="checkbox" id="terms" required name="terms">accept the Terms and Conditions</input>
        </label>
    </section>
    <section class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.5084119858734!2d14.435802815717867!3d50.07676737942548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b954769415fc1%3A0xe7a247c5b667dd56!2sCryptocrew.cz!5e0!3m2!1scs!2scz!4v1679852472876!5m2!1scs!2scz" width="100%" height="70%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <p>phone number: + 420 728 000 000</p>
        <a href="mailto:zii1324%40email.cz">email: zii324&#064;email.cz</a>
        <p>Adress: Římská 1287/41, 120 00 Vinohrady</p>

    </section>



</section>
</section>