
<?php
    include_once 'model/database.php';
    $q = $_GET['q'];
    $sql="SELECT * FROM lms_books WHERE book_id = '".$q."'";
    $result = mysqli_query(getConnectionName(),$sql);

    if($row = mysqli_fetch_array($result)) {
        echo '<p>Phone : ' . $row['book_id']. '</p>';
    }
    else{
        echo '<div class="loginerror" id="dummy">
                         <p class="errortxt">User name Incorrect</p>
                </div>';
    }


?>