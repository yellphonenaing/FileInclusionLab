<?php
session_start();

// Get the theme from the URL
$selectedTheme = $_GET['theme'] ?? 'light';

// Store it in the Session
$_SESSION['theme'] = $selectedTheme;

// Redirect back to the referring page or home
header("Location: /index.php");
exit();
