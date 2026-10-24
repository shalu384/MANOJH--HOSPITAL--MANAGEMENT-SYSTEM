<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"] ?? "Admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Admin Dashboard</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f0f4f8;
}

header {
    background: #07152d;
    color: white;
    padding: 22px;
    text-align: center;
}

.container {
    padding: 25px;
}

.welcome {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    text-align: center;
}

.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.card {
    background: white;
    padding: 25px 15px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 3px 12px #00000012;
}

.card .symbol {
    font-size: 40px;
}

.card h3 {
    color: #07152d;
}

.card a {
    display: inline-block;
    background: #087f8c;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 6px;
}

.card a:hover {
    background: #065d66;
}

.logout {
    background: #dc2626 !important;
}

</style>
</head>

<body>

<header>
    <h1>🏥 MANOJH Hospital Management System</h1>
    <p>Admin Dashboard</p>
</header>

<div class="container">

    <div class="welcome">
        <h2>Welcome TO MANOJH, <?= htmlspecialchars($username) ?>!</h2>
        <p>Manage your hospital activities.</p>
    </div>

    <div class="cards">

        <div class="card">
            <div class="symbol">👤</div>
            <h3>Patient Registration</h3>
            <a href="patient_registration.php">Open</a>
        </div>

        <div class="card">
            <div class="symbol">📅</div>
            <h3>Appointments</h3>
            <a href="appointment.php">Open</a>
        </div>

        <div class="card">
            <div class="symbol">🩺</div>
            <h3>Doctor Schedule</h3>
            <a href="doctor.php">Open</a>
        </div>

        <div class="card">
            <div class="symbol">💊</div>
            <h3>Medicine</h3>
            <a href="medicine.php">Open</a>
        </div>

        <div class="card">
            <div class="symbol">🚪</div>
            <h3>Logout</h3>
            <a href="logout.php" class="logout">Logout</a>
            
        </div>

    </div>

</div>

</body>
</html>