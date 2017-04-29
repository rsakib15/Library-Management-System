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
        <h1>Current Borrow</h1>
        <table class="table current-borrow">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Edition</th>
                <th>Borrowed On</th>
                <th>Expected Return On</th>
                <th>Fine</th>
            </tr>
            <?php
                include_once 'model/database.php';
                $sql="SELECT lms_issue.issue_id,lms_issue.book_id,lms_issue.user_id,lms_issue.issue_date,lms_issue.return_date,lms_issue.status,lms_books.book_name,lms_books.book_isbn,lms_books.book_edition,lms_books.book_author,lms_user.user_name,lms_user.user_fname,lms_user.user_lname,lms_user.user_email FROM lms_issue,lms_books,lms_user WHERE lms_issue.book_id=lms_books.book_id AND lms_issue.user_id=lms_user.user_id AND lms_issue.status = 'pending' AND lms_user.user_name = '" . $_SESSION['user'] . "'";
                $x=0;
                $result = mysqli_query(getConnectionName(), $sql);
                while ($res = mysqli_fetch_array($result)) {
                    ++$x;
                    echo '<tr>';
                    echo '<td>' . $x . '</td>';
                    echo '<td>' . $res['book_name'] . '</td>';
                    echo '<td>' . $res['book_edition'] . '</td>';
                    echo '<td>' . $res['issue_date'] . '</td>';
                    echo '<td>' . $res['return_date'] . '</td>';
                    echo '<td>' . 0 . '</td>';
                    echo '</tr>';
                }

            ?>
        </table>
        <h1>Borrow History</h1>
        <table class="table borrow-history">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Edition</th>
                <th>Borrowed On</th>
                <th>Return On</th>
                <th>Fine</th>
            </tr>
            <?php
            $sql="SELECT lms_issue.issue_id,lms_issue.book_id,lms_issue.user_id,lms_issue.issue_date,lms_issue.return_date,lms_issue.status,lms_books.book_name,lms_books.book_isbn,lms_books.book_edition,lms_books.book_author,lms_user.user_name,lms_user.user_fname,lms_user.user_lname,lms_user.user_email FROM lms_issue,lms_books,lms_user WHERE lms_issue.book_id=lms_books.book_id AND lms_issue.user_id=lms_user.user_id AND lms_issue.status = 'accepted' AND lms_user.user_name = '" . $_SESSION['user'] . "'";
            $x=0;
            $result = mysqli_query(getConnectionName(), $sql);
            while ($res = mysqli_fetch_array($result)) {
                ++$x;
                echo '<tr>';
                echo '<td>' . $x . '</td>';
                echo '<td>' . $res['book_name'] . '</td>';
                echo '<td>' . $res['book_edition'] . '</td>';
                echo '<td>' . $res['issue_date'] . '</td>';
                echo '<td>' . $res['return_date'] . '</td>';
                echo '<td>' . 0 . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>