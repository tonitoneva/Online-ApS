<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $part_id = $_POST['part_id'];
    $quantity = $_POST['quantity'];
    $customer_name = "John Doe"; // Replace with user input
    $customer_email = "john.doe@example.com"; // Replace with user input

    $stmt = $pdo->prepare("SELECT price FROM parts WHERE id = ?");
    $stmt->execute([$part_id]);
    $part = $stmt->fetch(PDO::FETCH_ASSOC);

    $total_price = $part['price'] * $quantity;

    $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, part_id, quantity, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$customer_name, $customer_email, $part_id, $quantity, $total_price]);

    echo "<p>Order placed successfully!</p>";
}
?>