<?php
    include_once "database.php";
    include_once 'user.php';

    function add_book($bookname,$bookisbn,$bookedition,$bookauthor,$booktotal,$bookshelf){
        mysqli_query(getConnectionName(),"INSERT INTO lms_books (book_name,book_isbn,book_edition, book_author,book_total,book_available, book_self)  VALUES ('".$bookname."', '".$bookisbn."','".$bookedition."', '".$bookauthor."','".$booktotal."','".$booktotal."','".$bookshelf."')");
        return true;
    }

    function totalavailablebook($bookid){
        $result=mysqli_query(getConnectionName(),"SELECT * FROM lms_books where book_id = '" . $bookid ."'");
        if($res=mysqli_fetch_array($result)){
            return $res['book_available'];
        }
    }

    function decresebook($bookid){
        $available=totalavailablebook($bookid);
        $available -= 1;
        mysqli_query(getConnectionName(),"UPDATE lms_books SET book_available = '" . $available . "' WHERE book_id = '" . $bookid . "'");
    }

    function increasebook($bookid){
        $available=totalavailablebook($bookid);
        $available += 1;
        mysqli_query(getConnectionName(),"UPDATE lms_books SET book_available = '" . $available . "' WHERE book_id = '" . $bookid . "'");
        }

    function add_issue($username,$bookid){
        $u=getUserid($username);
        $t=time();
        $timestamp = time()+86400*7;
        decresebook($bookid);
        mysqli_query(getConnectionName(),"INSERT INTO lms_issue (book_id,user_id,issue_date, return_date,status)  VALUES ('".$bookid."', '".$u."','".$t."', '".$timestamp."','pending')");
        return true;
    }

    function return_issue($transaction){
        $result=mysqli_query(getConnectionName(),"SELECT * FROM lms_issue where issue_id = '" . $transaction . "'");
        if($res=mysqli_fetch_array($result)) {
            $bid= $res['book_id'];
            increasebook($bid);
            mysqli_query(getConnectionName(),"UPDATE lms_issue SET status = 'accepted' WHERE issue_id = '" . $transaction . "'");
        }
        return true;
    }



