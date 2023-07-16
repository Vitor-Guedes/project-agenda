<?php

session_start();

// Clear the Message
if (isset($_SESSION['message'])) {
    $printMessage = $_SESSION['message'];
    $_SESSION['message'] = '';
}