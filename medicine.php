<?php
include "db.php";

$message = "";

if (isset($_POST['save'])) {

    $name = trim($_POST['medicine_name']);
    $category = trim($_POST['category']);
    $quantity = (int) $_POST['quantity'];
    $price = (float) $_POST['price'];
    $expiry = $_POST['expiry_date'];

    if ($quantity < 0 || $price < 0) {
        $message = "Quantity and price cannot be negative.";
    } else {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO medicines
            (medicine_name, category, quantity, price, expiry_date)
            VALUES (?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param(
            $stmt, "ssids",
            $name, $category, $quantity, $price, $expiry
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Medicine added successfully!";
        } else {
            $message = "Unable to save medicine.";
        }

        mysqli_stmt_close($stmt);
    }
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM medicines ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medicine Management</title>

<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #eef3f8;
    margin: 0;
    padding: 20px;
    color: #17243b;
}

.container {
    max-width: 1100px;
    margin: auto;
}

h1 {
    background: #07152d;
    color: white;
    text-align: center;
    padding: 22px;
    border-radius: 12px;
}

.box {
    background: white;
    padding: 22px;
    margin: 20px 0;
    border-radius: 12px;
    box-shadow: 0 3px 12px #00000012;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

label {
    display: block;
    margin-bottom: 7px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

button {
    margin-top: 18px;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    background: #087f8c;
    color: white;
    cursor: pointer;
}

button:hover {
    background: #05636d;
}

.message {
    background: #e0f2fe;
    padding: 12px;
    margin: 12px 0;
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
}

th {
    background: #07152d;
    color: white;
}

@media(max-width: 600px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="container">

<h1>💊 Medicine Management</h1>

<div class="box">
<h2>Add New Medicine</h2>

<?php if ($message != "") { ?>
    <div class="message">
        <?= htmlspecialchars($message) ?>
    </div>
<?php } ?>

<form method="POST">
<div class="form-grid">

    <div>
        <label>Medicine Name</label>
        <input type="text" name="medicine_name"
               placeholder="Enter medicine name" required>
    </div>

    <div>
        <label>Category</label>
        <input type="text" name="category"
               placeholder="Tablet / Syrup / Capsule" required>
    </div>

    <div>
        <label>Quantity</label>
        <input type="number" name="quantity"
               min="0" required>
    </div>

    <div>
        <label>Price</label>
        <input type="number" name="price"
               min="0" step="0.01" required>
    </div>

    <div>
        <label>Expiry Date</label>
        <input type="date" name="expiry_date" required>
    </div>

</div>

<button type="submit" name="save">Save Medicine</button>
</form>
</div>

<div class="box">
<h2>Medicine Stock List</h2>

<div class="table-wrap">
<table>
<tr>
    <th>ID</th>
    <th>Medicine Name</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Expiry Date</th>
</tr>

<?php if ($result && mysqli_num_rows($result) > 0) { ?>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['medicine_name']) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= number_format((float)$row['price'], 2) ?></td>
        <td><?= htmlspecialchars($row['expiry_date']) ?></td>
    </tr>
    <?php } ?>

<?php } else { ?>
    <tr>
        <td colspan="6">No medicines added yet.</td>
    </tr>
<?php } ?>

</table>
</div>
</div>

</div>
</body>
</html>