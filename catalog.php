<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <title>Catalog - Auto Parts Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Catalog</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="catalog.php">Catalog</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>
    <main>
        <!-- Форма за търсене по ID -->
        <form action="catalog.php" method="POST" class="search-form">
            <label for="part_id">Search by Part ID:</label>
            <input type="text" name="part_id" id="part_id" placeholder="Enter Part ID">
            <button type="submit">Search</button>
        </form>

        <div class="catalog">
            <?php
            $lastId = 0; // Инициализираме $lastId

            // Проверка дали е изпратена заявка за търсене
            $partId = isset($_POST['part_id']) ? intval($_POST['part_id']) : '';

            if ($partId) {
                // Търсене по ID
                $stmt = $pdo->prepare("SELECT * FROM parts WHERE id = ? ORDER BY created_at ASC");
                $stmt->execute([$partId]);
            } else {
                // Ако няма търсене, извличаме първите 5 части
                $stmt = $pdo->query("SELECT * FROM parts ORDER BY id ASC LIMIT 5");
            }

            // Извеждаме частите
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imagePath = (strpos($row['image'], 'http') === 0) ? $row['image'] : "uploads/{$row['image']}";
                echo "<div class='catalog-item'>
                        <img src='{$imagePath}' alt='" . htmlspecialchars($row['name']) . "' style='max-width: 200px;'>
                        <h3>" . htmlspecialchars($row['name']) . "</h3>
                        <p>" . htmlspecialchars($row['description']) . "</p>
                        <p>Price: $" . htmlspecialchars($row['price']) . "</p>
                        <form action='process_order.php' method='POST'>
                            <input type='hidden' name='part_id' value='" . htmlspecialchars($row['id']) . "'>
                            <label>Quantity:</label>
                            <input type='number' name='quantity' min='1' value='1'>
                            <button type='submit'>Add to Cart</button>
                        </form>
                      </div>";
 
                $lastId = $row['id'];
            }
            ?>
        </div>

        <!-- Бутон за зареждане на още -->
        <button id="load-more" data-last-id="<?= $lastId ?>">Load More</button>
    </main>
    <footer>
    <div class="footer-content">
        <p>Created by Toni Toneva</p>
        <p>Hosted on Hetzner</p>
    </div>
</footer>
</body>
</html>