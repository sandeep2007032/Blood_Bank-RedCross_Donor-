<?php
session_start();
if(isset($_SESSION['email'])){
include('../includes/connection.php');
$query = "select * from donation where donor_id = $_SESSION[uid]";
$query_run = mysqli_query($connection,$query);
$total_request = mysqli_num_rows($query_run);

$query = "select * from donation where donor_id = $_SESSION[uid] AND status = 1";
$query_run = mysqli_query($connection,$query);
$request_acc = mysqli_num_rows($query_run);

$query = "select * from donation where donor_id = $_SESSION[uid] AND status = 2";
$query_run = mysqli_query($connection,$query);
$request_rej = mysqli_num_rows($query_run);

$query = "select * from donation where donor_id = $_SESSION[uid] AND status = 1";
$query_run = mysqli_query($connection,$query);
$total_donation = 0;
while($row = mysqli_fetch_assoc($query_run)){
    $total_donation = $total_donation + number_format($row['no_units']);
}
if(isset($_POST['donate_submit'])){
    $query = "insert into donation values(null,$_SESSION[uid],'$_POST[bgroup]','$_POST[units]','$_POST[location]','$_POST[disease]',0)";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
              alert('Data submitted successfully...');
            window.location.href = 'donor_dashboard.php';  
          </script>";
    }
    else{
        echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'donor_dashboard.php';
          </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- jQuery file -->
    <script src="../includes/juqery_latest.js"></script>
   
    
    <style>
        body{
            background-color: #EFF5F5;
        }
        .info_card{
            box-shadow: 3px 3px 3px gray;
            height:200px;
            border-left:2px solid gray;
            border-top:2px solid gray;
            padding-top:4%;
            padding-left:3%;
            margin:2%;
            border-radius:3%;  
        }

        .info_card:hover{
            box-shadow: 3px 3px 3px gray;
            height:200px;
            border-left:2px solid gray;
            border-top:2px solid gray;
            padding-top:4%;
            padding-left:3%;
            margin:2%;
            border-radius:3%;
            height: 210px;
            font-size: large; 
        }

         .navbar-brand, .nav-link {
            color: white;
        } 

        /* #footer {
            color: white;
            text-align: center;
        } */ */

    </style>
   
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#donate").click(function(){
            $("#main-container").load("donate.php");
            });
        });

        $(document).ready(function(){
            $("#requests").click(function(){
            $("#main-container").load("request.php");
            });
        });
    </script>

    
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">RedCross Donor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="donor_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="donate">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="requests">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="certificate.php" target="_blank">Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row" id="main-container">
            <div class="col-lg-2 col-md-4 col-sm-6 info_card">
                <h5 class="text-danger">Blood donated</h5>
                <b>Total: <?php echo $total_donation; ?> Units</b>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 info_card">
                <h5 class="text-danger">Total Requests</h5>
                <b>Total: <?php echo $total_request; ?></b>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 info_card">
                <h5 class="text-danger">Request Pending</h5>
                <b>Total: <?php echo $total_request - $request_acc - $request_rej; ?></b>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 info_card">
                <h5 class="text-danger">Request Accepted</h5>
                <b>Total: <?php echo $request_acc; ?></b>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 info_card">
                <h5 class="text-danger">Request Rejected</h5>
                <b>Total: <?php echo $request_rej; ?></b>
            </div>
        </div>
    </div>
   
    
</body>
</html>


<?php
}
else{
    header('Location:login.php');
}