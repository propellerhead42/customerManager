<?php

session_start();

// Clear the session array after logout
$_SESSION = array();

session_destroy();

header('location: ../index.php');

?>