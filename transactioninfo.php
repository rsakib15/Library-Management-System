<?php
include_once 'model/database.php';
$q = intval($_GET['q']);

$sql="SELECT * FROM lms_books WHERE book_id = '".$q."'";
$result = mysqli_query(getConnectionName(),$sql);

if($row = mysqli_fetch_array($result)) {
    echo '<p>Title : ' . $row['book_name']. '</p>';
    echo '<p>ISBN : ' . $row['book_isbn']. '</p>';
    echo '<p>Edition : ' . $row['book_edition']. '</p>';
    echo '<p>Author : ' . $row['book_author']. '</p>';
    echo '<p>Total : ' . $row['book_total']. '</p>';
    echo '<p>Available : ' . $row['book_available']. '</p>';
    echo '<p>Shelf : ' . $row['book_self']. '</p>';


    if($row['book_available'] > '0'){
        echo '<button name="issue" value="issue">ISSUE BOOK</button>';
    }
    else{
        echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Sorry, Book Not Available</p>
            </div>';
    }
}
else{
    echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">Sorry, Book Not Found</p>
            </div>';
}




?>