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
            <h2 class="m-0 text-primary"><img src="img/logo.webp" width="200px" /></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link ">About Us</a>
                <a href="services.php" class="nav-item nav-link">Services</a>
                <a href="job.php" class="nav-item nav-link">Job Opportunities</a>
                <a href="blog.php" class="nav-item nav-link ">Blog</a>
                <a href="contact.html" class="nav-item nav-link ">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5"
                        data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="registercompany.php" class="dropdown-item active">as Company</a>
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

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Company Registration</h1>
                    <p class="text-white animated fadeInUp" data-wow-delay="0.3s">
                        Register your company with us to gain access to our platform's exclusive features.
                    </p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Forms</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Company Registration</li>
                        </ol>
                    </nav>
                    <a class="btn btn-light btn-lg mt-4 animated fadeInUp" data-wow-delay="0.5s"
                        href="#registrationForm">
                        Start Registration
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Form Start -->
    <div class="container-xxl py-5" id="registrationForm">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Company Registration</h6>
                <h1 class="mb-5">Register Your Company</h1>
            </div>
            <form action="./function/submit_company.php" method="post" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Section 1: Company Information -->
                    <div class="col-12">
                        <fieldset>
                            <legend>Company Information</legend>
                            <div class="row">
                                <!-- Company Name -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Company Name: <span style="color: red;">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <!-- Company Logo -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="logo">Company Logo: </label>
                                        <input type="file" id="logo" name="logo" class="form-control"
                                            accept="image/*">
                                    </div>
                                </div>
                                <!-- Website -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="website">Website: <span style="color: red;">*</span></label>
                                        <input type="text" id="website" name="website" class="form-control">
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number: <span style="color: red;">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-control">
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Company Address: <span
                                                style="color: red;">*</span></label>
                                        <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Section 2: Company PIC -->
                    <div class="col-12">
                        <fieldset>
                            <legend>Company PIC (Person in Charge)</legend>
                            <div class="row">
                                <!-- Contact Person Name -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="pic_name">Contact Person Name: <span
                                                style="color: red;">*</span></label>
                                        <input type="text" id="pic_name" name="pic_name" class="form-control">
                                    </div>
                                </div>
                                <!-- Contact Person Phone -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="pic_phone">Contact Person Phone: <span
                                                style="color: red;">*</span></label>
                                        <input type="tel" id="pic_phone" name="pic_phone" class="form-control">
                                    </div>
                                </div>
                                <!-- Contact Person Email -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="pic_email">Contact Person Email: <span
                                                style="color: red;">*</span></label>
                                        <input type="email" id="pic_email" name="pic_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Section 3: Worker Request -->
                    <div class="col-12">
                        <fieldset>
                            <legend>Worker Request</legend>
                            <div class="row">
                                <!-- Position -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="desired_position_id">Job Position: <span
                                                style="color: red;">*</span></label>
                                        <select id="desired_position_id" name="desired_position_id"
                                            class="form-control" required>
                                            <option value="" selected>Select Job Position</option>
                                            <?php
                                            foreach ($positions as $position) {
                                                if ($position['status']) {
                                                    echo "<option value=\"{$position['id']}\">{$position['name']}</option>";
                                                }
                                            }
                                            ?>
                                            <option value="17">Other</option>
                                        </select>

                                    </div>

                                </div>
                              <div class="col-lg-6">
                              <div class="form-group" id="other_position_group" style="display: none;">
                                            <label for="other_position">Specify Other Position: <span
                                                    style="color: red;">*</span></label>
                                            <input type="text" id="other_position" name="other_position"
                                                class="form-control" placeholder="Please specify other position"
                                                required>
                                        </div>
                              </div>
                                <!-- Job Quota -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="quota">Job Quota: <span style="color: red;">*</span></label>
                                        <input type="number" id="quota" name="quota" class="form-control">
                                    </div>
                                </div>
                                <!-- Job Level -->
                                <div class="col-lg-6">
        
                                <div class="form-group">
                                    <label for="job_level_id">Job Level: <span style="color: red;">*</span></label>
                                    <select id="job_level_id" name="job_level_id" class="form-control">
                                        <option value="" selected>Select Job Level</option>
                                        <?php
                                        foreach ($job_levels as $job_levels) {
                                            echo "<option value=\"{$job_levels['id']}\">{$job_levels['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>

                                <!-- Job Requirement -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="job_requirement">Job Requirement: <span
                                                style="color: red;">*</span></label>
                                        <textarea id="job_requirement" name="job_requirement" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <!-- Job Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="job_description">Job Description: <span
                                                style="color: red;">*</span></label>
                                        <textarea id="job_description" name="job_description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="refferal_partner">Referral Partner:</label>
                                        <textarea id="refferal_partner" name="refferal_partner" class="form-control" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End -->


    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success') && urlParams.get('success') === 'true') {
            alert('Data berhasil dimasukkan!');
        }
    </script>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-4">
                    <h4 class="text-white mb-3">About Us</h4>
                    <div class="row g-2 pt-2">
                        <p>We connects highly skilled professionals with businesses seeking remote talent solutions.</p>
                        <p>We bridge talent across borders by providing exceptional remote work opportunities. We
                            understand the unique cultural and professional synergies between Indonesia and other
                            countries and leverage this knowledge to foster smooth, productive working relationships.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
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
                <div class="col-lg-4 col-md-4">

                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="services.php">Our Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <script>
        document.getElementById('desired_position_id').addEventListener('change', function() {
            var otherPositionGroup = document.getElementById('other_position_group');
            if (this.value === '17') {
                otherPositionGroup.style.display = 'block';
            } else {
                otherPositionGroup.style.display = 'none';
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen #other_position_group
        var otherPositionGroup = document.getElementById('other_position_group');
        // Ambil input #other_position
        var otherPositionInput = document.getElementById('other_position');

        // Fungsi untuk menentukan apakah #other_position_group terlihat atau tidak
        function isOtherPositionVisible() {
            return otherPositionGroup.style.display !== 'none';
        }

        // Fungsi untuk mengatur atribut required pada #other_position sesuai dengan visibilitas #other_position_group
        function toggleOtherPositionRequired() {
            if (isOtherPositionVisible()) {
                otherPositionInput.setAttribute('required', 'required');
            } else {
                otherPositionInput.removeAttribute('required');
            }
        }

        // Panggil fungsi saat halaman dimuat
        toggleOtherPositionRequired();

        // Tambahkan event listener untuk memantau perubahan pada #other_position_group
        // Jika perlu, ganti event yang digunakan (misalnya change untuk select, click untuk tombol radio, dll.)
        otherPositionGroup.addEventListener('input', toggleOtherPositionRequired);
        otherPositionGroup.addEventListener('change', toggleOtherPositionRequired);
    });
</script>

    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

</body>

</html>
