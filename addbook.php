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
    <title>Add New Book</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include_once ('includes/header.php'); ?>
    <?php include_once ('includes/sidebar.php'); ?>

    <div class="main-container">
        <h1>Add New Book</h1>
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
                    <p>Book Name</p>
                    <input type="text" name="bookname"/>
                    <p>Book ISBN</p>
                    <input type="text" name="bookisbn"/>
                    <p>Book Edition</p>
                    <input type="text" name="bookedition"/>
                    <p>Book Author</p>
                    <input type="text" name="bookauthor"/>
                    <p>Total Copy</p>
                    <input type="text" name="booktotal"/>
                    <p>Shelf NO.</p>
                    <input type="text" name="bookshelf"/>
                    <button name="submit" value="addbook">ADD NEW BOOK</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>