<?php
    session_start();
    ob_start();
    if(empty($_SESSION["user"])){
        header("location: index.php");
    }
    include_once 'model/database.php';


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
        <div class="search-area">
            <form action="" method="get">
                <input type="text" placeholder="name" name="bookname" class="searchbox"/>
                <button name="submit" class="searchbutton" value="search">Search</button>
            </form>
        </div>
        <table class="table current-borrow">
            <tr>
                <th>#</th>
                <th>Book ID</th>
                <th>Title</th>
                <th>Edition</th>
                <th>Author Names</th>
                <th>Total Copy</th>
                <th>Available Copy</th>
                <th>Shelf No</th>
                <?php if($_SESSION['user_type']=='student') echo '<th>Action</th>'?>
            </tr>
            <?php
                if($_GET){
                    $q=$_GET['submit'];
                    $search = $_GET['bookname'];

                    if($search!="") {

                        $result = mysqli_query(getConnectionName(), "SELECT * FROM lms_books WHERE book_name LIKE '%" . $search . "%'");
                        $x = 0;
                        while ($res = mysqli_fetch_array($result)) {
                            ++$x;
                            echo '<tr>';
                            echo '<td>' . $x . '</td>';
                            echo '<td>' . $res['book_id'] . '</td>';
                            echo '<td>' . $res['book_name'] . '</td>';
                            echo '<td>' . $res['book_edition'] . '</td>';
                            echo '<td>' . $res['book_author'] . '</td>';
                            echo '<td>' . $res['book_total'] . '</td>';
                            echo '<td>' . $res['book_available'] . '</td>';
                            echo '<td>' . $res['book_self'] . '</td>';

                            if ($_SESSION['user_type'] == 'student') echo '<td>Add to Wishlist</td>';
                            echo '</tr>';
                        }

                        if ($x == 0) {
                            echo '<div class="loginerror" id="dummy">
                                 <p class="errortxt">Sorry, Nothing Found</p>
                        </div>';
                        }
                    }
                }

            ?>


        </table>

</div>
</body>