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
        date_default_timezone_set('Asia/Dhaka');
        $u=getUserid($username);
        decresebook($bookid);

        $t=time();
        $t=date("Y-m-d", $t);
        $timestamp = time()+86400*7;

        $timestamp=date('Y-m-d',$timestamp);

        mysqli_query(getConnectionName(),"INSERT INTO lms_issue (book_id,user_id,issue_date, return_date,status)  VALUES ('".$bookid."', '".$u."','".$t."', '".$timestamp."','pending')");
        return true;
    }

    function getExpectedReturnDate($transaction){
        $result=mysqli_query(getConnectionName(),"SELECT return_date FROM lms_issue where issue_id = '" . $transaction . "'");
        if($res=mysqli_fetch_array($result)){
            return $res['return_date'];
        }
    }

    function return_issue($transaction){
        $result=mysqli_query(getConnectionName(),"SELECT * FROM lms_issue where issue_id = '" . $transaction . "'");
        if($res=mysqli_fetch_array($result)) {
            $bid= $res['book_id'];
            increasebook($bid);
            mysqli_query(getConnectionName(),"UPDATE lms_issue SET status = 'accepted' WHERE issue_id = '" . $transaction . "'");
        }

        $d=calculateFine($transaction);
        $u=getUserid($_SESSION['user']);

        mysqli_query(getConnectionName(),"INSERT INTO lms_financial (issue_id,user_id,issue_returndate,fine) VALUES ('".$transaction."', '". $u ."' , '" . date("Y-m-d", time()) . "', '". $d ."')");
        return true;
    }

    function calculateFine($transaction){
        $d=getExpectedReturnDate($transaction);
        $d=strtotime($d);
        $d=time()-$d;
        $d=floor($d/86400);
        $d= intval($d*15);
        if($d<=0)
            $d=0;

        return $d;
    }

    function getFine($transaction){
        $u=getUserid($_SESSION['user']);

        $result=mysqli_query(getConnectionName(),"SELECT fine FROM lms_financial where issue_id = '" . $transaction . "'");
        $res=mysqli_fetch_array($result);
        return $res['fine'];
    }



    function getTotalBooks(){
        $result=mysqli_query(getConnectionName(),"SELECT * FROM lms_books");
        $total=0;
        while($res=mysqli_fetch_array($result)){
            $total+=$res['book_total'];
        }
        return $total;
    }

    function getAvailableBooks(){
        $result=mysqli_query(getConnectionName(),"SELECT * FROM lms_books");
        $total=0;
        while($res=mysqli_fetch_array($result)){
            $total+=$res['book_available'];

        }
        return $total;
    }

    function getBorrowedBook(){
        return getTotalBooks()-getAvailableBooks();
    }

    function updatebook($bookid,$bookname,$bookisbn,$bookedition,$bookauthor,$booktotal){
        mysqli_query(getConnectionName(),"UPDATE lms_books SET book_name = '" . $bookname . "',book_isbn= '" . $bookisbn ."' ,book_edition = '". $bookedition . "' ,book_author = '" .$bookauthor . "',book_total = '".$booktotal ."' where book_id = '". $bookid . "'");
        return true;

    }

    function getCurrentBorrow($user){
        $u=getUserid($user);

        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totaltoday FROM lms_issue WHERE user_id='". $u . "'  AND issue_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totaltoday'];
    }

    function getTotalBorrow($user){
        $u=getUserid($user);
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totaltoday FROM lms_issue WHERE user_id='". $u . "'");
        $res=mysqli_fetch_array($result);
        return $res['totaltoday'];
    }

    function getTotalReturn($user){
        $u=getUserid($user);

        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totaltoday FROM lms_issue WHERE user_id='". $u . "' AND status='accepted'");
        $res=mysqli_fetch_array($result);
        return $res['totaltoday'];
    }

    function getCurrentReturn($user){
        $u=getUserid($user);
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totalall FROM lms_issue WHERE user_id='". $u . "' AND status='accepted' AND return_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totalall'];
    }

    function getExpectedReturn($user){
        $u=getUserid($user);
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totalall FROM lms_issue WHERE user_id='". $u . "' AND status='pending' AND return_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totalall'];
    }

    function getViolationUser($user){
        $u=getUserid($user);
        $result=mysqli_query(getConnectionName(),"SELECT *  FROM lms_issue WHERE user_id='". $u . "' AND status='pending'");
        $cnt=0;
        while($res=mysqli_fetch_array($result)){
            if($res['return_date']>time()){
                $cnt++;
            }
        }
        return $cnt;
    }

    function getAllCurrentBorrow(){
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totaltoday FROM lms_issue WHERE  issue_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totaltoday'];
    }

    function getAllCurrentReturn(){
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totalall FROM lms_issue WHERE status='accepted' AND return_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totalall'];
    }

    function getAllCurrentExpectedReturn(){
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totalall FROM lms_issue WHERE status='pending' AND return_date = CURDATE()");
        $res=mysqli_fetch_array($result);
        return $res['totalall'];
    }

    function getAllTotalBorrow(){
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totaltoday FROM lms_issue WHERE status='pending'");
        $res=mysqli_fetch_array($result);
        return $res['totaltoday'];

    }
    function getAllTotalReturn(){
        $result=mysqli_query(getConnectionName(),"SELECT COUNT(*) as totalall FROM lms_issue WHERE status='accepted'");
        $res=mysqli_fetch_array($result);
        return $res['totalall'];
    }

    function getAllTotalViolation(){
        $result=mysqli_query(getConnectionName(),"SELECT *  FROM lms_issue WHERE  status='pending'");
        $cnt=0;
        while($res=mysqli_fetch_array($result)){
            if($res['return_date']>time()){
                $cnt++;
            }
        }
        return $cnt;
    }






