<?php
// Include db_connection.php to initialize $pdo
require 'db_connection.php';
// Include blog_function.php to access the addPost() function
require 'blog_function.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $title = $_POST['title']; // Assuming title is passed via POST method
    $description = $_POST['description']; // Assuming description is passed via POST method
    $detail_page = $_POST['detail_page']; // Assuming detail_page is passed via POST method

    // Validate input (you can add more validation as needed)
    if (empty($title) || empty($description) || empty($detail_page) || !isset($_FILES['image'])) {
        echo "All fields are required.";
        exit;
    }

    // Handle file upload
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image_url = "img/" . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (optional)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Call the addPost() function to insert the new blog post into the database
            if (addPost($pdo, $title, $image_url, $description, $detail_page)) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Blog Added!',
                            text: 'The blog post has been added successfully.',
                            showConfirmButton: false,
                            timer: 1500 // Close automatically after 1.5 seconds
                        }).then(function() {
                            window.location = './admin/fragment/blog_page.php'; 
                        });
                    });
                </script>";
            } else {
                echo "Error adding blog post.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    // If the form is not submitted via POST method, redirect to the add form or display an error message
    echo "Invalid request.";
}
?>
