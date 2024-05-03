<?php
// Include database connection
include('../RedCross/includes/connection.php');

// Check if the 'state' parameter is set in the GET request
if(isset($_GET['state'])) {
    // Sanitize the input to prevent SQL injection
    $state = mysqli_real_escape_string($connection, $_GET['state']);

    // Query to fetch cities by state
    $query = "SELECT city_name, address FROM city_data WHERE state = '$state'";
    $result = mysqli_query($connection, $query);

    // Check if there are any cities found
    if(mysqli_num_rows($result) > 0) {
        $cities = array();

        // Fetch and store city data in an array
        while($row = mysqli_fetch_assoc($result)) {
            $city = array(
                'city_name' => $row['city_name'],
                'address' => $row['address']
            );
            $cities[] = $city;
        }

        // Return city data in JSON format
        echo json_encode($cities);
    } else {
        // If no cities found for the selected state, return an empty array
        echo json_encode(array());
    }
} else {
    // If 'state' parameter is not set, return an empty array
    echo json_encode(array());
}

// Close database connection
mysqli_close($connection);
?>
