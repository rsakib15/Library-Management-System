<?php
    session_start();
    function increaseLogin(){
        $_SESSION['loginerror']+=1;
    }

    function initailzeattemp(){
        $_SESSION['loginerror']=0;
    }