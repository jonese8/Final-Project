<?php
#index.php - CS290, Emmalee Jones, Assignment Final Project
#Destroy all sessions
#Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');
session_start();
session_destroy();
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath);
$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
header("Location: {$redirect}/index.php", true);
die();
?>

