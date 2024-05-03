<?php
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
    $stmt = $conn->prepare("INSERT INTO city_data ( state,city_name, address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$state ,$city_name, $address);

    // Set parameters and execute the statement
    $state = $_POST['state'];
    $city_name = $_POST['city_name'];
    $address = $_POST['address'];
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form page after submission
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            float: left;
            width: calc(70% - 20px); /* Adjust width for smaller screens */
            padding: 20px;
            box-sizing: border-box;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .image-container {
            float: right;
            width: calc(30% - 20px); /* Adjust width for smaller screens */
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            border-radius: 10px;
        }
        @media (max-width: 768px) {
            form, .image-container {
                width: 100%;
                float: none;
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add City</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <label for="state">State:</label>
                <select id="state" name="state" required>
                    <option value="">Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Odisha">Odisha</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Telangana">Telangana</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div>
                <label for="city_name">City Name:</label>
                <input type="text" id="city_name" name="city_name" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <button type="submit">Submit</button>
           
        </form>
        <div class="image-container">
            <img src="/RedCross/images/city.png" alt="City Image">
        </div>
    </div>
    
</body>
</html>

