
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code here
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "redcross"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the table
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, query, mobile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $query, $mobile);

    // Set parameters and execute the statement
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['query'];
    $mobile = $_POST['mobile'];
    $stmt->execute();
    $sql = "SELECT city_name, address FROM city_data";

    // Perform the query
    $result = mysqli_query($conn, $sql);

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
    echo '<script>alert("Thank you! Our admin will contact you soon by email or mobile.");</script>';
    echo '<script>window.location.href = "#";</script>';

    // Redirect back to the same page after submission
    // header("Location: ".$_SERVER['PHP_SELF']);
    // exit();
}
?>


    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Cross Donor</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* CSS styles here */
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #f0f0f0;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .text-block {
            flex: 1;
            margin-right: 20px;
        }

        .text-title {
            font-size: 24px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .text-description {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        .image-block {
            flex: 1;
            text-align: center;
        }

        .image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        nav{
            background-color: #B73E3E;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000; 
        }
        nav ul{
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        nav li{
            height: 50px;
        }
        nav a{
            height: 100%;
            padding: 0 30px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: black;
        }
        nav a:hover{
            background-color: #f0f0f0;
        }
        nav li:first-child{
            margin-right: auto;
        }
        .sidebar{
            position: fixed;
            top: 0; 
            right: 0;
            height: 100vh;
            width: 250px;
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
            list-style: none;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }
        .sidebar li{
            width: 100%;
        }
        .sidebar a{
            width: 100%;
        }
        .menu-button{
            display: none;
        }
        @media(max-width: 800px){
            .hideOnMobile{
                display: none;
            }
            .menu-button{
                display: block;
            }
        }
        @media(max-width: 400px){
            .sidebar{
                width: 100%;
            }
        }

        /* cards */

      /* Add styles for the hover effect */
      .card {
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card .card-body {
    text-align: center;
}

.card .card-title {
    margin-bottom: 10px;
}

.card .address {
    color: #666;
}

.hidden {
    display: none;
}

        /* Read more button */

        .btn-read-more {
            position: relative;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-read-more::after {
            content: "Read more";
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 5px 0;
            background-color: #dc3545;
            color: #fff;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-read-more::after,
        .btn-read-less::after {
            content: attr(data-text);
        }

        .btn-read-more::after {
            content: "Read more";
        }

        .btn-read-less::after {
            content: "Read less";
        }

        /* Footer Styles */

        footer {
            background-color: #B73E3E;
            padding: 5px 0px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
           
            top: 0;
            z-index: 1000; 
        }
        footer h4 {
            color: #fff;
            font-size: 25px;
            margin-bottom: 5px;
            font-weight: 400;
            letter-spacing: 1px;
        }
        footer .footer-links {
            margin-bottom: 5px;
            margin-top: 5px;
        }
        footer a {
            color: #ccc;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
            font-size: 14px;
        }
        footer a:hover {
            color: #fff;
        }
        footer .social-icons a {
            font-size: 20px;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        footer .social-icons a:hover {
            color: #fff;
        }

        /* image slider */

        .slider-container {
            position: relative;
            max-width: 100%;
            height: 60vh;
            overflow: hidden;
            margin-top: 40px;
            margin-left: 40px;
            margin-right: 40px;
            border: 4px solid #B73E3E;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .slider {
            display: flex;
            transition: transform 0.3s ease;
        }

        .slider img {
            width: 100%;
            height: 60vh;
        }

        .prev-btn,
        .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }
       
        .hidden {
        display: none;}
    </style>
</head>
<body>
    <!-- Navbar with logo -->
    <nav>
        <ul class="sidebar">
            <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="admin/login.php">Admin</a></li>
            <li><a href="donor/login.php">Donor</a></li>
            <li><a href="patient/login.php">Patient</a></li>
            <li><a href="#center">Centers</a></li>

            <li><a href="find_donar.php">Find Donors</a></li>
        </ul>
        <ul>
            <li><a href="#"><h3>RedCross Donor</h3></a></li>
            <li class="hideOnMobile"><a href="index.php">Home</a></li>
            <li class="hideOnMobile"><a href="#about">About</a></li>
            <li class="hideOnMobile"><a href="#contact">Contact</a></li>
            <li class="hideOnMobile"><a href="admin/login.php">Admin</a></li>
            <li class="hideOnMobile"><a href="donor/login.php">Donor</a></li>
            <li class="hideOnMobile"><a href="patient/login.php">Patient</a></li>
            <li class="hideOnMobile"><a href="#center">Centers</a></li>
            <li class="hideOnMobile"><a href="find_donar.php">Find Donors</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
        </ul>
    </nav>
    <div class="container mg">
        <div class="text-block">
        <div class="text-title" style="font-size: 50px; color: red; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); animation: fadeInUp 1s ease-out;">
    Great ! You are right place
</div>
            <div class="text-description">
            There is nothing better than saving a life  Every blood donor is a hero, Read Blood Donation Facts
            </div>
        </div>
        <div class="image-block">
            <img class="image" src="images/hhh.png" alt="Placeholder Image">
        </div>
    </div>

    <!-- Image Slider -->
    <div class="slider-container">
        <div class="slider">
            <img src="../RedCross/images/slider1.jpg" alt="Slider 1">
            <img src="../RedCross/images/head.webp" alt="Slider 2">
            <img src="../RedCross/images/slider3.jpg" alt="Slider 3">
            <img src="../RedCross/images/s4.jpeg" alt="Slider 3">
        </div>
        <div class="prev-btn" onclick="prevSlide()">&#10094;</div>
        <div class="next-btn" onclick="nextSlide()">&#10095;</div>
    </div>

    <!-- Script for image slider -->
    <script>
        let slideIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.slider img');
            if (index >= slides.length) {
                slideIndex = 0;
            } else if (index < 0) {
                slideIndex = slides.length - 1;
            }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slides[slideIndex].style.display = 'block';
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }

        function prevSlide() {
            slideIndex--;
            showSlide(slideIndex);
        }

        // Auto slide after 5 seconds
        setInterval(() => {
            slideIndex++;
            showSlide(slideIndex);
        }, 5000);

        // Show first slide initially
        showSlide(slideIndex);
    </script>

    <!-- Content Section -->
 
    <div id="about" class="container-fluid" style="margin: 50px;">
 <!-- <h2 class="text-center">About us</h2> -->
        <div class="row container" style="text-align: justify;">
        
            <div class="col-md-8 mx-auto content-left">
                <h4>What is Blood Bank Management System?</h4>
                <p id="short-description">
                    The Blood Bank Management System (BBMS) is a cutting-edge software solution designed to simplify the management of blood donations, storage, and distribution in healthcare facilities. By digitizing manual processes and providing real-time visibility into blood inventory and donor records, BBMS helps blood banks optimize their operations, minimize errors, and ensure the timely availability of blood units for patients in need. Key features include donor management, inventory control, request and distribution tracking, and comprehensive reporting tools. With its intuitive interface and powerful functionalities, BBMS empowers blood bank administrators, healthcare professionals, donors, and patients alike to contribute to a safer, more efficient blood supply chain.
                </p>
                <button id="read-more-btn" class="btn btn-danger btn-read-more" onclick="toggleDescription()" data-text="Read more"></button>
                <p id="full-description" style="display: none;">
                    The Blood Bank Management System (BBMS) is a comprehensive software solution designed to streamline and automate the process of managing blood donations, storage, and distribution in blood banks and hospitals. With the aim of facilitating the efficient and timely availability of blood units to patients in need, BBMS offers a range of features and functionalities tailored to meet the specific requirements of blood bank administrators, healthcare professionals, donors, and patients.

                    At its core, BBMS provides a centralized platform for recording, tracking, and managing all aspects of the blood donation process. From donor registration and blood screening to inventory management and transfusion requests, the system ensures that every step is meticulously documented and executed in accordance with industry standards and regulatory guidelines. By digitizing these workflows, BBMS minimizes manual errors, reduces paperwork, and enhances overall operational efficiency.

                    One of the key components of BBMS is its donor management module, which allows blood banks to maintain a database of potential donors, their demographic information, medical history, and donation records. Through an intuitive user interface, administrators can schedule donation drives, send out notifications to eligible donors, and track donation statistics in real-time. Moreover, BBMS includes features for conducting pre-donation assessments, ensuring donor eligibility, and issuing donor cards for identification purposes.

                    In addition to donor management, BBMS offers robust inventory control capabilities to monitor the stock levels of different blood types, blood products, and related supplies. Using barcode scanning and RFID technology, blood bank staff can accurately record incoming donations, perform quality checks, and allocate blood units based on patient needs. Automated alerts and notifications help prevent stockouts and expiry of blood products, thereby ensuring the availability of safe and usable blood at all times.

                    Furthermore, BBMS facilitates seamless communication and collaboration between blood banks, hospitals, and other healthcare facilities through its integrated request and distribution module. Healthcare professionals can submit blood requisitions online, specifying the type and quantity of blood required for a particular patient. Upon receiving a request, blood bank staff can quickly locate matching blood units from the inventory and arrange for timely delivery to the requesting facility.

                    With its comprehensive reporting and analytics tools, BBMS empowers administrators to gain valuable insights into blood donation trends, usage patterns, and operational performance. Customizable dashboards and graphical representations enable data-driven decision-making, resource allocation, and strategic planning to optimize the efficiency and effectiveness of blood bank operations.

                    In summary, the Blood Bank Management System is a sophisticated yet user-friendly solution that revolutionizes the way blood banks manage their operations. By leveraging technology to automate processes, improve transparency, and enhance collaboration, BBMS plays a pivotal role in ensuring a safe, reliable, and accessible blood supply for patients in need.
                </p>
            </div>
            <div class="col-md-3 content-right">
                <img class="img-fluid" src="../redcross/images/image1.jpg" height="auto" width="70%">
            </div>
        </div>
    </div>
    
    <div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center align-items-center">
            <img src="../RedCross/images/how_donate.png" class="img-fluid" alt="Single Image">
        </div>
    </div>
</div>


    <!-- Cards Section -->
   
     
    <div class="container-fluid" style="margin-bottom: 5%;">
    <div class="row" id="center">
        <div class="col-10 m-auto">
            <h3>Our centers</h3>
           
            <div class="card-container" id="card-container">
                <?php
                    $servername = "localhost";
                    $username = "root"; // Your MySQL username
                    $password = ""; // Your MySQL password
                    $dbname = "redcross"; // Your MySQL database name
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to fetch data from city_data table
                    $sql = "SELECT state, city_name, address FROM city_data";
                    
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="card">';
                            echo '<div class="card-body">';
                            echo '<h4 class="card-title">' . $row['state'] . ' - ' . $row['city_name'] . '</h4>';
                            echo '<p class="address" style="color: white; text-align: center;">' . $row['address'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            $count++;
                        }
                        if (mysqli_num_rows($result) > 6) {
                            echo '<button id="showMoreButton" type="button" class="btn btn-primary mt-3" onclick="toggleCards()">Show More</button>';
                        }
                    } else {
                        echo "No centers found.";
                    }
                    
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    let extraCardsShown = false; // Variable to track if extra cards are shown
    let extraCards = document.querySelectorAll('.card:nth-child(n+7)'); // Select extra cards starting from 7th

    function toggleCards() {
        // Toggle the visibility of extra cards
        extraCards.forEach(card => {
            card.classList.toggle('hidden');
        });

        // Toggle the button text
        let buttonText = document.querySelector('#showMoreButton');
        buttonText.textContent = extraCardsShown ? 'Show More' : 'Show Less';

        extraCardsShown = !extraCardsShown;
    }

    // Initially hide extra cards
    extraCards.forEach(card => {
        card.classList.add('hidden');
    });
</script>



<!--  -->








<div class="container">
    <!-- <div class="text-center"> -->
        <!-- <h2>Find Nearest Store</h2> -->
        <button id="findStoreBtn" class="btn btn-primary" style="margin: auto; display: block; width: 70%; background-color: red;" onmouseover="this.style.backgroundColor='#007bff'" onmouseout="this.style.backgroundColor='red'">Find nearest center/store</button>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#findStoreBtn').click(function() {
            window.location.href = 'h.php';
        });
    });
