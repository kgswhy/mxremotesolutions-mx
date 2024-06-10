<?php
require './function/getData.php'; // Mendapatkan data untuk dropdown
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
    <!-- Bootstrap JS dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NTNCMW83');</script>
<!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NTNCMW83"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
				<a href="blog.php" class="nav-item nav-link">Blog</a>
				<a href="contact.html" class="nav-item nav-link">Contact</a>
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
        <img class="img-fluid w-100" src="img/carousel-2.png" alt="Background Image" style="filter: brightness(50%);">
        
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, 0.5);">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Pastikan sistem grid Bootstrap digunakan dengan benar -->
                    <div class="col-lg-6 col-md-12">
                        <h5 class="text-primary text-uppercase mb-3 animated slideInDown">For Company</h5>
                        <h1 class="display-3 text-white animated slideInDown">Singapore's Gateway to Top-Tier Indonesian Intern</h1>
                        <p class="fs-5 text-white mb-4 pb-2">Access to a wider pool of skilled and cost-effective talent and scalable workforce solutions. Hassle-free remote hiring, compliance processes, and payroll management!</p>
                        <a href="#internCard" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                            <i class="fas fa-search"></i> Find Talents
                        </a>
                    </div>

                    <!-- Pastikan tidak ada tumpang tindih -->
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center justify-content-lg-end">
                        <!-- Buatlah formulir dengan layout yang benar -->
                        <div class="animate__animated animate__fadeInRight" style="background: rgba(255, 255, 255, 0.9); padding: 40px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); width: 80%;">
                            <h4>Hire Your Intern</h4>
                            <form action="./function/submit_temporary_data.php" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name *</label>
                                    <input type="text" class="form-control" id="name" name="temporary_pic_name" placeholder="Enter your name" required>
                                </div>
                                <!-- Gunakan sistem grid untuk mencegah tumpang tindih -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="temporary_pic_email" placeholder="Enter your email" required>
                                </div>
                                <!-- Tambahkan padding dan margin untuk ruang yang cukup -->
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name *</label>
                                    <input type="text" class="form-control" id="company_name" name="temporary_company_name" placeholder="Enter your company name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number (+code) *</label>
                                    <input type="tel" class="form-control" id="phone" name="temporary_phone" pattern="[+0-9]+" placeholder="Enter your phone number" required>
                                </div>
                                <!-- Pastikan tidak ada tumpang tindih antar field -->
                                <div class="mb-3">
                                    <label for="looking-for" class="form-label">Looking for *</label>
                                    <select class="form-control" id="looking-for" name="temporary_positions" required>
                                        <option value="">Select an option</option>
                                        <?php foreach ($positions as $job): ?>
                                            <option value="<?= $job['id'] ?>"><?= $job['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Tombol Submit -->
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Talent Sourcing and Screening</h5>
                            <p>Ensuring they possess the required skills and fluency in English for success in a work
                                environment.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Remote Onboarding and Support</h5>
                            <p>Facilitating seamless remote onboarding, including cultural orientation and technology
                                setup.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Payroll and Compliance Management</h5>
                            <p>Handling payroll processing, ensuring compliance with both countries employment
                                regulations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Performance Monitoring and Communication</h5>
                            <p>Implementing performance monitoring systems for successful remote work.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <script>
        $(document).ready(function() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('success') && params.get('success') === 'true') {
                const myToast = new bootstrap.Toast(document.querySelector('.toast'));
                myToast.show(); // Tampilkan toast saat parameter 'success=true'
            }
        });
    </script>

    


    <!-- Categories Start -->
    <!--div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Countries</h6>
                <h1 class="mb-5">Choose Your Working Destination</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Singapore</h5>
                                    <small class="text-primary">9 Jobs</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Malaysia</h5>
                                    <small class="text-primary">0 Jobs</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Japan</h5>
                                    <small class="text-primary">0 Jobs</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Indonesia</h5>
                            <small class="text-primary">0 Jobs</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div-->
    <!-- Categories Start -->

    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Looking for Talents?</h6>
            <h1 class="mb-5">Explore Our Top-tier Talents</h1>
        </div>
        <div class="row g-4">
            <?php if (!empty($positions)): ?>
                <?php foreach ($positions as $position): ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo $position['image_url'] ?>" alt="<?php echo $position['name']; ?>">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"><?php echo $position['name']; ?></h5>
                                <small>10+ Talents</small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-lg-6 col-md-8">
                    <div class="card no-jobs-card text-center p-5">
                        <div class="card-body">
                            <h1>Job not available</h1>
                            <p class="mt-4">There are currently no job vacancies available. Please check back later or contact us for more information.</p>
                            <a href="./contact.html" class="btn btn-primary mt-3">Contact Us</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    <!-- Team End -->

    <!-- About Start -->
    <!-- Container for the whole section -->
<div class="container-xxl py-5" id="internCard">
    <!-- Primary content area with grid structure -->
    <div class="container">
        <div class="row g-5">
            <!-- Left column: Form for hiring an intern -->
            <div class="col-lg-6">
                <!-- Form container with animation and styling -->
                <div class="wow fadeInUp animate__animated animate__fadeInRight" data-wow-delay="0.1s" style="background: rgba(255, 255, 255, 0.9); padding: 40px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);">
                    <!-- Form title -->
                    <h4>Hire Your Intern</h4>
                    <!-- Form for capturing details -->
                    <form action="./function/submit_temporary_data.php" method="post">
                        <!-- Form fields -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" id="name" name="temporary_pic_name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="temporary_pic_email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name *</label>
                            <input type="text" class="form-control" id="company_name" name="temporary_company_name" placeholder="Enter your company name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number (+code) *</label>
                            <input type="tel" class="form-control" id="phone" name="temporary_phone" pattern="[+0-9]+" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="looking-for" class="form-label">Looking for *</label>
                            <select class="form-control" id="looking-for" name="temporary_positions" required>
                                <option value="">Select an option</option>
                                <?php foreach ($positions as $position): ?>
                                    <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Submit button with icon -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Register
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right column: Information about the company -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <!-- Section heading -->
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <!-- Company details -->
                <h1 class="mb-4">Work From Anywhere with <br>MX Remote Solutions</h1>
                <p>We bridge talent across borders by providing exceptional remote work opportunities. We understand the unique cultural and professional synergies between Indonesia and other countries and leverage this knowledge to foster smooth, productive working relationships.</p>
                <p>The increasing trend of globalization and continuous digital innovation has accelerated the adoption of remote work. The COVID-19 pandemic further catalyzed this shift, demonstrating the viability of remote teams and highlighting the need for flexibility.</p>
                <!-- List of available services -->
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>IT and Technology</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Customer Service and Support</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Digital Marketing</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Content Creation and Translation</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Finance and Accounting</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Administration and Data Entry</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3"></h6>
                <h1 class="mb-5">Our Clients</h1>
            </div>
            <div class="text-center wow fadeInUp">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client2.png"
                    style="width: 80px; height: 80px;">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client4.png"
                    style="width: 80px; height: 80px;">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client8.png"
                    style="width: 80px; height: 80px;">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client9.png"
                    style="width: 80px; height: 80px;">
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">About Us</h4>
                    <div class="row g-2 pt-2">
                        <p>We connects highly skilled professionals with businesses seeking remote talent solutions.</p>
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
