<?php
session_start();
ob_start();
if(empty($_SESSION["user"])){
    header("location: index.php");
}
if($_SESSION['user_type']=='student'){
    header("location: index.php");
}
include_once 'model/book_model.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once ('includes/header.php'); ?>
    <?php include_once ('includes/sidebar.php'); ?>

    <div class="main-container">
        <h1>Statistics</h1>
        <div class="transaction today">
            <ul>
                <li>
                    <p><a href="">Total Students</a></p>
                    <span><?php echo getTotalStudent();?></span>
                </li>
                <li>
                    <p><a href="">Total Books</a></p>
                    <span><?php echo getTotalBooks();?></span>
                </li>

                <li>
                    <p><a href="">Books Available</a></p>
                    <span><?php echo getAvailableBooks();?></span>
                </li>
                <li>
                    <p><a href="">Books Borrowed</a></p>
                    <span><?php echo getBorrowedBook();?></span>
                </li>
            </ul>
        </div>
        <h1>Today's Transaction</h1>

        <div class="transaction all">
            <ul>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span><?php echo getAllCurrentBorrow();?></span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span><?php echo getAllCurrentReturn();?></span>
                </li>
                <li>
                    <p><a href="">Expected Return</a></p>
                    <span><?php echo getAllCurrentExpectedReturn();?></span>
                </li>
            </ul>
        </div>
        <h1>All Transaction</h1>
        <div class="transaction all">
            <ul>
                <li>
                    <p><a href="">Borrowed Transaction</a></p>
                    <span><?php echo getAllTotalBorrow();?></span>
                </li>
                <li>
                    <p><a href="">Returned Transaction</a></p>
                    <span><?php echo getAllTotalReturn();?></span>
                </li>
                <li>
                    <p><a href="">Violation</a></p>
                    <span><?php echo getAllTotalViolation();?></span>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>