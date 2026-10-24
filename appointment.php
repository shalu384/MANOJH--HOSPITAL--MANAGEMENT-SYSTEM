<?php
include "db.php";

$message = "";

if (isset($_POST['book'])) {

    $patient_name = trim($_POST['patient_name']);
    $doctor_name = trim($_POST['doctor_name']);
    $department = trim($_POST['department']);
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $reason = trim($_POST['reason']);

    if (
        $patient_name != "" &&
        $doctor_name != "" &&
        $department != "" &&
        $appointment_date != "" &&
        $appointment_time != "" &&
        $reason != ""
    ) {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO appointments
            (patient_name, doctor_name, department,
             appointment_date, appointment_time, reason)
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $patient_name,
            $doctor_name,
            $department,
            $appointment_date,
            $appointment_time,
            $reason
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Appointment booked successfully!";
        } else {
            $message = "Appointment booking failed.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Book Appointment</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #eaf2f8;
        }

        .form-box {
            max-width: 500px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px #0002;
        }

        h2 {
            text-align: center;
            color: #07152d;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 22px;
            background: #087f8c;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #065e68;
        }

        .message {
            text-align: center;
            color: #087443;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="form-box">

    <h2>🏥 Book Appointment</h2>

    <p class="message">
        <?php echo htmlspecialchars($message); ?>
    </p>

    <form method="POST" action="">

        <label>Patient Name</label>
        <input type="text" name="patient_name"
               placeholder="Enter patient name" required>

        <label>Doctor Name</label>
        <input type="text" name="doctor_name"
               placeholder="Enter doctor name" required>

        <label>Department</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Neurology">Neurology</option>
            <option value="Pediatrics">Pediatrics</option>
            <option value="Dental">Dental</option>
            <option value="General Medicine">General Medicine</option>
        </select>

        <label>Appointment Date</label>
        <input type="date" name="appointment_date"
               min="<?php echo date('Y-m-d'); ?>" required>

        <label>Appointment Time</label>
        <input type="time" name="appointment_time" required>

        <label>Reason for Visit</label>
        <textarea name="reason" rows="3"
                  placeholder="Enter reason" required></textarea>

        <button type="submit" name="book">
            Book Appointment
        </button>

    </form>

</div>

</body>
</html>