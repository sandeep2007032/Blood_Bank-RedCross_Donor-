<?php 
session_start();
if(isset($_SESSION['email'])){
?>
<html>
    <head>
        <style>
            .donate-form{
                box-shadow: 3px 3px 3px gray;
                border-left: 1px solid gray;
                border-top: 1px solid gray;
                border-radius: 7px;
                padding: 7px;
            }
        </style>
    </head>
<body>
    <div class="row" style="margin-top: 4%;">
        <div class="col-md-3 m-auto donate-form">
        <center><h4>Blood Request Form</h4></center><br>
        <form action="" method="POST">
        <!-- <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
            <div class="form-group">
                <label for="units">No of Units:</label>
                <input type="text" class="form-control" name="units" placeholder="No of units (in ml)">
            </div><br>
            <div class="form-group">
                <label for="name">Blood Group:</label>
                <select name="bgroup" class="form-control" required>
                    <option value="">-Select-</option>
                    <option value="A">A</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B">B</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div><br>
            <div>
            <label for="city_name">city:</label>
            <?php
            include('../includes/connection.php');

            // Query to fetch state names from the 'states' table
            $query = "SELECT city_name FROM city_data";
            $result = mysqli_query($connection, $query);
            ?>
            <select id="city_name" name="city_name" required>
                <option value="">Select city</option>
                <?php
                // Loop through the fetched state names and populate the select options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['city_name'] . '">' . $row['city_name'] . '</option>';
                }
                ?>
            </select>
        </div><br>
            <div class="form-group">
                <label for="address">addresss:</label>
                <input type="location" class="form-control" name="address" placeholder="address">
            </div><br>
            <div class="form-group">
                <label for="">Reason</label>
                <textarea name="reason" cols="45" rows="3" class="form-control" placeholder="Mention the reason"></textarea>
            </div><br>
            <input type="submit" class="btn btn-danger" name="request_blood" value="Request">
        </form>
        </div>
    </div>
</body>
</html>
<?php 
}
else{
    header('Location:login.php');
}
?>