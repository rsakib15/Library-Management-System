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
        <h1>Update BOOK Information</h1>
        <div class="form login-form">
            <form class="login-form" method="post" action="controller/book_controller.php">
                <label for="bookid" text-align="left">Insert Book ID</label>
                <input type="text" placeholder="Insert Book ID" name="updatebook" onchange="updateBook(this.value())"/>
                <div id="updateinfo"></div>
            </form>
        </div>
    </div>


    <script>
        function updateBook(str) {
            alert("hello");
            if (str == "") {
                document.getElementById("updateinfo").innerHTML = "";
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
                        document.getElementById("updateinfo").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","updateinfo.php?q="+str,true);
                xmlhttp.send();
            }
        }

    </script>

</body>
</html>