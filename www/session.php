<?php 

// Initialize session
session_start();

// Check, if pageview is NOT set then this page will jump to login page
if (!isset($_SESSION['pageview'])) {
header('Location: login.php');
}

?>