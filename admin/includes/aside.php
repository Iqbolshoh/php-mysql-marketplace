<?php function active($Page, $Menu)
{ ?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="./" class="brand-link">
            <img src="../src/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../src/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview <?php echo ($Page === 'users') ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo ($Page === 'users') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./" class="nav-link <?php echo ($Menu === 'sellers') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Seller</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="users.php" class="nav-link <?php echo ($Menu === 'users') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a onclick="logout()" class="nav-link <?php echo ($Menu === 'logout') ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <?php
}
?>

<?php
function pagePath($pageTitle, $breadcrumb)
{
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $pageTitle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumb as $item): ?>
                            <?php if ($item['url'] === '#'): ?>
                                <li class="breadcrumb-item active"><?php echo $item['title']; ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure you want to log out?',
            text: "You won't be able to cancel this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../logout/';
            }
        });
    }
</script>