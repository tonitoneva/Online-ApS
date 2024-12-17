<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Защита от SQL Injection
    $lastId = isset($_POST['last_id']) ? intval($_POST['last_id']) : 0;

    // Подготвена заявка
    $stmt = $pdo->prepare("SELECT * FROM parts WHERE id > ? ORDER BY id ASC LIMIT 5");
    $stmt->execute([$lastId]);

    $response = '';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Защита от XSS
        $image = htmlspecialchars($row['image']);
        $name = htmlspecialchars($row['name']);
        $description = htmlspecialchars($row['description']);
        $price = htmlspecialchars($row['price']);
        $id = htmlspecialchars($row['id']);

        // Генериране на HTML отговора
        $response .= "<div class='catalog-item'>
                        <img src='{$image}' alt='{$name}'>
                        <h3>{$name}</h3>
                        <p>{$description}</p>
                        <p>Price: {$price} USD</p>
                        <form action='process_order.php' method='POST'>
                            <input type='hidden' name='part_id' value='{$id}'>
                            <label>Quantity:</label>
                            <input type='number' name='quantity' min='1' value='1'>
                            <button type='submit'>Add to Cart</button>
                        </form>
                    </div>";
    }

    echo $response;
}
?>