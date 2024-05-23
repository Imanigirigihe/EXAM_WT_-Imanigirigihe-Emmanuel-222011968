<?php 
//call the file that contain database connection
include"dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $tid = $_GET["tid"];

    // Read the row of the selected transaction from the database
    $sql = "SELECT * FROM transaction WHERE tid=$tid";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userid = $row["userid"];
        $revenueid = $row["revenueid"];
    } else {
        header("location: /my project/transaction_table.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tid = $_POST["tid"];
    $userid = $_POST["userid"];
    $revenueid = $_POST["revenueid"];

    if (empty($tid) || empty($userid) || empty($revenueid)) {
        echo "All feild are required!";
    }else {
        $sql = "UPDATE transaction SET tid='$tid', userid='$userid', revenueid='$revenueid' WHERE tid='$tid'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:/my project/transaction_table.php");
    }else {
        echo "Error updating record: " . $connection->error;
    
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script>
        function confirmUpdate() {
            return confirm('Do you want to update this record!');
        }
    </script>
   <style>
        h2{
            font-family:Castellar;
            color: darkblue;
        }
        label{
            font-family: elephant;
            font-size: 20px;
        }
        .sb{
            font-family:Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;

        }

        .input{
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
        footer{
    height: 50px;
    text-align: center;
    padding: 25px;
    color: white;
    background-color: blue;
}

    </style> 
</head>
<body>
<center>
    
    <h2>food truck system </h2>
    <h3 style="color:green;">UPDATE TRANSACTION HERE</h3>
     <!-- section that contain form that help to update manager information-->
    <form method="POST" onsubmit="return confirmUpdate();">
    <label>Transaction Id</label><br>
    <input type="text" name="tid" readonly class="input" value="<?php echo $tid; ?>"><br>
     <label>User Id</label><br>
    <input type="text" name="userid"  class="input" value="<?php echo $userid; ?>"><br>
    <label>Revenue Id</label><br>
    <input type="text" name="revenueid" class="input" value="<?php echo $revenueid; ?>"><br>
    <input type="submit" name="submit" value="Update" class="sb"> 
</form>

</section>
</center>
        <footer><!-- Footer section -->
            <p><h1>emmanuel 2024 UR CBE BIT YEAR 2 @ Group 3</h1></p><!-- Copyright and trademark notice -->
        </footer><!-- Footer section -->
    </body>
    </html>