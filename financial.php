<?php
session_start();
ob_start();
if(empty($_SESSION["user"])){
    header("location: index.php");
}
if($_SESSION['user_type']=='admin'){
    header("location: index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Financial</title>
    <link rel="stylesheet" href="css/style.css">
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
<?php include_once ('includes/sidebar.php'); ?>


<div class="main-container">
    <table class="table current-borrow">
        <tr>
            <th>#</th>
            <th>Action</th>
            <th>Date</th>
            <th>Debit</th>
            <th>Credit</th>

        </tr>
        <tr>
            <td>1</td>
            <td>Let Us C</td>
            <td>110th</td>
            <td>10-jan-2017</td>
            <td>20-jan-2017</td>

        </tr><tr>
            <td>1</td>
            <td>Let Us C</td>
            <td>110th</td>
            <td>10-jan-2017</td>
            <td>20-jan-2017</td>
        </tr>
    </table>

</div>
</body>