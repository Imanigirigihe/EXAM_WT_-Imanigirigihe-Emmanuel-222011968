<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmInsert() {
            return confirm('Are you sure you want to Insert this record?');
        }
    </script>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
      <a href="home.html" style="background-color: blue; border-radius: 8px; color:white; padding: 15px; margin-left: 10px; margin-top: 500px;"> Back Home</a><br>
    <form action="home.html">
          
    <div class="container">
        </form>
    <div class="container">
        <h1 class="text-center"><u>User Form</u></h1>
        <form action="user_table.php" method="POST" form method="POST" onsubmit="return confirmInsert();">
            <div class="form-group">
                <label for="uid">ID</label>
                <input type="number" class="form-control" name="uid" id="uid">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="form-group">
                <label for="tin_number">Tin Number</label>
                <input type="number" class="form-control" name="tin_number" id="tin_number">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="registration_date">Registration Date</label>
                <input type="date" class="form-control" name="registration_date" id="registration_date">
            </div>
            <div class="form-group">
                <label for="agid">Agent Id</label>
                <select id="agid" class="form-control" name="agent_id">
                    <?php
                    include "dbconnection.php";
                    $sql="SELECT agid, last_name FROM agent";
                    $result=$connection->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $agid=$row['agid'];
                            $last_name=$row['last_name'];
                            echo "<option value=\"$agid\">$agid $last_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">INSERT</button>
        </form>
        
    </div>
    <footer class="text-center mt-5"><!-- Footer section -->
        <p>emmanuel 2024 UR CBE BIT YEAR 2 @ Group 3</p><!-- Copyright and trademark notice -->
    </footer><!-- Footer section -->

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
