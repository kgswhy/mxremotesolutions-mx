<?php
require './function/getData.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <!-- Meta tags for SEO -->
        <meta name="description"
            content="MX Remote Solutions connects top-tier talent with businesses seeking remote work solutions. Explore our platform for global job opportunities and seamless talent acquisition.">
        <meta name="keywords"
            content="remote work, remote jobs, global talent, talent acquisition, Indonesia, international, remote teams, hiring, job opportunities">
        <meta name="robots" content="index, follow">

        <!-- Open Graph meta tags -->
        <meta property="og:title" content="MX Remote Solutions: Your Bridge to Global Remote Talent">
        <meta property="og:description"
            content="MX Remote Solutions connects top-tier talent with businesses seeking remote work solutions. Explore our platform for global job opportunities and seamless talent acquisition.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://mxremotesolutions.com/">
        <meta property="og:image" content="https://mxremotesolutions.com/registerworker.php">

        <!-- Twitter Card meta tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="MX Remote Solutions: Your Bridge to Global Remote Talent">
        <meta name="twitter:description"
            content="MX Remote Solutions connects top-tier talent with businesses seeking remote work solutions. Explore our platform for global job opportunities and seamless talent acquisition.">
        <meta name="twitter:image" content="https://mxremotesolutions.com/contact.html">

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
        <!-- Bootstrap JS dan dependensi -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


        <style>
            .testimonial-item {
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
            }

            .testimonial-item .fa-quote-left {
                color: #007bff;
            }

            .testimonial-item img {
                width: 80px;
                height: 80px;
            }
        </style>

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
            <h2 class="m-0 text-primary"><img src="img/logo.webp" width="200px" /></h2>
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
                <a href="blog.php" class="nav-item nav-link">Blog</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5"
                        data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="registercompany.php" class="dropdown-item">as Company</a>
                        <a href="registerworker.php" class="dropdown-item">as Worker</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link"></a>
            </div>
            <!--a href="" style="color:#000 !important;background-color:#fff !important;border:0px !important;" class="btn btn-primary py-4 px-lg-5 ">Register as Talent<i class="fa fa-arrow-right ms-3"></i></a>
            <a href="" class="btn btn-primary py-4 px-lg-5 ">Register as Company<i class="fa fa-arrow-right ms-3"></i></a-->
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
            style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); background: #d1e7fd;">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Data has been successfully submitted!
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mb-5">
        <div class="position-relative">
            <img class="img-fluid w-100" src="img/carousel-2.png" alt="Background Image"
                style="filter: brightness(50%);">

            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, 0.5);">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Pastikan sistem grid Bootstrap digunakan dengan benar -->
                        <div class="col-lg-6 col-md-12">
                            <h1 class="display-3 text-white animated slideInDown">Empower Your Business with Top-Tier
                                Remote Talent from Indonesia</h1>
                            <p class="fs-5 text-white mb-4 pb-2">Hire skilled remote employees for Digital Marketing,
                                CRM, Bookkeeping, HR, and Office Administration.</p>
                            <a href="#internCard" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                <i class="fas fa-search"></i> Get Started Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Why Choose MX Remote Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-star text-primary mb-4"></i>
                            <h5 class="mb-3">Top Talent</h5>
                            <p>Access a pool of highly skilled and dedicated remote professionals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-dollar-sign text-primary mb-4"></i>
                            <h5 class="mb-3">Cost-Effective</h5>
                            <p>Save on overhead costs while maintaining high productivity.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-clock text-primary mb-4"></i>
                            <h5 class="mb-3">24/7 Support</h5>
                            <p>Our team is always available to support your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="feature-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cogs text-primary mb-4"></i>
                            <h5 class="mb-3">Flexible Packages</h5>
                            <p>Tailored solutions to fit your business requirements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-3">
                <h2>Our Remote Solutions</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h5 class="mb-3">Digital Marketing</h5>
                            <p>Boost your online presence with expert digital marketing strategies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h5 class="mb-3">CRM Management</h5>
                            <p>Enhance customer relationships with our CRM specialists.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book text-primary mb-4"></i>
                            <h5 class="mb-3">Bookkeeping</h5>
                            <p>Accurate and timely bookkeeping services to keep your finances in check.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-briefcase text-primary mb-4"></i>
                            <h5 class="mb-3">HR Services</h5>
                            <p>Efficient HR management for seamless operations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-building text-primary mb-4"></i>
                            <h5 class="mb-3">Office Administration</h5>
                            <p>Reliable administrative support for smooth business functioning.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- How It Works Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Simple Process to Get Started</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="how-it-works-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-phone text-primary mb-4"></i>
                            <h5 class="mb-3">Contact Us</h5>
                            <p>Fill out the contact form or give us a call.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="how-it-works-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-comments text-primary mb-4"></i>
                            <h5 class="mb-3">Consultation</h5>
                            <p>Discuss your business needs with our experts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="how-it-works-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h5 class="mb-3">Selection</h5>
                            <p>Choose the right talent from our curated pool.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="how-it-works-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-clipboard-check text-primary mb-4"></i>
                            <h5 class="mb-3">Onboarding</h5>
                            <p>Seamless onboarding and integration into your team.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="how-it-works-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-life-ring text-primary mb-4"></i>
                            <h5 class="mb-3">Ongoing Support</h5>
                            <p>Continuous support to ensure optimal performance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How It Works End -->

    <!-- Testimonials Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>What Our Clients Say</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item text-center pt-3">
                        <img src="https://via.placeholder.com/150" alt="Client 1 Image" class="mb-4 rounded-circle">
                        <div class="p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p>"MX Remote Solutions has transformed our digital marketing efforts. Their team is
                                outstanding."</p>
                            <h5 class="mb-1">Client 1</h5>
                            <span>Company Name</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="testimonial-item text-center pt-3">
                        <img src="https://via.placeholder.com/150" alt="Client 2 Image" class="mb-4 rounded-circle">
                        <div class="p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p>"We’ve seen a significant improvement in our CRM management thanks to their skilled
                                professionals."</p>
                            <h5 class="mb-1">Client 2</h5>
                            <span>Company Name</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="testimonial-item text-center pt-3">
                        <img src="https://via.placeholder.com/150" alt="Client 3 Image" class="mb-4 rounded-circle">
                        <div class="p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p>"Their bookkeeping services are accurate and reliable. Highly recommended."</p>
                            <h5 class="mb-1">Client 3</h5>
                            <span>Company Name</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonials End -->



    <!-- Call to Action Section -->
    <div class="container-xxl py-5 bg-light" id="internCard">
        <div class="container text-center mb-5">
            <h2 class="section-title mb-3">Ready to Transform Your Business?</h2>
            <p class="section-subtitle mb-4">Contact us today and discover the benefits of hiring remote professionals.
            </p>
        </div>
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="animate__animated animate__fadeInRight"
                        style="background: rgba(255, 255, 255, 0.9); padding: 40px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                        <h4 class="text-center mb-4">Hire Your Intern</h4>
                        <form action="./function/submit_temporary_data.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name: <Span style="color: red;">*</Span> </label>
                                <input type="text" class="form-control" id="name" name="temporary_pic_name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <Span style="color: red;">*</Span></label>
                                <input type="email" class="form-control" id="email" name="temporary_pic_email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name: <Span style="color: red;">*</Span> </label>
                                <input type="text" class="form-control" id="company_name"
                                    name="temporary_company_name" placeholder="Enter your company name" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number (+code) <Span style="color: red;">*</Span></label>
                                <input type="tel" class="form-control" id="phone" name="temporary_phone"
                                    pattern="[+0-9]+" placeholder="Enter your phone number" required>
                            </div>
                            <div class="mb-3">
                                <label for="looking-for" class="form-label">Looking for <Span style="color: red;">*</Span></label>
                                <select class="form-control" id="looking-for" name="temporary_positions" required>
                                    <option value="">Select an option</option>
                                    <?php
                                    foreach ($positions as $position) {
                                        if ($position['status']) {
                                            echo "<option value=\"{$position['id']}\">{$position['name']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane"></i> Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Call to Action Section -->


    <script>
        $(document).ready(function() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('success') && params.get('success') === 'true') {
                const myToast = new bootstrap.Toast(document.querySelector('.toast'));
                myToast.show(); // Tampilkan toast saat parameter 'success=true'
            }
        });
    </script>

    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-4">
                    <div class="text-center">
                        <img src="./img/logo.png" alt="Company Logo" class="img-fluid mb-3"
                            style="max-width: 150px;">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h4 class="text-light mb-4">Social media</h4>
                    <a class="btn btn-link"
                        href="https://www.linkedin.com/showcase/mx-remote-solutions/about/">Linkedin</a>
                    <a class="btn btn-link" href="https://www.facebook.com/profile.php?id=61561392032339">Facebook</a>
                    <a class="btn btn-link" href="https://www.instagram.com/mxremotesolutions/">Instagram</a>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="services.php">Our Services</a>
                    <a class="btn btn-link" href="job.php">Job Opportunities</a>
                    <a class="btn btn-link" href="registercompany.php">Register Company</a>
                </div>
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
