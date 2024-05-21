<?php
// Include db_connection.php to initialize $pdo
require 'db_connection.php';
// Include blog_function.php to access the editPost() function
require 'blog_function.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id = $_POST['id']; // Assuming id is passed via POST method
    $title = $_POST['title']; // Assuming title is passed via POST method
    $description = $_POST['description']; // Assuming description is passed via POST method
    $detail_page = $_POST['detail_page']; // Assuming detail_page is passed via POST method

    // Validate input (you can add more validation as needed)
    if (empty($id) || empty($title) || empty($description) || empty($detail_page)) {
        echo "All fields are required.";
        // Handle invalid input (e.g., redirect back to the edit form with an error message)
        exit;
    }

  // Check if an image file is uploaded
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $upload_path = '../img/' . $image_name; // Ubah path penyimpanan gambar
    // Move uploaded image to the destination folder
    if (move_uploaded_file($image_tmp, $upload_path)) {
        $image_url = 'img/' . $image_name; // Simpan path relatif ke gambar
    } else {
        echo "Failed to upload image.";
        exit;
    }
} else {
    // If no image file is uploaded, retain the existing image URL
    $image_url = $_POST['existing_image']; // Assuming existing_image is passed via POST method
}

    // Call the editPost() function to update the blog post
    if (editPost($pdo, $id, $title, $image_url, $description, $detail_page)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Blog Updated!',
                    text: 'The blog post has been updated successfully.',
                    showConfirmButton: false,
                    timer: 1500 // Tutup otomatis setelah 1.5 detik
                }).then(function() {
                    window.location = './admin/fragment/blog_page.php'; 
                });
            });
        </script>";
    } else {
        echo "Error updating blog post.";
        // Handle the error (e.g., redirect back to the edit form with an error message)
    }
} else {
    // If the form is not submitted via POST method, redirect to the edit form or display an error message
    echo "Invalid request.";
}
?>
