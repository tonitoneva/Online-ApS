<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Online Auto Parts Shop</title>
    <style>


    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Auto Parts Shop</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="catalog.php">Catalog</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>
    <main>
    <div class="container">
    <div class="section first">
        <div class="text-container">
            <h1>Най-добрите оферти за авто части!</h1>
            <p>Изберете от широката ни продуктова гама авточасти за вашият автомобил. Богато разнообразие от модели. Предлагаме онлайн консултации!</p>
            <button onclick="location.href='contact.php'" type="button">Свържете се с нас!</button>
        </div>
        <div class="image-container">
            <img src="https://img.freepik.com/free-photo/various-work-tools-worktop_1170-1505.jpg?t=st=1734121917~exp=1734125517~hmac=77b28aacb6ea1856504e112e91e7dd1260aa99bf2a098482624867e85c4f438a&w=1800" alt="Auto Parts" />
        </div>
    </div>

    <div class="section second">
        <h2>За нас</h2>
        <div class="image-container">
            <img src="https://listcarbrands.com/wp-content/uploads/2015/09/German-Car-Brands.png" alt="За нас" />
        </div>
        <div class="text-container">
            <p>Добре дошли в нашия онлайн магазин за авточасти! Ние предлагаме широка гама от висококачествени авточасти за всякакви марки и модели автомобили. С нашия професионален подход и качествено обслужване, вие сте в добри ръце. Благодарим ви за доверието!</p>
            <p><strong>Предлагаме авточасти за марки като:</strong> <span>Ford</span>, <span>Mercedes Benz</span>, <span>BMW</span>, <span>Opel</span>, <span>Audi</span>, <span>Porsche</span>.</p>
        </div>
    </div>
</div>
    </main>
    <footer>
    <div class="footer-content">
        <p>Created by Toni Toneva</p>
        <p>Hosted on Hetzner</p>
    </div>
</footer>
</body>
</html>