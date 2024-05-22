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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch blog post details using the function
    $details = getBlogPostDetails($id);

    // Check if details exist
    if (!empty($details)) {
        $detail = $details[0]; // Take the first result assuming there's only one detail per post
    } else {
        // Handle case when details are not found
        // For example, redirect back to blog listing page
        header('Location: blog.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions - Blog Management</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Include TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/wlarffkvrfj1wuoh9swj281y6mwnrlz8zzmvdudso2qy009j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="d-flex">
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                <strong>Profile</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Blog Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Blog</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Blog Posts
            </div>
            <div class="card-body">
                <table id="blogTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Section Title</th>
                            <th>Image URL</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($detail)) : ?>
                        <tr>
                            <td><?php echo $detail['id']; ?></td>
                            <td><?php echo $detail['title']; ?></td>
                            <td><?php echo $detail['section_title']; ?></td>
                            <td><?php echo $detail['image_url']; ?></td>
                            <td><?php echo $detail['content']; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm edit-post" data-bs-toggle="modal"
                                    data-bs-target="#editModal" data-id="<?php echo $detail['id']; ?>"
                                    data-title="<?php echo $detail['title']; ?>"
                                    data-image-url="<?php echo $detail['image_url']; ?>"
                                    data-description="<?php echo htmlspecialchars($detail['content']); ?>"
                                    data-detail-page="<?php echo $detail['section_title']; ?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="post" action="./submit_edit_blog_detail.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <input type="hidden" name="image_url" id="edit-image-url">
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="edit-image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="edit-image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit-description" name="description" rows="10" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../lib/wow/wow.min.js"></script>
    <script src="../../../lib/easing/easing.min.js"></script>
    <script src="../../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../js/main.js"></script>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
       $(document).ready(function () {
    // Initialize TinyMCE in the modal textarea
    tinymce.init({
        selector: '#edit-description',
        height: 300,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });

    // Handle edit button click to show modal
    $(document).on('click', '.edit-post', function () {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var imageUrl = $(this).data('image-url');
        var description = $(this).data('description');

        $('#edit-id').val(id);
        $('#edit-title').val(title);
        $('#edit-image-url').val(imageUrl);

        // Clear and reset the file input
        $('#edit-image').val('');

        // Set content of TinyMCE editor
        tinymce.get('edit-description').setContent(description);

        $('#editModal').modal('show');
    });

    // Handle form submission to ensure TinyMCE content is included
    $('#edit-form').on('submit', function (event) {
        // Update the textarea with the content from TinyMCE before submitting
        var description = tinymce.get('edit-description').getContent();
        $('#edit-description').val(description);
        
        // Validate TinyMCE content
        if (!description.trim()) {
            // If TinyMCE content is empty, prevent form submission
            event.preventDefault();
            alert('Description cannot be empty!');
        }
    });
});
    </script>
</body>
</html>
