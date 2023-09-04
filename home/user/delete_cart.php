<?php
session_start();

// Check if the cart exists in the session
if (isset($_SESSION['cart'])) {
    // Remove the cart session variable
    unset($_SESSION['cart']);
    echo 'Cart details deleted successfully.';
} else {
    echo 'Cart details not found.';
}