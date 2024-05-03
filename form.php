<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
</head>
<body>
    <h2>Add City</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="city">city:</label>
            <?php
            include('../RedCross/includes/connection.php');

            // Query to fetch state names from the 'states' table
            $query = "SELECT city_name FROM city_data";
            $result = mysqli_query($connection, $query);
            ?>
            <select id="city" name="city" required>
                <option value="">Select city</option>
                <?php
                // Loop through the fetched state names and populate the select options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['city_name'] . '">' . $row['city_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <!-- <div>
            <label for="city_name">City Name:</label>
            <input type="text" id="city_name" name="city_name" required>
        </div> -->
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
