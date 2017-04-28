
<?php
    include_once 'model/database.php';
    $q = $_GET['q'];
    $sql="SELECT * FROM lms_user WHERE user_name = '".$q."'";
    $result = mysqli_query(getConnectionName(),$sql);

    if($row = mysqli_fetch_array($result)) {
        echo '<p>Name : ' . $row['user_fname']. " " . $row['user_lname'] . '</p>';
        echo '<p>Email : ' . $row['user_email']. '</p>';
        echo '<p>Phone : ' . $row['user_phone']. '</p>';
        echo '<input type="text" placeholder="Insert Book ID" name="bookid" onchange="showBook(this.value)"/>
            <div id="bookinfo"></div>';
    }
    else{
        echo '<div class="loginerror" id="dummy">
                     <p class="errortxt">User name Incorrect</p>
            </div>';
    }


?>