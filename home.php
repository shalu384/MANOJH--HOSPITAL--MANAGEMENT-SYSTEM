<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manojh Hospital Management System</title>

    <link rel="stylesheet" href="./home.css">
</head>
<body>

<!-- Navigation Bar -->
<header class="navbar">
    <a href="admin.php" class="logo">
        <span class="logo-icon"><img src="logo.jpeg" width=50 height=50></span>
        <span>MANOJH <small>HOSPITAL</small></span>
    </a>

    <nav>
        <a href="index.php" class="active">Home</a>
        <a href="#about">About</a>
        <a href="#departments">Departments</a>
        <a href="#doctors">Doctors</a>
        <a href="#contact">Contact</a>
        <a href="login.php" class="login-btn">Login ↗️</a>
    </nav>
</header>

<!-- Home Banner -->
<section class="hero">
    <div class="hero-content">
        <span class="welcome">WELCOME TO MANOJH HOSPITAL</span>

        <h1>Your Health,<br>
            <span>Our Priority.</span>
        </h1>

        <p>
            Quality healthcare, experienced doctors and
            compassionate care for you and your family.
            Your well-being is our mission.
        </p>

        <div class="hero-buttons">
            <a href="appointment.php" class="primary-btn">
                Book Appointment →
            </a>

            <a href="#about" class="secondary-btn">
                Learn More
            </a>
        </div>

        <div class="hero-features">
            <div>
                <strong>24/7</strong>
                <span>Patient Care</span>
            </div>

            <div>
                <strong>Expert</strong>
                <span>Medical Team</span>
            </div>

            <div>
                <strong>Quality</strong>
                <span>Healthcare</span>
            </div>
        </div>
    </div>

    <div class="hero-visual">
        <div class="medical-circle">
            <div class="medical-cross">✚<i class="fa-light fa-heart"></i></div>
            <div class="medical-text">
                <span>YOUR HEALTH</span>
                <strong>MATTERS TO US</strong>
            </div>
        </div>

        <div class="floating-card">
            <span class="heart-icon">♥️</span>
            <div>
                <strong>Care With Love</strong>
                <small>Your health, our mission</small>
            </div>
        </div>
    </div>
</section>

<!-- Quick Services -->
<section class="quick-services">
    <a href="patient.php" class="service">
        <span class="service-icon">♙</span>
        <div>
            <h3>Patient Registration</h3>
            <p>Register as a patient</p>
        </div>
        <span class="arrow">→</span>
    </a>

    <a href="appointment.php" class="service">
        <span class="service-icon">▦</span>
        <div>
            <h3>Appointments</h3>
            <p>Book your appointment</p>
        </div>
        <span class="arrow">→</span>
    </a>

    <a href="doctor_schedule.php" class="service">
        <span class="service-icon">◷</span>
        <div>
            <h3>Doctor Schedule</h3>
            <p>View available schedules</p>
        </div>
        <span class="arrow">→</span>
    </a>
</section>

<!-- About Section -->
<section class="section about" id="about">
    <div class="section-label">ABOUT OUR HOSPITAL</div>

    <h2>Your Trusted Partner in <span>Healthcare</span></h2>

    <p class="section-description">
        Manojh Hospital is committed to providing quality
        healthcare services in a caring and comfortable
        environment. We put patients first in everything we do.
    </p>

    <a href="#departments" class="text-link">
        Discover Our Services →
    </a>
</section>

<!-- Departments -->
<section class="section departments" id="departments">
    <div class="section-label">OUR MEDICAL SERVICES</div>

    <h2>Our <span>Departments</span></h2>

    <p class="section-description">
        Comprehensive medical services for your health needs.
    </p>

    <div class="department-grid">
        <div class="department-card">
            <div class="department-icon">♡</div>
            <h3>Cardiology</h3>
            <p>Heart health and cardiac care services.</p>
        </div>

        <div class="department-card">
            <div class="department-icon">✚</div>
            <h3>General Medicine</h3>
            <p>Medical consultations and general treatment.</p>
        </div>

        <div class="department-card">
            <div class="department-icon">☻</div>
            <h3>Pediatrics</h3>
            <p>Healthcare for infants and children.</p>
        </div>

        <div class="department-card">
            <div class="department-icon">✿</div>
            <h3>Dental Care</h3>
            <p>Oral health and dental treatment services.</p>
        </div>
    </div>
</section>

<!-- Doctors -->
<section class="section doctors" id="doctors">
    <div class="section-label">OUR MEDICAL TEAM</div>

    <h2>Professional <span>Healthcare</span></h2>

    <p class="section-description">
        Our medical team is dedicated to supporting
        your health and well-being.
    </p>

    <a href="doctor.php" class="primary-btn">
        View Doctor Schedule →
    </a>
</section>

<!-- Contact -->
<section class="contact" id="contact">
    <div>
        <div class="section-label">GET IN TOUCH</div>
        <h2>We're Here to <span>Help You</span></h2>
        <p>For appointments and hospital enquiries, please contact us.</p>
    </div>

    <a href="appointment.php" class="primary-btn">
        Book Appointment →
    </a>
</section>

<!-- Footer -->
<footer>
    <a class="footer-logo">✚ MANOJH HOSPITAL</a>

    <p>Quality Healthcare. Caring Hearts.</p>

    <p class="copyright">
        © 2026 Manojh Hospital Management System.
        All rights reserved.
    </p>
</footer>

</body>
</html