<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <!-- Include your CSS and FontAwesome here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">E-COMMERCE LOGO TITLE HERE!</a>
        <div class="search_box">
            <input type="search" placeholder="Search Here">
            <span class="fa fa-search"></span>
        </div> 

        <nav class="navbar">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#product">Products</a></li>
                <li><a href="#category">Category</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="cart">
                <span class="fa fa-shopping-cart"></span>
                <span>Cart (0)</span>
            </div>
            <div class="login">
                <span class="fa fa-user"></span>
                <a href="{{ route('login') }}">Login/Register</a>
            </div>
        </nav>
    </header>

    <section id="home">
        <div>
            <h2>This is the home section content.</h2>
            <p>Customize this as needed.</p>
        </div>
        
    </section>
    <section id="/">
        <footer>
            <p>&copy; {{ date('Y') }} Your E-Commerce Website. All rights reserved.</p>
        </footer>
        
        
    </section>

    
</body>
</html>
