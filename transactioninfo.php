<?php
    include_once 'model/database.php';
    $q = intval($_GET['q']);

    $sql="SELECT * FROM lms_issue WHERE issue_id = '".$q."'";
    $result = mysqli_query(getConnectionName(),$sql);


    if($row = mysqli_fetch_array($result)) {
        echo '<p>Issue No : ' . $row['issue_id']. '</p>';
        echo '<p>Issue Date : ' . date('d/m/Y',$row['issue_date']) . '</p>';

        $fine = ($row['return_date']-$row['issue_date'])/86400;

        if($fine>7){
            $fine= $fine*15;
        }
        else{
            $fine= 0;
        }
        $fine= round($fine);

        echo '<p>Fine : ' . $fine. ' Taka</p>';
        echo '<br>';
        echo '<p>Book ID : ' . $row['book_id']. ' </p>';
        echo '<p>Title : ' . $row['user_id']. '</p>';
        echo '<p>Author : ' . date('d/m/Y',$row['issue_date']) . '</p>';
        echo '<p>Edition : ' . $row['return_date']. '</p>';
        echo '<button name="submit" value="return">Return BOOK</button>';
    }

    else{
        echo '<div class="loginerror" id="dummy">
                <p class="errortxt">Sorry,Transaction ID Not Found</p>
             </div>';

        }
?>