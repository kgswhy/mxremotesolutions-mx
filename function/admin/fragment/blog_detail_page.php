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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Include TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/wlarffkvrfj1wuoh9swj281y6mwnrlz8zzmvdudso2qy009j/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- Include TinyMCE jQuery integration -->
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>

    
</head>

<body>
    <div class="container-fluid px-4">
        <a href="./blog_page.php" class="btn btn-secondary">Kembali</a>
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
                            <th>Image URL</th>
                            <th>Description</th>
                            <th>Detail Page</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($detail)) : ?>
                        <tr>
                            <td><?php echo $detail['id']; ?></td>
                            <td><?php echo $detail['title']; ?></td>
                            <td><?php echo $detail['section_title']; ?></td>
                            <td><?php echo $detail['image_url']; ?></td>
                            <td><?php echo $detail['content']; ?></td>
                            <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="<?php echo $post['id']; ?>"
                                        data-title="<?php echo $post['title']; ?>" data-image-url="<?php echo $post['image_url']; ?>"
                                        data-description="<?php echo $post['description']; ?>"
                                        data-detail-page="<?php echo $post['detail_page']; ?>">Edit</button>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="post" action="../../submit_edit_blog.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="mb-3">
                                <label for="edit-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit-title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="edit-image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit-description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-detail-page" class="form-label">Detail Page URL</label>
                                <input type="text" class="form-control" id="edit-detail-page" name="detail_page"
                                    required>
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

    <script>
        // Initialize TinyMCE in the modal textarea
        $('textarea#editDescription').tinymce({
            height: 500,
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | removeformat | help'
        });

        // Handle edit button click to show modal
        $(document).on('click', '.edit-post', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var imageUrl = $(this).data('image-url');
            var description = $(this).data('description');
            var detailPage = $(this).data('detail-page');

            $('#editPostModal #id').val(id);
            $('#editPostModal #title').val(title);
            $('#editPostModal #imageUrl').val(imageUrl);

            // Set content of TinyMCE editor
            $('textarea#editDescription').tinymce().setContent(description);

            $('#editPostModal').modal('show');
        });

        // Prevent jQuery UI dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root")
                .length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Include TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/wlarffkvrfj1wuoh9swj281y6mwnrlz8zzmvdudso2qy009j/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- Include TinyMCE jQuery integration -->
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>
</head>

<body>
    <div>

    </div>

    <button class="btn btn-primary edit-post">Edit</button>

    <!-- Modal -->
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPostForm">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="imageUrl" name="imageUrl">
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea id="editDescription">&lt;p&gt;Encoded HTML content&lt;/p&gt;</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize TinyMCE in the modal textarea
        $('textarea#editDescription').tinymce({
            height: 500,
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | removeformat | help'
        });

        // Handle edit button click to show modal
        $(document).on('click', '.edit-post', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var imageUrl = $(this).data('image-url');
            var description = $(this).data('description');
            var detailPage = $(this).data('detail-page');

            $('#editPostModal #id').val(id);
            $('#editPostModal #title').val(title);
            $('#editPostModal #imageUrl').val(imageUrl);

            // Set content of TinyMCE editor
            $('textarea#editDescription').tinymce().setContent(description);

            $('#editPostModal').modal('show');
        });

        // Prevent jQuery UI dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root")
                .length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
</body>

</html>
