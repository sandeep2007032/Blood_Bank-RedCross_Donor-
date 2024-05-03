<?php 
    session_start();
    if(isset($_SESSION['email'])){
        include('../includes/connection.php');

        if(isset($_POST['update_city'])){
            $id = $_POST['id'];
            $state = $_POST['state'];
            $city_name = $_POST['city_name'];
            $address = $_POST['address'];
            
            $query = "UPDATE city_data SET  city_name = '$city_name', address = '$address' WHERE id = $id";
            $query_result = mysqli_query($connection, $query);
            
            if($query_result){
                echo "<script type='text/javascript'>
                        alert('City updated successfully...');
                        window.location.href = 'admin_dashboard.php';  
                    </script>";
            }
            else{
                echo "<script type='text/javascript'>
                        alert('Error... Please try again.');
                        window.location.href = 'admin_dashboard.php';
                    </script>";
            }
        }

        $id = $_GET['did'];
        $query = "SELECT * FROM city_data WHERE id = $id";
        $query_run = mysqli_query($connection, $query);

        if(mysqli_num_rows($query_run) > 0){
            $row = mysqli_fetch_assoc($query_run);
            $state = $row['state'];
            $city_name = $row['city_name'];
            $address = $row['address'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- jQuery file -->
    <script src="../includes/juqery_latest.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #dc3545; /* Change color as needed */
            color: white;
            padding: 15px 0;
        }
        .navbar-brand {
            color: white;
        }
        .container-fluid {
            padding: 20px;
        }
        .col-md-4 {
            margin: auto;
            margin-top: 50px;
        }
        h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #dc3545; /* Change color as needed */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #c82333; /* Change color as needed */
        }
    </style>
</head>
<body>
<nav class="navbar" style="background-color: #dc3545; color: white; padding: 15px 0;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color: white;">RedCross Donar</a>
        </div>
        <div style="color: white;">
            <strong>Name: </strong> <?php echo $_SESSION['name'];?>
        </div>
        <ul class="nav navbar" style="margin-bottom: 0; display: flex; align-items: center;">
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" href="admin_dashboard.php" style="color: white;">Dashboard</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="donors_list" style="color: white;">Donors</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="add_city" style="color: white;">Add City</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="city_list" style="color: white;">City</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="patients_list" style="color: white;">Patients</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="manage_donation" style="color: white;">Donations</a>
            </li>
            <li class="nav-item" style="margin-right: 10px;">
                <a class="nav-link" id="manage_requests" style="color: white;">Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php" style="color: white;">Logout</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h4>Edit City</h4>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label for="city_name">City Name:</label>
                        <input type="text" id="city_name" name="city_name" value="<?php echo $city_name; ?>" required>
                    </div>
                    <div>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
                    </div>
                    <button type="submit" name="update_city">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
        }
    }
    else{
        header('Location:login.php');
    }
?>
