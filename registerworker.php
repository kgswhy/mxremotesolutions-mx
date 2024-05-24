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
                <a href="about.html" class="nav-item nav-link ">About Us</a>
                <a href="services.php" class="nav-item nav-link">Services</a>
                <a href="job.php" class="nav-item nav-link">Job Opportunities</a>
                <a href="blog.php" class="nav-item nav-link ">Blog</a>
                <a href="contact.html" class="nav-item nav-link ">Contact</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="registercompany.php" class="dropdown-item ">as Company</a>
                        <a href="registerworker.php" class="dropdown-item active">as Worker</a>
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
                    <h1 class="display-3 text-white animated slideInDown">Worker Registration</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="registration.php">Forms</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Worker Registration</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

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

    <div class="container-xxl py-5" id="workerRegistrationForm">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Worker Registration</h6>
                <h1 class="mb-5">Register as a Worker</h1>
            </div>
            <form action="./function/submit_worker.php" method="post" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Full Name: <span style="color: red;">*</span></label>
                                <input type="text" id="fullname" name="fullname" class="form-control" required>
                            </div>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shortname">Short Name: <span style="color: red;">*</span></label>
                                <input type="text" id="shortname" name="shortname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender_id">Gender: <span style="color: red;">*</span></label>
                                <select id="gender_id" name="gender_id" class="form-control" required>
                                    <option value="" selected>Select Gender</option>
                                    <?php
                                    foreach ($genders as $gender) {
                                        echo "<option value=\"{$gender['id']}\">{$gender['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desired_position_id">Desired Position:</label>
                                <select id="desired_position_id" name="desired_position_id" class="form-control" required>
                                    <option value="<?php $positions[0]; ?>" selected>Select Desired Position</option>
                                    <?php
                                    foreach ($positions as $position) {
                                        echo "<option value=\"{$position['id']}\">{$position['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number: <span style="color: red;">*</span></label>
                                <input type="tel" id="phone" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email: <span style="color: red;">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address: <span style="color: red;">*</span></label>
                                <textarea id="address" name="address" class="form-control" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthplace">Birthplace: <span style="color: red;">*</span></label>
                                <input type="text" id="birthplace" name="birthplace" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthday">Birthday: <span style="color: red;">*</span></label>
                                <input type="date" id="birthday" name="birthday" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="religion_id">Religion: <span style="color: red;">*</span></label>
                                <select id="religion_id" name="religion_id" class="form-control" required>
                                    <option value="" selected>Select Religion Level</option>
                                    <?php
                                    foreach ($religions as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marital_status_id">Marital Status: <span style="color: red;">*</span></label>
                                <select id="marital_status_id" name="marital_status_id" class="form-control"
                                    required>
                                    <option value="" selected>Select Marital Status Level</option>
                                    <?php
                                    foreach ($marital_statuses as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
<div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-12 mt-5">
                            <h3>Educational Background</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_education_level_id">Current Education Level:</label>
                                <select id="current_education_level_id" name="current_education_level_id"
                                    class="form-control">
                                    <option value="test" selected>Select Education Level</option>
                                    <?php
                                    foreach ($education_levels as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="current_major">Current Major:</label>
                                <input type="text" id="current_major" name="current_major" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="current_school">Current School:</label>
                                <input type="text" id="current_school" name="current_school"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_education_level_id">Last Education Level:</label>
                                <select id="last_education_level_id" name="last_education_level_id"
                                    class="form-control">
                                    <option value="<?php $positions[0]; ?>" selected>Select Last Education Level</option>
                                    <?php
                                    foreach ($education_levels as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="last_major">Last Major:</label>
                                <input type="text" id="last_major" name="last_major" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_school">Last School:</label>
                                <input type="text" id="last_school" name="last_school" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="english_proficiency">English Proficiency:</label>
                                <select id="english_proficiency" name="english_proficiency" class="form-control">
                                    <option value="" selected>Select English Proficiency</option>
                                    <option value="1">Beginner</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advanced</option>
                                    <option value="4">Fluent</option>
                                    <option value="5">Native</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="toefl_score">TOEFL Score:</label>
                                <input type="number" id="toefl_score" name="toefl_score" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-12 mt-5">
                            <h3>Work Experience</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_position">Last Position:</label>
                                <input type="text" id="last_position" name="last_position" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_company">Last Company:</label>
                                <input type="text" id="last_company" name="last_company" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_job_desc">Last Job Description:</label>
                                <textarea id="last_job_desc" name="last_job_desc" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <h3>Documents and Portfolio</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skill_level">Skill Level:</label>
                                <select id="skill_level" name="skill_level" class="form-control">
                                    <option value="" selected>Select Skill Level</option>
                                    <option value="1">Beginner</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advanced</option>
                                    <option value="4">Expert</option>
                                    <option value="5">Master</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="internet">Internet Connection Quality:</label>
                                <select id="internet" name="internet" class="form-control">
                                    <option value="" selected>Select Internet Connection Quality</option>
                                    <option value="1">Very Poor</option>
                                    <option value="2">Poor</option>
                                    <option value="3">Average</option>
                                    <option value="4">Good</option>
                                    <option value="5">Excellent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="willing">Willing to Relocate:</label>
                                <select id="willing" name="willing" class="form-control">
                                    <option value="" selected>Are You Willing to Have Another Full Time Job When
                                        Do This Remote Internship?</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recruitment">In a Recruitment Process:</label>
                                <select id="recruitment" name="recruitment" class="form-control">
                                    <option value="" selected>In a Recruitment Process With Other Company?
                                    </option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="introduction">Upload Self Introduction:</label>
                                <input type="file" id="introduction" name="introduction" class="form-control"
                                    accept="video/*">
                                <small class="form-text text-muted">
                                Must be in English. Max duration 3 minutes. Maximal size is 15 MB.                                </small>
                            </div>
                            <div class="form-group">
                                <label for="cv">Upload CV (PDF only):</label>
                                <input type="file" id="cv" name="cv" class="form-control"
                                    accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="portofolio">Upload Portfolio (PDF only):</label>
                                <input type="file" id="portofolio" name="portofolio" class="form-control"
                                    accept=".pdf">
                            </div>

                            <div class="form-group">
                                <label for="referral">Referral:</label>
                                <input type="text" id="referral" name="referral" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-12 text-center mt-5">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Worker Registration Form End -->



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
                        hello@mxsolution.id
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
