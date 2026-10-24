<?php
include "db.php";

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    exit("Invalid patient ID");
}

$id = (int) $_GET['id'];
$message = "";

$stmt = mysqli_prepare($conn, "SELECT * FROM patients WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$patient = mysqli_fetch_assoc($result);

if (!$patient) {
    exit("Patient not found");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $age = (int) $_POST['age'];
    $gender = $_POST['gender'];
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE patients
         SET name=?, age=?, gender=?, phone=?, address=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param(
        $stmt, "sisssi",
        $name, $age, $gender, $phone, $address, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: patient.php");
        exit;
    } else {
        $message = "Update failed. Please try again.";
    }
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef3f8;
            padding: 20px;
        }

        .form-box {
            max-width: 450px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 11px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background: #087f8c;
            color: white;
            border: none;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Edit Patient Details</h2>

    <p><?php echo e($message); ?></p>

    <form method="POST">
        <label>Patient Name</label>
        <input type="text" name="name"
               value="<?php echo e($patient['name']); ?>"
               required>

        <label>Age</label>
        <input type="number" name="age" min="1" max="120"
               value="<?php echo e($patient['age']); ?>"
               required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="Male"
                <?php if ($patient['gender'] === 'Male') echo 'selected'; ?>>
                Male
            </option>
            <option value="Female"
                <?php if ($patient['gender'] === 'Female') echo 'selected'; ?>>
                Female
            </option>
            <option value="Other"
                <?php if ($patient['gender'] === 'Other') echo 'selected'; ?>>
                Other
            </option>
        </select>

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?php echo e($patient['phone']); ?>"
               required>

        <label>Address</label>
        <textarea name="address" required><?php
            echo e($patient['address']);
        ?></textarea>

        <button type="submit">Update Patient</button>
    </form>

    <a class="back" href="patient.php">Back to Patients</a>
</div>

</body>
</html>