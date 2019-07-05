<!DOCTYPE HTML>
<?php
session_start();
?>
<html>
    <head>
        <title>Orders</title>
        <link rel="stylesheet" href="fooditems2.css">
        <link rel="stylesheet" href="https:fonts.googleapis.com/css?family=Josefin+Sans">
    </head>
    <body>
        <div class="main">
            <div class="wrapper">
                <p>
                    Hello,
                    <?php
                        $username = $_SESSION["username"];
                        echo "$username";
                    ?>
                            
                </p>
                <header>
                    <h1>Orders</h1>
                </header>
                <div class="container">

                    <a href="admin.php">Back to Landing Page</a>
                    <?php
                        require('dbconnect.php');
                        $sql = "SELECT * FROM orders";
                        $row = getData($sql);
                        $rowLength = count($row);
                        echo "<table>";
                        echo "<tr><th>ID</th><th>User ID</th><th>Date</th><th>Amount</th><th>Status</th><th>Edit Status</th></tr>";
                        for($i = 0; $i < $rowLength; $i++){
                            $id = $row[$i]["id"];
                            $userid = $row[$i]["user_id"];
                            $date = $row[$i]["date_created"];
                            $amount = $row[$i]["amount"];
                            $status = $row[$i]["status"];
                            
                            echo "<tr>
                                    <td>$id</td>
                                    <td>$userid</td>
                                    <td>$date</td>
                                    <td>$amount</td>
                                    <td>$status</td>
                                    <td><a href='edit.php?id=$id'>Edit</a></td>
                                    </tr>";
                            
                        }
                        echo "</table>";
                    ?>
                </div>
            </div>
        </div>
        
    </body>
</html>