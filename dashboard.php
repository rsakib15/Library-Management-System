<?php
    session_start();
    ob_start();
    if(empty($_SESSION["user"])){
        header("location: index.php");
    }
    include_once 'model/book_model.php';
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
    <?php include_once ('includes/header.php'); ?>
    <?php include_once ('includes/sidebar.php'); ?>


    <div class="main-container">
        <h1>Today's Transaction</h1>
        <div class="transaction today">
            <ul>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span><?php echo getCurrentBorrow($_SESSION["user"])?></span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span><?php echo getCurrentReturn($_SESSION["user"])?></span>
                </li>
                <li>
                    <p><a href="">Expected Return</a></p>
                    <span><?php echo getExpectedReturn($_SESSION["user"])?></span>
                </li>
            </ul>
        </div>
        <h1>All Transaction</h1>
        <div class="transaction all">
            <ul>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span><?php echo getTotalBorrow($_SESSION["user"])?></span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span><?php echo getTotalReturn($_SESSION["user"])?></span>
                </li>
                <li>
                    <p><a href="">Violation</a></p>
                    <span><?php echo getViolationUser($_SESSION["user"]) ?></span>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>