<!-- index.php -->
<?php
include 'config.php';
$query = $pdo->query("SELECT * FROM menu_items");
$menu_items = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Cafeteria Management</title>
</head>
<body>
    <h1>Menu Items</h1>
    <a href="create.php">Add New Item</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Dietary Info</th>
            <th>Allergies Info</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($menu_items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo htmlspecialchars($item['price']); ?></td>
                <td><?php echo htmlspecialchars($item['dietary_info']); ?></td>
                <td><?php echo htmlspecialchars($item['allergies_info']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>