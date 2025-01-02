<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$cartItems = $query->getCartItems($_SESSION['id']);
$total_price = array_reduce($cartItems, function ($total, $item) {
    return $total + $item['total_price'];
}, 0);

function countTable($table)
{
    global $query;
    $userId = $_SESSION['id'];
    $result = $query->executeQuery("SELECT COUNT(*) AS total_elements FROM $table WHERE user_id = $userId");
    $row = $result->fetch_assoc();
    return $row['total_elements'];
}
?>

<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="./"><img src="./src/images/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="./heart.php"><i class="fa fa-heart"></i> <span><?= countTable('wishes'); ?></span></a>
            </li>
            <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i>
                    <span><?= countTable('cart'); ?></span></a></li>
        </ul>
        <div class="header__cart__price">Total: <span>$<?= number_format($total_price, 2); ?></span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <?php if ($_SESSION['loggedin']): ?>
                <a href="#" onclick="logout()"><i class="fa fa-user"></i>Logout</a>
            <?php else: ?>
                <a href="./login/"><i class="fa fa-user"></i>Login</a>
            <?php endif; ?>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li>
                <a href="./" class="<?= ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a>
            </li>

            <li>
                <a href="./heart.php" class="<?= ($currentPage == 'heart.php') ? 'active' : ''; ?>">Wish
                    List</a>
            </li>

            <li>
                <a href="./shoping-cart.php"
                    class="<?= ($currentPage == 'shoping-cart.php') ? 'active' : ''; ?>">Cart</a>
            </li>
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
            <li>Free Shipping for all Orders over $99</li>
        </ul>
    </div>
</div>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> iilhomjonov777@gmail.com </li>
                            <li>Free Shipping for all Orders over $99</li>
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
                            <?php if ($_SESSION['loggedin']): ?>
                                <a href="#" onclick="logout()"><i class="fa fa-user"></i>Logout</a>
                            <?php else: ?>
                                <a href="./login/"><i class="fa fa-user"></i>Login</a>
                            <?php endif; ?>
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
                    <a href="./"><img src="./src/images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li>
                            <a href="./" class="<?= ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a>
                        </li>

                        <li>
                            <a href="./heart.php" class="<?= ($currentPage == 'heart.php') ? 'active' : ''; ?>">Wish
                                List</a>
                        </li>

                        <li>
                            <a href="./shoping-cart.php"
                                class="<?= ($currentPage == 'shoping-cart.php') ? 'active' : ''; ?>">Cart</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="./heart.php"><i class="fa fa-heart"></i>
                                <span><?= countTable('wishes'); ?></span></a></li>
                        <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i>
                                <span><?= countTable('cart'); ?></span></a></li>
                    </ul>
                    <div class="header__cart__price">Total: <span>$<?= number_format($total_price, 2); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<style>
    .hero__categories__all:after {
        content: '';
        display: block;
    }

    ul li a.active {
        color: #7fad39 !important;
        font-weight: bold !important;
    }
</style>

<section class="hero hero-normal" style="margin-bottom: -50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Category</span>
                    </div>
                    <ul>
                        <?php
                        $categories = $query->select('categories', '*');
                        foreach ($categories as $category): ?>
                            <li>
                                <a
                                    href="category.php?category=<?= $category['id']; ?>"><?= $category['category_name'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                            </div>
                            <input type="text" placeholder="What do you need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+998 (99) 779 99 33</h5>
                            <span>support 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure you want to log out?',
            text: "You cannot undo this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './logout/';
            }
        });
    }
</script>