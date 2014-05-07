<?php
session_start();
unset($_SESSION["pageview"]);
header("Location:index.php");
?>