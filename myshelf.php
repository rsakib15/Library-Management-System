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
<?php include_once ('includes/sidebar.php'); ?>

<div class="main-container">
    <table class="table current-borrow">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Edition</th>
            <th>Author Names</th>
            <th>Total Copy</th>
            <th>Available Copy</th>
            <th>Shelf No</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Let Us C</td>
            <td>110th</td>
            <td>10-jan-2017</td>
            <td>20-jan-2017</td>
            <td>0.0</td>
            <td>121</td>
        </tr><tr>
            <td>1</td>
            <td>Let Us C</td>
            <td>110th</td>
            <td>10-jan-2017</td>
            <td>20-jan-2017</td>
            <td>0.0</td>
            <td>121</td>
        </tr>
    </table>

</div>
</body>