<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "sample_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the submitted form
    $name = $_POST["name"];
    $mobilenumber = $_POST["numb"];
    $place = $_POST["place"];
    $occupation = $_POST["occupation"];

    // Perform database operation: Insert data into the database
    $sql = "INSERT INTO data_db (name, mobilenumber, place, occupation)
            VALUES ('$name', '$mobilenumber', '$place', '$occupation')";

    if ($conn->query($sql) === TRUE) {
        // Data was inserted into the local database successfully

        // URL to submit the form data
        $targetUrl = 'https://webhook.site/d7cc4ab1-8e5e-42e7-91e7-5fd8951e0519'; // Replace with the actual URL

        // Data to be sent in the POST request
        $postData = array(
            'name' => $name,
            'numb' => $mobilenumber,
            'place' => $place,
            'occupation' => $occupation
        );

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options for the POST request
        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_POST, true); // Set the request method to POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData)); // Encode POST data
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

        // Execute the cURL request and store the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
        } else {
            // Output the response
            echo 'Form data submitted successfully!<br>';
            echo 'Response from server:<br>';
            echo $response;
        }

        // Close the cURL session
        curl_close($ch);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
