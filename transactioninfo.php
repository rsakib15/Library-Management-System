<?php
    include_once 'model/database.php';
    $q = intval($_GET['q']);

    $sql="SELECT lms_issue.issue_id,lms_issue.book_id,lms_issue.user_id,lms_issue.issue_date,lms_issue.return_date,lms_issue.status,lms_books.book_name,lms_books.book_isbn,lms_books.book_edition,lms_books.book_author,lms_user.user_name,lms_user.user_fname,lms_user.user_lname,lms_user.user_email FROM lms_issue,lms_books,lms_user WHERE lms_issue.book_id=lms_books.book_id AND lms_issue.user_id=lms_user.user_id AND lms_issue.issue_id = '" . $q . "'";

    $result = mysqli_query(getConnectionName(),$sql);


    if($row = mysqli_fetch_array($result)) {
        echo '<h3>Book Information</h3>';
        echo '<p>Book ID : ' . $row['book_id']. ' </p>';
        echo '<p>Title : ' . $row['book_name']. '</p>';
        echo '<p>Author : ' . $row['book_author']. '</p>';
        echo '<p>ISBN : ' . $row['book_isbn']. '</p>';
        echo '<p>Edition : ' . $row['book_edition']. '</p>';


        echo '<br>';
        echo '<h3>User Information</h3>';
        echo '<p>Name : ' . $row['user_name'] . '</p>';
        echo '<p>Username : ' . $row['user_fname'] . $row['user_lname'] . '</p>';
        echo '<p>Name : ' . $row['user_email'] . '</p>';

        echo '<br>';

        $fine = ($row['return_date']-$row['issue_date'])/86400;

        if($fine>7){
            $fine= $fine*15;
        }
        else{
            $fine= 0;
        }
        $fine= round($fine);

        echo '<br>';

        echo '<h1 style="text-align: center; padding : 30px 0px"><b>Fine : ' . $fine. ' Taka</b></h1>';
        echo '<button name="submit" value="return">Return BOOK</button>';
    }

    else{
        echo '<div class="loginerror" id="dummy">
                <p class="errortxt">Sorry,Transaction ID Not Found</p>
             </div>';

        }
?>