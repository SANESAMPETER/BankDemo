<?php
// Start the session to access session variables
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the homepage (index.php)
header('Location: index.php');
exit();
?>
