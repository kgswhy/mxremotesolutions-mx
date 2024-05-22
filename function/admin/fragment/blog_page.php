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

$posts = getPosts();
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
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">
                        <i class="bi bi-house"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="company.php" class="nav-link text-white">
                        <i class="bi bi-building"></i>
                        Company
                    </a>
                </li>
                <li class="nav-item btn-group">
                    <a href="worker.php" class="btn btn-link nav-link text-white">
                        <i class="bi bi-people"></i>
                        Worker
                    </a>
                    <button type="button"
                        class="btn btn-link nav-link text-white dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="interview.php">Interview</a></li>
                        <li><a class="dropdown-item" href="#">Menu Item 2</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Menu Item 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="blog_page.php" class="nav-link text-white active">
                        <i class="bi bi-journal"></i>
                        Blog
                    </a>
                </li>
            </ul>


            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">
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
                                <th>Image URL</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post['image_url']; ?></td>
                                <td><?php echo $post['description']; ?></td>
                                <td>
                                    <a href="blog_detail_page.php?id=<?php echo $post['id']; ?>"
                                        class="btn btn-info btn-sm">View</a>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="<?php echo $post['id']; ?>"
                                        data-title="<?php echo $post['title']; ?>" data-image-url="<?php echo $post['image_url']; ?>"
                                        data-description="<?php echo $post['description']; ?>"
                                        data-detail-page="<?php echo $post['detail_page']; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        onclick="setDeleteId(<?php echo $post['id']; ?>)">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>
            </div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add New Post</button>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this blog post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="post" action="../../submit_add_blog.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="add-title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="add-image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-description" class="form-label">Description</label>
                                <textarea class="form-control" id="add-description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="add-detail-page" class="form-label">Detail Page URL</label>
                                <input type="text" class="form-control" id="add-detail-page" name="detail_page"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
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
                                <input type="file" class="form-control" id="edit-image" name="image" rbloequired>
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

        <!-- Initialize DataTables -->
        <script>
            let deleteId = null;

            function setDeleteId(id) {
                deleteId = id;
            }

            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                if (deleteId) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '../../submit_delete.php';

                    const idInput = document.createElement('input');
                    idInput.type = 'hidden';
                    idInput.name = 'id';
                    idInput.value = deleteId;

                    form.appendChild(idInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
            $(document).ready(function() {
                var table = $('#blogTable').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "pageLength": 5,
                });

                // Populate edit modal with selected post data
                $('#editModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var title = button.data('title');
                    var imageUrl = button.data('image-url');
                    var description = button.data('description');
                    var detailPage = button.data('detail-page');

                    var modal = $(this);
                    modal.find('#edit-id').val(id);
                    modal.find('#edit-title').val(title);
                    modal.find('#edit-image-url').val(imageUrl);
                    modal.find('#edit-description').val(description);
                    modal.find('#edit-detail-page').val(detailPage);
                });
            });
        </script>
</body>

</html>
