<?php
    include_once "database.php";
    function login_verify($user,$pass){
        $result = mysqli_query(getConnectionName(),"SELECT * FROM lms_user");
        $auth=false;

        while($res = mysqli_fetch_array($result)){
            if($user==$res['user_name'] && $pass==$res['user_password']){
                $auth=true;
                break;
            }
            else{
                $_SESSION['loginerror']=1;
            }

        }
        return $auth;
    }

    function adduser($u,$fn,$ln,$email,$phone,$p1){
        mysqli_query(getConnectionName(),"INSERT INTO lms_user (user_name,user_fname,user_lname,user_email,user_phone,user_password) VALUES ('".$u."', '".$fn."', '".$ln."','".$email."','".$phone."','".$p1."')");
    }

    function updateuser($u,$fn,$ln,$email,$phone,$p1){

    }

    function getuserInformation(){

    }

    function getUserid(){

    }



