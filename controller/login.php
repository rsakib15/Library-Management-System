<?php
    session_start();
    $op= $_REQUEST['submit'];

    switch ($op){
        case 'login':
            include "login_controller.php";
            include_once "../model/user.php";
            $username= $_POST['user'];
            $pass=$_POST['password'];

            if(login($username,$pass)){
                $_SESSION['loginerror'] = 0;
                header('Location: ../dashboard.php');
            }
            else {
                $_SESSION['loginerror'] = 1;
                header('Location: ../index.php');
            }
            break;

        case 'signup':
            include_once "registration_controller.php";
            include_once "../model/user.php";

            $username = htmlentities($_POST['username'], ENT_QUOTES);
            $fn = htmlentities($_POST['firstname'], ENT_QUOTES);
            $ln = htmlentities($_POST['lastname'], ENT_QUOTES);
            $email = htmlentities($_POST['email'], ENT_QUOTES);
            $phone = htmlentities($_POST['phone'], ENT_QUOTES);
            $p1 = htmlentities($_POST['passone'], ENT_QUOTES);
            $p2 = htmlentities($_POST['passtwo'], ENT_QUOTES);


            if(registration($username,$fn,$ln,$email,$phone,$p1,$p2)){
                header('Location: ../index.php');
            }
            else{
                header('Location: ../index.php');
            }
    }
