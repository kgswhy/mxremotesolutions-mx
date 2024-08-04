<?php
require 'db_connection.php'; // Koneksi ke database
require 'utilities.php';    // Untuk pembersihan input dan validasi lainnya
session_start();            // Memulai sesi jika diperlukan

/**
 * Fungsi untuk login admin
 *
 * @param string $email Email admin
 * @param string $password Kata sandi admin
 * @return bool Apakah login berhasil
 */
function admin_login($email, $password) {
    global $pdo; // Use the existing database connection

    $email = validate_input($email);  // Sanitize input
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);  // Get the result as an associative array

    if ($admin && password_verify($password, $admin['password'])) {
        // If login is successful, store login status in session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        return true; // Login successful
    } else {
        // If login fails, redirect to login page with an error message
        $error_message = "Invalid email or password.";
        header("Location: ./admin/login.php?error_message=" . urlencode($error_message));
        exit();
    }
}


function change_admin_password($email, $current_password, $new_password) {
    global $pdo;

    // Clean and validate input
    $email = validate_input($email);
    $current_password = validate_input($current_password);
    $new_password = validate_input($new_password);

    // Check if current password matches the one in the database
    $stmt = $pdo->prepare("SELECT password FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $hashed_password = $stmt->fetchColumn();

    if (!$hashed_password || !password_verify($current_password, $hashed_password)) {
        // Current password does not match
        return false;
    }

    // Hash the new password
    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $pdo->prepare("UPDATE admin SET password = :password WHERE email = :email");
    $stmt->bindParam(':password', $hashed_new_password);
    $stmt->bindParam(':email', $email);
    $result = $stmt->execute();

    if ($result) {
        return true; // Password changed successfully
    } else {
        return false; // Failed to update password
    }
}

function admin_logout() {
    session_unset(); // Menghapus semua variabel sesi
    session_destroy(); // Menghancurkan sesi
    header("Location: ../index.php"); // Arahkan ke halaman login
    exit();
}

/**
 * Fungsi untuk memeriksa apakah admin telah login
 *
 * @return bool True jika admin telah login, False jika belum
 */ 
function is_admin_logged_in() {
    return isset($_SESSION['admin_id']); // Cek apakah sesi admin_id ada
}


function can_access() {
    $allowed_user_ids = [2, 4, 5]; 
    
    return isset($_SESSION['admin_id']) && in_array($_SESSION['admin_id'], $allowed_user_ids);
}
