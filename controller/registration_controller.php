<?php
    include_once '../model/user.php';

    function is_valid_mobile($mobile){
        $mobile = str_replace(" ","",$mobile);
        $mobile = str_replace("-","",$mobile);
        if(preg_match('/^(0088|\+88)?(01)[156789]{1}[0-9]{8}$/',$mobile))
            return true;
        else
            return false;
    }

    function is_valid_email($email){
        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$email))
            return true;
        else
            return false;
    }

    function is_valid_password($p1){
        $len=strlen($p1);
        if($len<9){
            return false;
        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $p1)){
            return true;
        }
        else
            return false;
    }

    function registration($u,$fn,$ln,$email,$phone,$p1,$p2){
        if(!empty($u) && !empty($fn) && !empty($ln) && !empty($email) && !empty($p1) && !empty($p2) && !empty($phone)){
            if (is_valid_mobile($phone)) {
                if (is_valid_email($email)){
                    if ($p1==$p2) {
                        if(is_valid_password($p1)){
                            adduser($u,$fn,$ln,$email,$phone,$p1);
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }



