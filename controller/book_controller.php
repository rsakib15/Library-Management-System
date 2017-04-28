<?php
    session_start();
    $op= $_REQUEST['submit'];
    switch ($op){
        case 'addbook':
            include_once "../model/book_model.php";

            $bookname= $_POST['bookname'];
            $bookisbn=$_POST['bookisbn'];
            $bookedition=$_POST['bookedition'];
            $bookauthor=$_POST['bookauthor'];
            $booktotal=$_POST['booktotal'];
            $bookshelf=$_POST['bookshelf'];

            if($bookname!="" && $bookedition!="" && $bookisbn!="" && $booktotal!="" && $bookshelf!="" && is_numeric($booktotal)){
                if(add_book($bookname,$bookisbn,$bookedition,$bookauthor,$booktotal,$bookshelf)){
                    Header( 'Location: ../addbook.php?success=1' );

                }
                else{
                    Header( 'Location: ../addbook.php?failed=1' );
                }
            }
            else{
                Header( 'Location: ../addbook.php?failed=1' );
            }
            break;

        case 'issue':
            include_once "../model/book_model.php";

            $username= $_POST['username'];
            $bookid=$_POST['']


    }