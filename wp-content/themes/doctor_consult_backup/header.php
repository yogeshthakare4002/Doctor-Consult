<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="main-header">
    <!-- Top Section -->
    <div class="header-top">
        <div class="container">
            <div class="header-content">
                <!-- Left Side - Logo and Delivery -->
                <div class="header-left">
                    <div class="logo-section">
                        <div class="logo-icon">
                            <i class="fas fa-mortar-pestle"></i>
                        </div>
                        <div class="logo-text">
                            <span class="tagline">Take it easy</span>
                            <h1 class="logo">PharmEasy</h1>
                        </div>
                    </div>
                    <div class="delivery-info">
                        <div class="delivery-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <span class="delivery-text">
                            Express delivery to <span class="pincode-selector">Select Pincode <i class="fas fa-chevron-down"></i></span>
                        </span>
                    </div>
                </div>

                <!-- Center - Search Bar -->
                <div class="header-center">
                    <div class="search-container">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" placeholder="Search for Medicine and Healthcare items" class="search-input">
                        </div>
                        <button class="search-btn">Search</button>
                    </div>
                </div>

                <!-- Right Side - User Actions -->
                <div class="header-right">
                    <div class="user-actions">
                        <a href="#" class="action-link">
                            <i class="fas fa-user"></i>
                            <span>Hello, Log in</span>
                        </a>
                        <a href="#" class="action-link">
                            <i class="fas fa-percentage"></i>
                            <span>Offers</span>
                        </a>
                        <a href="#" class="action-link cart-link">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Cart</span>
                            <span class="cart-count">2</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section - Navigation -->
    <div class="header-bottom">
        <div class="container">
            <nav class="main-navigation">
                <ul class="nav-menu">
                    <li><a href="#" class="nav-link">Medicine</a></li>
                    <li class="has-dropdown">
                        <a href="#" class="nav-link">Healthcare <i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li class="has-dropdown">
                        <a href="#" class="nav-link">Lab Tests <i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li><a href="#" class="nav-link">PLUS</a></li>
                    <li><a href="#" class="nav-link">Health Blogs</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

