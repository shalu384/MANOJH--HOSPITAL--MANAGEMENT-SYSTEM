<?php
include "db.php";

$message = "";

if (isset($_POST['save'])) {

    $doctor_name = trim($_POST['doctor_name']);
    $department = trim($_POST['department']);
    $available_date = $_POST['available_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];

    if ($start_time >= $end_time) {
        $message = "End time must be after start time!";
    } else {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO doctor_schedule
            (doctor_name, department, available_date,
             start_time, end_time, status)
            VALUES (?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param(
            $stmt, "ssssss",
            $doctor_name, $department, $available_date,
            $start_time, $end_time, $status
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Doctor schedule saved successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM doctor_schedule
     ORDER BY available_date DESC, start_time ASC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Schedule</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 25px;
    font-family: Arial, sans-serif;
    background: #eef3f8;
    color: #17243b;
}

.container {
    max-width: 1100px;
    margin: auto;
}

h1 {
    background: #07152d;
    color: white;
    padding: 22px;
    text-align: center;
    border-radius: 12px;
}

.form-box, .table-box {
    background: white;
    padding: 22px;
    margin-top: 22px;
    border-radius: 12px;
    box-shadow: 0 3px 12px #00000012;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

label {
    display: block;
    margin-bottom: 7px;
    font-weight: bold;
}

input, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
}

button {
    background: #087f8c;
    color: white;
    border: none;
    padding: 13px 24px;
    margin-top: 18px;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #05636d;
}

.message {
    padding: 12px;
    background: #e0f2fe;
    border-radius: 6px;
    margin-top: 15px;
}

.table-wrap {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
    white-space: nowrap;
}

th {
    background: #07152d;
    color: white;
}

@media (max-width: 600px) {
    body {
        padding: 10px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="container">

<h1>🏥 Doctor Schedule</h1>

<div class="form-box">
    <h2>Add Doctor Schedule</h2>

    <?php if ($message != "") { ?>
        <div class="message">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php } ?>

    <form method="POST">
        <div class="form-grid">

            <div>
                <label>Doctor Name</label>
                <input type="text" name="doctor_name"
                       placeholder="Enter doctor name" required>
            </div>

            <div>
                <label>Department</label>
                <select name="department" required>
                    <option value="">Select Department</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="General Medicine">General Medicine</option>
                    <option value="Dental">Dental</option>
                </select>
            </div>

            <div>
                <label>Available Date</label>
                <input type="date" name="available_date"
                       min="<?= date('Y-m-d') ?>" required>
            </div>

            <div>
                <label>Start Time</label>
                <input type="time" name="start_time" required>
            </div>

            <div>
                <label>End Time</label>
                <input type="time" name="end_time" required>
            </div>

            <div>
                <label>Status</label>
                <select name="status" required>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
            </div>

        </div>

        <button type="submit" name="save">
            Save Schedule
        </button>
    </form>
</div>

<div class="table-box">
    <h2>Doctor Schedule List</h2>

    <div class="table-wrap">
    <table>
        <tr>
            <th>ID</th>
            <th>Doctor Name</th>
            <th>Department</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
        </tr>

        <?php if ($result && mysqli_num_rows($result) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['doctor_name']) ?></td>
                    <td><?= htmlspecialchars($row['department']) ?></td>
                    <td><?= htmlspecialchars($row['available_date']) ?></td>
                    <td><?= htmlspecialchars($row['start_time']) ?></td>
                    <td><?= htmlspecialchars($row['end_time']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                </tr>
            <?php } ?>

        <?php } else { ?>
            <tr>
                <td colspan="7">No schedules found.</td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>

</div>
</body>
</html>