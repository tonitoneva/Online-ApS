<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
main {
    flex: 1;
    padding: 20px;
    display: flex;
    justify-content: center; 
    align-items: center; 
}

form {
    width: 100%; 
    max-width: 800px; 
    padding: 30px; 
    background-color: #fff; 
    border-radius: 8px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    box-sizing: border-box; 
}

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea {
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="catalog.php">Catalog</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>
    <main>
        <form action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your Message" required></textarea>
            
            <button type="submit">Send</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);

            echo "<p>Thank you for your message! We'll get back to you soon.</p>";
        }
        ?>
    </main>
    <footer>
    <div class="footer-content">
        <p class="footer-text">Created by Toni Toneva</p>
        <p class= "footer-text">Hosted on Hetzner</p>
    </div>
</footer>
</body>
</html>