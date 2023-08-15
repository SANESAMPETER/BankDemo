<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the login form
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Validate the user input (You can add more validation here if needed)
    // Sanitize the inputs to prevent SQL injection
    $host = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "dbdetails";

    $conn = new mysqli($host, $username, $dbpassword, $dbname);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape and sanitize the inputs
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, validate password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // Login successful
            session_start();
            $_SESSION["user_name"] = $name; // Store user name in the session for future use
            echo "success";
        } else {
            // Incorrect password
            echo "error";
        }
    } else {
        // User not found
        echo "error";
    }

    // Close the database connection
    $conn->close();
}
?>
