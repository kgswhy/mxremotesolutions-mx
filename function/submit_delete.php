<?php
// Include db_connection.php to initialize $pdo
require 'db_connection.php';
// Include blog_function.php to access the deletePost() function
require 'blog_function.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id = $_POST['id']; // Assuming id is passed via POST method

    // Validate input (you can add more validation as needed)
    if (empty($id)) {
        echo "ID is required.";
        // Handle invalid input (e.g., redirect back to the previous page with an error message)
        exit;
    }

    // Call the deletePost() function to delete the blog post
    if (deletePost($pdo, $id)) {
        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Blog Deleted!',
                text: 'The blog post has been deleted successfully.',
                showConfirmButton: false,
                timer: 1500 // Close automatically after 1.5 seconds
            }).then(function() {
                window.location = './admin/fragment/blog_page.php'; 
            });
        });
    </script>";
    } else {
        echo "Error deleting blog post.";
        // Handle the error (e.g., redirect back to the previous page with an error message)
    }
} else {
    // If the form is not submitted via POST method, redirect to the previous page or display an error message
    echo "Invalid request.";
}
?>
