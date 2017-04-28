<?php
    include_once "database.php";

    function add_book($bookname,$bookisbn,$bookedition,$bookauthor,$booktotal,$bookshelf){
        mysqli_query(getConnectionName(),"INSERT INTO lms_books (book_name,book_isbn,book_edition, book_author,book_total,book_available, book_self)  VALUES ('".$bookname."', '".$bookisbn."','".$bookedition."', '".$bookauthor."','".$booktotal."','".$booktotal."','".$bookshelf."')");
        return true;
    }



