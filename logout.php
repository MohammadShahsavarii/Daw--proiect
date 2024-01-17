<?php
session_start(); // Start the session

// Perform any additional logout logic or operations if needed

session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

header("Location: index.html"); // Redirect to the login page
exit();
?>
