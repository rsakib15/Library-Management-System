<?php
    include_once "model/user.php";

    function login($user,$pass){
        if(authenticate($user,$pass)){
            echo "YES";
            session_start();
            ob_start();
            $_SESSION['user']=$user;

            return true;
        }
        else{
            return false;
        }
    }

    function authenticate($u,$p){
        $auth = false;
        if(login_verify($u,$p)){
            $auth=true;
        }
        return $auth;
    }

    function logout(){
        session_start();
        session_destroy();
    }

