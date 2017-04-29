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
        <h1>ISSUE BOOK</h1>

        <div class="form login-form">
            <?php
            if ( isset($_GET['success']) && $_GET['success'] == 1 ){
                echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Successfully Issued</p>
                  </div>';
            }
            else if ( isset($_GET['failed']) && $_GET['failed'] == 1){
                echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Error to Make an Issue</p>
                  </div>';
            }
            ?>
            <form class="login-form" method="post" action="controller/book_controller.php">
                <label for="username" text-align="left">Username</label>
                <input type="text" placeholder="Insert Username" id="username" name="username" onchange="showUser(this.value)"/>
                <div id="userinfo"></div>
            </form>
        </div>
    </div>


    <script>
        function showBook(str) {
            if (str == "") {
                document.getElementById("bookinfo").innerHTML = "";
                return;
            }
            else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bookinfo").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","bookinfo.php?q="+str,true);
                xmlhttp.send();
            }
        }

        function showUser(str) {
            if (str == "") {
                document.getElementById("bookinfo").innerHTML = "";
                return;
            }
            else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("userinfo").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","userinfo.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
</body>
</html>