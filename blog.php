<?php
require './function/blog_function.php';

$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img src="img/logo.png" width="200px" /></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link ">Home</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
            <a href="services.php" class="nav-item nav-link">Services</a>
            <a href="job.php" class="nav-item nav-link">Job Opportunities</a>
            <a href="blog.php" class="nav-item nav-link active">Blog</a>
            <a href="contact.html" class="nav-item nav-link ">Contact</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="dropdown">Register</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="registercompany.php" class="dropdown-item">as Company</a>
                    <a href="registerworker.php" class="dropdown-item">as Worker</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link"></a>
        </div>
        <!--a href="" style="color:#000 !important;background-color:#fff !important;border:0px !important;" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Register as Talent<i class="fa fa-arrow-right ms-3"></i></a>
        <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Register as Company<i class="fa fa-arrow-right ms-3"></i></a-->
    </div>
</nav>
<!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Blog</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Blog</h6>
            <h1 class="mb-5">Get the Latest Update</h1>
        </div>
        <div class="row g-3">
            <?php foreach ($posts as $index => $post): ?>
            <?php if ($index < 3): ?>
            <?php if ($index == 0): ?>
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <?php endif; ?>
                    <div class="col-lg-<?php echo $index == 0 ? '12' : '6'; ?> col-md-12 wow zoomIn"
                        data-wow-delay="<?php echo isset($post['delay']) ? $post['delay'] : '0.1s'; ?>">
                        <a class="position-relative d-block overflow-hidden"
                            href="blog_detail.php?id=<?php echo $post['id']; ?>">
                            <img class="img-fluid" src="<?php echo $post['image_url']; ?>" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                style="margin: 1px;">
                                <h5 class="m-0"><?php echo $post['title']; ?></h5>
                                <small class="text-primary"><?php echo $post['description']; ?></small>
                            </div>
                        </a>
                    </div>
                    <?php if ($index == 2): ?>
                </div>
            </div>
            <?php endif; ?>
            <?php else: ?>
            <div class="col-lg-5 col-md-6 wow zoomIn" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden"
                    href="blog_detail.php?id=<?php echo $post['id']; ?>">
                    <img class="img-fluid position-absolute w-100 h-100" src="<?php echo $post['image_url']; ?>"
                        alt="" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                        style="margin:  1px;">
                        <h5 class="m-0"><?php echo $post['title']; ?></h5>
                        <small class="text-primary"><?php echo $post['description']; ?></small>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Categories End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">About Us</h4>
                    <div class="row g-2 pt-2">
                        <p>Work from Anywhere is a program by MX Solution. We connects highly skilled professionals with
                            businesses seeking remote talent solutions.</p>
                        <p>We bridge talent across borders by providing exceptional remote work opportunities. We
                            understand the unique cultural and professional synergies between Indonesia and other
                            countries and leverage this knowledge to foster smooth, productive working relationships.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p><b>MX Global Pte Ltd</b><br>
                        Midview City, 22 Sin Ming Lane, #06-76, Postal 573969
                    </p>
                    <p><b>PT Max Pandai Education</b>
                        <br>Jakarta, Indonesia<br>
                        +62 815 9221 333<br>
                        hello@mxremotesolutions.com
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        © 2024 MX Global Pte Ltd | PT Max Pandai Education
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
