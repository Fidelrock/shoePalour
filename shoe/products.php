<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Shoe Website</title>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="navbar navbar-default">
        <ul>


            <li><a href="#products">Products</a></li>
            <li><img class="logo" src="img/light-small.png" alt=""></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Banner -->
    <div class="banner">
        <h1>Walk The walk</h1>
    </div>

    <div class="background-container">

        <!-- Products -->
        <h3 id="products">PRODUCTS</h3>
        <div class="product-container">

            <?php
            // Sample product data (you can replace it with your actual product data)
            $products = [];

            for ($i = 1; $i <= 50; $i++) {
                $products[$i] = [
                    'name' => 'Product ' . $i,
                    'price' => rand(1500, 3000) + (rand(1000, 2999) / 100), // Random price between 30.00 and 150.99
                ];
            }


            // Loop through the products and generate product cards
            foreach ($products as $productId => $product) {
                echo '<div class="card">';
                echo '<div class="shoe-img product' . $productId . '"></div>';
                echo '<h4>' . $product['name'] . ' - sh ' . $product['price'] . '</h4>';
                echo '<button class="btn">Buy Now</button>';
                echo '</div>';
            }
            ?>

        </div>

        <!-- About Section -->
        <div id="about" class="about">
            <h2>About Us</h2>
            <p> Sneaker shops were found in 2012. We have varieties of shoes, both male and female types. Shipping/delivery is done countrywide.</p>
        </div>

        <!-- Contact form -->
        <div id="contact" class="card contact-form">
            <h3>Contact Us</h3>
            <form action="process_form.php" method="post">
                <input type="email" name="email" placeholder="name@email.com">
                <textarea id="message" name="text" placeholder="Enter Message here..."></textarea>
                <button class="btn submit-form" type="submit">Submit</button>
            </form>
        </div>

        <!-- Footer -->
        <footer>
            <p>Sneaker Shop - A website by young developers</p>
            <p>Contact us:<br> WhatsApp: +254 742918991
                <br>Instagram: @young Developers <br> Facebook: @young Developers
            </p>
        </footer>

    </div>

</body>

</html>