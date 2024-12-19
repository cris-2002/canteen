<!-- edit.php -->
<?php
include 'config.php';
$id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM menu_items WHERE id = ?");
$query->execute([$id]);
$item = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $dietary_info = $_POST['dietary_info'];
    $allergies_info = $_POST['allergies_info'];

    $stmt = $pdo->prepare("UPDATE menu_items SET name = ?, price = ?, dietary_info = ?, allergies_info = ? WHERE id = ?");
    $stmt->execute([$name, $price, $dietary_info, $allergies_info, $id]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Menu Item</title>
</head>
<body>
    <h1>Edit Menu Item</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>

        <label for="dietary_info">Dietary Info:</label>
        <input type="text" id="dietary_info" name="dietary_info" value="<?php echo htmlspecialchars($item['dietary_info']); ?>">

        <label for="allergies_info">Allergies Info:</label>
        <input type="text" id="allergies_info" name="allergies_info" value="<?php echo htmlspecialchars($item['allergies_info']); ?>">

        <button type="submit">Save</button>
    </form>
</body>
</html>