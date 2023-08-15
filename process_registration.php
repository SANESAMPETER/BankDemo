<?php
// Include the database connection
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $aadhar = $_POST['aadhar'];
    $pin = $_POST['pin'];
    $pan = $_POST['pan'];
    $voter = $_POST['voter'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $initial_deposit = $_POST['initial_deposit'];

    // Perform basic validation
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the users table
    $insert_query = "INSERT INTO users (name, phone, aadhar_card, pin, pan_card, voter_id, password, balance)
                     VALUES ('$name', '$phone', '$aadhar', '$pin', '$pan', '$voter', '$hashed_password', $initial_deposit)";

    if (mysqli_query($connection, $insert_query)) {
        // Registration successful
        echo "<script>alert('Registration successful. You can now login.');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    } else {
        // Error occurred during registration
        echo "<script>alert('Registration failed. Please try again later.');</script>";
        echo "<script>window.location.replace('register.php');</script>";
    }

    session_start();

    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    // Redirect to accountcreated.php to display the message
    header("Location: accountcreated.php");
    exit();

    // Close the database connection
    mysqli_close($connection);
}
?>
