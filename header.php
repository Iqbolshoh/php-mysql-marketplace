<?php session_start(); ?>
<?php
$cartItem = $query->getCartItems($_SESSION['id']);
$total_price = 0;
if (!empty($cartItem)) foreach ($cartItem as $item) $total_price += $item['total_price']
?>

<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="/"><img src="images/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="./heart.php"><i class="fa fa-heart"></i> <span><?php echo $query->count('wishes') ?></span></a></li>
            <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $query->count('cart') ?></span></a></li>
        </ul>
        <div class="header__cart__price">Jami: <span>$<?php echo number_format($total_price, 2) ?></span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <?php echo $_SESSION['loggedin'] ? '<a href="./logout/" onclick="return confirm(\'Aniq chiqmoqchimisiz?\')"><i class="fa fa-user"></i>Logout</a>' : '<a href="./login/"><i class="fa fa-user"></i>Login</a>' ?>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="./">Asosiy</a></li>
            <li><a href="./heart.php">Saralangan</a></li>
            <li><a href="./shoping-cart.php">Savat</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> iilhomjonov777@gmail.com </li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> iilhomjonov777@gmail.com </li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <?php echo $_SESSION['loggedin'] ? '<a href="./logout/" onclick="return confirm(\'Aniq chiqmoqchimisiz?\')"><i class="fa fa-user"></i>Logout</a>' : '<a href="./login/"><i class="fa fa-user"></i>Login</a>' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="./">Asosiy</a></li>
                        <li><a href="./heart.php">Saralangan</a></li>
                        <li><a href="./shoping-cart.php">Savat</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="./heart.php"><i class="fa fa-heart"></i> <span><?php echo $query->count('wishes') ?></span></a></li>
                        <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $query->Count('cart') ?></span></a></li>
                    </ul>
                    <div class="header__cart__price">Jami: <span>$<?php echo number_format($total_price, 2) ?></span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal" style="margin-bottom: -50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Categoriya</span>
                    </div>
                    <ul>
                        <?php
                        $categories = $query->select('categories', '*');
                        foreach ($categories as $category) : ?>
                            <li><a href="category.php?category=<?php echo $category['id'] ?>"><?php echo $category['category_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Barcha Categoriyalar
                            </div>
                            <input type="text" placeholder="Sizga nima kerak?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+998 (99) 779 99 33</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script> -->
