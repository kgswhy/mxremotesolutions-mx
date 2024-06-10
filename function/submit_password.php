<?php
require 'auth_function.php'; // Using authentication functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_SESSION['admin_email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error_message = "New password and confirm password do not match.";
        header("Location: ./admin/fragment/change_password.php?error_message=" . urlencode($error_message));
        exit();
    } else {
        if (change_admin_password($email, $current_password, $new_password)) {
            $success_message = "Password changed successfully.";
            // Redirect to login page after successful password change
            header("Location: ./admin/login.php?success_message=" . urlencode($success_message));
            exit();
        } else {
            $error_message = "Current password is incorrect.";
            header("Location: ./admin/fragment/change_password.php?error_message=" . urlencode($error_message));
            exit();
        }
    }
}
?>
