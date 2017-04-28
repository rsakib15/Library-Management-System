<div class="header-wrapper">
    <header>
        <div class="logo">
            <h1><a href="#">Library Management</a></h1>
        </div>
        <nav>
            <ul>
                <li><?php echo $_SESSION['user']."  ( " . $_SESSION['user_type'] . " )"; ?></li>
                <li><a href="controller/logout_controller.php">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>