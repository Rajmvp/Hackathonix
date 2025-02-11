<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();
?>
<script>
    // Clear the localStorage first
    localStorage.removeItem('theme');  // Remove the 'theme' preference from localStorage

    // Redirect to the login page after clearing localStorage
    window.location.href = "login.html";
</script>
