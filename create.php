<!-- create.php -->
<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $dietary_info = $_POST['dietary_info'];
    $allergies_info = $_POST['allergies_info'];

    $stmt = $pdo->prepare("INSERT INTO menu_items (name, price, dietary_info, allergies_info) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $price, $dietary_info, $allergies_info]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Menu Item</title>
</head>
<body>
    <h1>Add New Menu Item</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>

        <label for="dietary_info">Dietary Info:</label>
        <input type="text" id="dietary_info" name="dietary_info">

        <label for="allergies_info">Allergies Info:</label>
        <input type="text" id="allergies_info" name="allergies_info">

        <button type="submit">Add</button>
    </form>
</body>
</html>