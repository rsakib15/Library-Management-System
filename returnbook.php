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
    <title>Return Book</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once ('includes/header.php'); ?>
<?php include_once ('includes/sidebar.php'); ?>

<div class="main-container">
    <h1>Return BOOK</h1>
    <div class="form login-form">
        <form class="login-form" method="post" action="controller/book_controller.php">
            <p>Insert Transaction ID</p>
            <input type="text" id="bookid" name="transaction" onchange="findTransaction(this.value)"/>
            <div id="transactioninfo"></div>
        </form>
    </div>
</div>


<script>
    function findTransaction(str) {
        if (str == "") {
            document.getElementById("transactioninfo").innerHTML = "";
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
                    document.getElementById("transactioninfo").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","transactioninfo.php?q="+str,true);
            xmlhttp.send();
        }
    }

</script>

</body>
</html>