</script>





    <!-- Contact Section -->
    <div id="contact" class="container-fluid bg-light" style="padding: 50px;">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h4>Contact Us</h4>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="query">Query</label>
        <textarea class="form-control" id="query" name="query" rows="3" placeholder="Enter your query"></textarea>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
            <div class="col-md-6 m-auto">
    <img class="img-contact" src="/RedCross/images/contact.jpeg" alt="Contact Image">
</div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <h4>Our Contacts</h4>
        <!-- <h5>6299945686 ,8271124764<br>singhsandeepkumar008@gmail.com</h5> -->
        <h5>6299945686 & 8271124764<br><a href="mailto:sourabhdewedi786@gmail.com">sourabhdewedi786@gmail.com</a><br><a href="mailto:singhsandeepkumar008@gmail.com">singhsandeepkumar008@gmail.com</a></h5>
        
        <div class="social-icons">
            <!-- Replace # with your actual social media links -->
            <a href="facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="text">
            <h3>Head Center</h3>
            <h5>Bhubaneswar Unit 6 front road</h5>
        </div>
        <div class="footer-links">
            <a href="#">About us</a>
            <a href="../RedCross/donor/login.php">Want to Donate Blood</a>
            <a href="../RedCross/patient/login.php">Looking For Blood</a>
            <a href="term.html">Terms & Condition</a>
            <a href="privacy.html">Privacy and Policy</a>
        </div>
        <div class="copy">
            <h6>Copyright © 2024 Department of health and family welfare, Govt Of Odisha. All Rights Reserved.   Maintained by : IT Section, NHM, Odisha</h6>
        </div>
    </footer>

    <!-- Script for sidebar functionality -->
    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>

    <!-- Script for read more/less functionality -->
    <script>
        function toggleDescription() {
            var shortDesc = document.getElementById("short-description");
            var fullDesc = document.getElementById("full-description");
            var readMoreBtn = document.getElementById("read-more-btn");

            if (shortDesc.style.display === "none") {
                shortDesc.style.display = "block";
                fullDesc.style.display = "none";
                readMoreBtn.textContent = "Read more";
            } else {
                shortDesc.style.display = "none";
                fullDesc.style.display = "block";
                readMoreBtn.textContent = "Read less";
            }
        }
    </script>
</body>
</html>

   
    







