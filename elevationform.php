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

    <link href="img/favicon.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <style>
        
    </style>


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
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 "
                        data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="registercompany.php" class="dropdown-item ">as Company</a>
                        <a href="registerworker.php" class="dropdown-item active">as Worker</a>
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
                    <h1 class="display-3 text-white animated slideInDown">Elevation Form</h1>
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

    <div class="container-xxl py-5" id="internEvaluationForm">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Performance Evaluation</h6>
                <h1 class="mb-5">Intern Performance Evaluation</h1>
            </div>
            <form action="./function/submit_evaluation.php" method="post" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h3>Client Information</h3>
                            <div class="form-group">
                                <label for="client_name">Name:</label>
                                <input type="text" id="client_name" name="client_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name:</label>
                                <input type="text" id="company_name" name="company_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="client_email">Email:</label>
                                <input type="email" id="client_email" name="client_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="client_date">Date:</label>
                                <input type="date" id="client_date" name="client_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3>Intern Information</h3>
                            <div class="form-group">
                                <label for="intern_name">Intern’s Name:</label>
                                <input type="text" id="intern_name" name="intern_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="intern_position">Position:</label>
                                <input type="text" id="intern_position" name="intern_position"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="internship_duration">Internship Duration:</label>
                                <input type="text" id="internship_duration" name="internship_duration"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="intern_date">Date:</label>
                                <input type="date" id="intern_date" name="intern_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <h3>Performance Evaluation</h3>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="quality_of_work">Quality of Work:</label>
                                <div class="dropdown-icon">
                                    <select id="quality_of_work" name="quality_of_work" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productivity">Productivity:</label>
                                <div class="dropdown-icon">
                                    <select id="productivity" name="productivity" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="communication_skills">Communication Skills:</label>
                                <div class="dropdown-icon">
                                    <select id="communication_skills" name="communication_skills"
                                        class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="technical_skills">Technical Skills:</label>
                                <div class="dropdown-icon">
                                    <select id="technical_skills" name="technical_skills" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="team_collaboration">Team Collaboration:</label>
                                <div class="dropdown-icon">
                                    <select id="team_collaboration" name="team_collaboration" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reliability_punctuality">Reliability and Punctuality:</label>
                                <div class="dropdown-icon">
                                    <select id="reliability_punctuality" name="reliability_punctuality"
                                        class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="problem_solving">Problem-Solving Skills:</label>
                                <div class="dropdown-icon">
                                    <select id="problem_solving" name="problem_solving" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="overall_performance">Overall Performance:</label>
                                <div class="dropdown-icon">
                                    <select id="overall_performance" name="overall_performance" class="form-control">
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="what_did_well">What did the intern do well?</label>
                                <textarea id="what_did_well" name="what_did_well" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="areas_for_improvement">Areas for improvement:</label>
                                <textarea id="areas_for_improvement" name="areas_for_improvement" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="consider_hiring">Would you consider hiring this intern in the
                                    future?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consider_hiring"
                                        id="consider_hiring_yes" value="Yes">
                                    <label class="form-check-label" for="consider_hiring_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consider_hiring"
                                        id="consider_hiring_no" value="No">
                                    <label class="form-check-label" for="consider_hiring_no">
                                        No
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consider_hiring"
                                        id="consider_hiring_maybe" value="Maybe">
                                    <label class="form-check-label" for="consider_hiring_maybe">
                                        Maybe
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="additional_comments">Additional Comments:</label>
                                <textarea id="additional_comments" name="additional_comments" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-12 text-center mt-5">
                        <button type="submit" class="btn btn-primary">Submit Evaluation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


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
