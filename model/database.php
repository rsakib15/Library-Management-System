<?php
    function getConnectionName(){
        $address="localhost";
        $path="root";
        $password="";
        $dbname="lms";
        $connection=mysqli_connect($address,$path,$password,$dbname);
        return $connection;
    }

