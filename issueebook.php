<?php
session_start();
ob_start();
    if(empty($_SESSION["user"])){
        header("location: index.php");
    }
    if($_SESSION['user_type']=='student'){
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
    <div class="form login-form">
        <div id="login-form">
            <?php
            if ( isset($_GET['success']) && $_GET['success'] == 1 ){
                echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Successfully added</p>
                  </div>';
            }
            else if ( isset($_GET['failed']) && $_GET['failed'] == 1){
                echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Error to add New Book</p>
                  </div>';
            }
            ?>
            <form class="login-form "  method="post" action="controller/book_controller.php">
                <input type="text" placeholder="Book Name" name="bookname"/>
                <input type="text" placeholder="Book ISBN" name="bookisbn"/>
                <input type="text" placeholder="Book Edition" name="bookedition"/>
                <input type="text" placeholder="Book Author" name="bookauthor"/>
                <input type="text" placeholder="Total Copy" name="booktotal"/>
                <input type="text" placeholder="Shelf No." name="bookshelf"/>
                <button name="submit" value="addbook">ADD NEW BOOK</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>