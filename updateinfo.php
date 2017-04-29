
<?php
    include_once 'model/database.php';
    $q=$_GET['q'];
    $sql="SELECT * FROM lms_books WHERE book_id = '".$q."'";
    $result = mysqli_query(getConnectionName(),$sql);

    if($row = mysqli_fetch_array($result)) {
        echo '<label for="bookname" text-align="left">Book Name</label>';
        echo '<input type="text" value="'. $row['book_name'] .'" name="bookname" />';
        echo '<label for="bookisbn" text-align="left">Book ISBN</label>';
        echo '<input type="text" value="'. $row['book_isbn'] .'" name="bookisbn" />';
        echo '<label for="bookedition" text-align="left">Book Edition</label>';
        echo '<input type="text" value="'. $row['book_edition'] .'" name="bookedition" />';
        echo '<label for="bookauthor" text-align="left">Book Author</label>';
        echo '<input type="text" value="'. $row['book_author'] .'" name="bookauthor" />';
        echo '<label for="bookcopy" text-align="left">Book Copy</label>';
        echo '<input type="text" value="'. $row['book_total'] .'" name="booktotal" />';
        echo '<label for="bookshelf" text-align="left">Book Shelf</label>';
        echo '<input type="text" value="'. $row['book_self'] .'" name="bookshelf" />';
        echo '<button name="submit" value="update">UPDATE BOOK</button>';
    }
    else{
        echo '<div class="loginerror" id="dummy">
                         <p class="errortxt">Book ID Incorrect</p>
                </div>';
    }


?>