<div class="sidebar">
    <?php
        if ($_SESSION['user_type']=='student'){
            echo
            ' <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="borrowlist.php">Borrow History</a></li>
                <li><a href="searchbook.php">Search Book</a></li>
                <li><a href="myshelf.php">My Shelves</a></li>
                <li><a href="financial.php">Financial</a></li>
            </ul>';
        }
        else if ($_SESSION['user_type']=='admin'){
            echo
            ' <ul>
                <li><a href="dashboardadmin.php">Dashboard</a></li>
                <li><a href="issueebook.php">Issuee Book</a></li>
                <li><a href="returnbook.php">Return Book</a></li>
                <li><a href="searchbook.php">Search Book</a></li>
                <li><a href="addbook.php">Add New Books</a></li>
                <li><a href="updatebook.php">Update Books</a></li>
            </ul>';
        }
    ?>

</div>