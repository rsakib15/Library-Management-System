<?php
    session_start();
    ob_start();
    if(empty($_SESSION["user"])){
        header("location: index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header-wrapper">
        <header>
            <div class="logo">
                <h1><a href="#">Library Management</a></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="controller/logout_controller.php">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Borrow History</a></li>
                <li><a href="">Search Book</a></li>
                <li><a href="">My Shelves</a></li>
                <li><a href="">Financial</a></li>
                <li><a href="">News and Events</a></li>
            </ul>
        </div>
    </div>

    <div class="main-container">
        <h1>Today's Transaction</h1>
        <div class="transaction today">
            <ul>
                <li>
                    <p><a href="">Reserved Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Violation</a></p>
                    <span>7</span>
                </li>
            </ul>
        </div>
        <h1>All Transaction</h1>
        <div class="transaction all">
            <ul>
                <li>
                    <p><a href="">Reserved Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span>7</span>
                </li>
                <li>
                    <p><a href="">Violation</a></p>
                    <span>7</span>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>