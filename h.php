<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-brand img {
            height: 40px; /* Adjust height as needed */
            width: auto; /* Maintain aspect ratio */
        }
        footer {
            background-color: #b74444; /* Red Cross Red */
            color: white;
            text-align: center;
            padding: 20px;
            flex-shrink: 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .social-icons a {
            color: white;
            margin: 0 5px;
        }
        .footer-links {
            margin-top: 20px;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .terms-container {
            background-color: #f9f9f9; /* Light grey */
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .terms-container h2 {
            color: #a04143; /* Red Cross Red */
            margin-bottom: 20px;
            font-size: 24px;
        }
        .terms-container p {
            font-size: 16px;
        }
        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#">
        <h3 style="color: black;">RedCross Donor</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" style="color: black;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../RedCross/donor/login.php" style="color: black;">Donor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../RedCross/patient/login.php" style="color: black;">Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../RedCross/find_donar.php" style="color: black;">Find donor</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #B80000;">Find Nearest Store</h2>
        <div>
            <label for="state">Select State:</label>
            <?php
            include('../RedCross/includes/connection.php');

            // Query to fetch state names from the 'city_data' table
            $query = "SELECT DISTINCT state FROM city_data";
            $result = mysqli_query($connection, $query);
            ?>
            <select id="state" name="state" class="form-control" required>
                <option value="">Select State</option>
                <?php
                // Loop through the fetched state names and populate the select options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['state'] . '">' . $row['state'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div id="citySelection" style="display: none;">
        <div class="row" id="cityCards"></div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#state').change(function() {
            var state = $(this).val();
            if(state !== '') {
                $.ajax({
                    url: 'fetch_states.php',
                    type: 'GET',
                    data: {state: state},
                    dataType: 'json',
                    success: function(response) {
                        $('#cityCards').empty();
                        $.each(response, function(index, city) {
                            var card = '<div class="col-md-4 mb-4">' +
                                '<div class="card bg-danger">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title text-center">' + city.city_name + '</h5>' +
                                '<p class="card-text text-center">' + city.address + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            $('#cityCards').append(card);
                        });
                        $('#citySelection').show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities:', error);
                        alert('Error fetching cities. Please try again later.');
                    }
                });
            } else {
                $('#citySelection').hide();
            }
        });
    });
</script>
<!-- Footer -->
<footer>
        <h4>Our Contacts</h4>
        <div class="social-icons">
            <!-- Replace # with your actual social media links -->
            <a href="facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="footer-links">
            <a href="#">About us</a>
            <a href="../RedCross/donor/login.php">Want to Donate Blood</a>
            <a href="../RedCross/patient/login.php">Looking For Blood</a>
            <a href="term.html">Terms & Condition</a>
            <a href="privacy.html">Privacy and Policy</a>
        </div>
    </footer>

    <!-- Script for sidebar functionality -->
    <!-- <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script> -->


</body>
</html>
