<?php
    include_once "database.php";
    include_once 'user.php';

    function add_book($bookname,$bookisbn,$bookedition,$bookauthor,$booktotal,$bookshelf){
        mysqli_query(getConnectionName(),"INSERT INTO lms_books (book_name,book_isbn,book_edition, book_author,book_total,book_available, book_self)  VALUES ('".$bookname."', '".$bookisbn."','".$bookedition."', '".$bookauthor."','".$booktotal."','".$booktotal."','".$bookshelf."')");
        return true;
    }



    function add_issue($username,$bookid){
        $u=getUserid($username);
        $t=time();
        $timestamp = time()+86400;

        mysqli_query(getConnectionName(),"INSERT INTO lms_issue (book_id,user_id,issue_date, return_date,status)  VALUES ('".$bookid."', '".$username."','".$t."', '".$timestamp."','pending')");
        return true;
    }

    function return_issue($transaction){

    }



