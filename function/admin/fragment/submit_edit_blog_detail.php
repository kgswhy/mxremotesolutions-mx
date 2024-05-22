<?php
require '../../auth_function.php'; // Using authentication functions
require '../../blog_function.php'; // Including blog functions

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start session if not already started
}

// Check if admin is logged in
if (!is_admin_logged_in()) {
    header('Location: ../login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../../../img/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $imageUrl = 'img/' . basename($_FILES['image']['name']);
        } else {
            $_SESSION['error'] = "Failed to upload image.";
            header('Location: ./blog_page.php');
            exit();
        }
    } else {
        // Keep the existing image URL if no new file is uploaded
        $imageUrl = $_POST['image_url'];
    }

    // Update blog post details
    if (editBlogPostDetail($id, $title, $description, $imageUrl)) {
        $_SESSION['success'] = "Blog post updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update blog post.";
    }

    header('Location: ./blog_page.php');
    exit();
}
