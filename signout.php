<?php

// STANDARD PROGRAM (Temporary)

session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header('Location: index.php'); // Redirect to sign-in page
exit();
