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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

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
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
            <a href="job.php" class="nav-item nav-link active">Job Opportunities</a>
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



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Job Opportunities</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Job Opportunities</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!--  test -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Looking for Jobs?</h6>
            <h1 class="mb-5">Explore Opportunities</h1>
        </div>
        <?php if (empty($positions)): ?>
        <div class="col-lg-6 col-md-8">
            <div class="card no-jobs-card text-center p-5">
                <div class="card-body">
                    <h1>Job not available</h1>
                    <p class="mt-4">There are currently no job vacancies available. Please check back later or contact us for more information.</p>
                    <a href="./contact.html" class="btn btn-primary mt-3">Contact Us</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <?php foreach ($positions as $position): ?>
        <?php if ($position['status']): ?>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="<?php echo $position['image_jobs']; ?>" alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-4"><?php echo $position['name']; ?></h3>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>1 Position</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h1 class="mb-4"><?php echo htmlspecialchars($position['name']); ?></h1>
                        <p class="mb-4"><?php echo $position['description']; ?></p>
                        <div class="row gy-2 gx-4 mb-4">
                            <?php
                            $responsibilities = json_decode($position['responsibilities'], true);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                foreach ($responsibilities as $responsibility) {
                                    echo "<div><p class='mb-0'><i class='fa fa-arrow-right text-primary me-2'></i>" . htmlspecialchars($responsibility) . "</p></div>";
                                }
                            } else {
                                echo "<div><p>Error decoding responsibilities</p></div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>


    <!-- Courses Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Looking for Jobs?</h6>
                <h1 class="mb-5">Explore Opportunities</h1>
            </div>
    <div class="container-xxl py-5">
        <div class="container">
			<div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job1.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Graphic Designer</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>0 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Graphic Designer</h1>
                    <p class="mb-4">As a Graphic Designer Intern, you will have the opportunity to work alongside the creative team to develop impactful visual assets that enhance the brand identity and support the marketing efforts. You will play a key role in bringing the ideas to life through innovative design solutions across various digital and print channels.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Familiar with Adobe Photoshop, Illustrator and Canva</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Good understanding in basic design principal</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Follow design guideline</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Produce high-quality visual content that aligns with the client's brand identity</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Keep up-to-date with design trends, tools, and techniques</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job2.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Social Media Specialist</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>1 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Social Media Specialist</h1>
                    <p class="mb-4">As a Social Media Specialist, you will play a vital role in enhancing our online presence and engagement across various social media platforms. You will work closely with the marketing team to develop and execute creative strategies to reach the target audience and promote the services effectively.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Good understanding in social media platforms</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Stay up-to-date with the latest trends</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Manage social media calendars and scheduling posts</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Engage with audience by responding to comments, messages, and inquiries</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job3.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Web Developer</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>0 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Web Developer</h1>
                    <p class="mb-4">As a Web Developer Intern, you will have the opportunity to build and maintain innovative web solutions that enhance user experience and drive business growth. You will gain hands-on experience in web development while contributing to real-world projects in a supportive and collaborative environment.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Proficient with HTML, CSS, JavaScript</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Understand responsive design</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Manage databases</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Assist in the development and implementation of websites</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job4.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Video Editor</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>0 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Video Editor</h1>
                    <p class="mb-4">As a Video Editor Intern, you will play a key role in creating compelling visual content that enhances our brand identity and engages client's target audience. You will work closely with the marketing and creative teams to edit and produce high-quality videos for various platforms, including social media, websites, and marketing campaigns.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Proficient with Video Editing Software</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Familiar with Editing Techniques</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Understanding of Video Formats and Codecs</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Stay up-to-date with industry trends and best practices in video editing</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job5.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Digital Business Analyst</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>1 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Digital Business Analyst</h1>
                    <p class="mb-4">As a Technical Business Analyst Intern, you will play a crucial role in bridging the gap between IT and the business. You will work closely with stakeholders to understand their needs, translate business requirements into technical specifications, and ensure the successful delivery of IT projects. This position offers a unique opportunity to develop your analytical, technical, and communication skills in a real-world setting.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Analyze business processes and recommend improvements</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Translate business requirements into detailed technical specifications</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Conduct data analysis to support decision-making</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Collaborate with stakeholders to gather and document business requirements</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job6.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">Pitchdeck Writer</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 350</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Full Time</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Pitchdeck Writer</h1>
                    <p class="mb-4">As a Pitch Deck Writer, you will play a crucial role in crafting compelling and persuasive pitch decks that effectively communicate clients' value propositions, business models, and growth potential to investors, partners, and stakeholders. You will work closely with clients to understand their unique selling points and market positioning, and translate complex ideas into clear, concise, and visually engaging presentations.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Write compelling copy and create engaging visuals, including graphics, charts, and infographics</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Tailor pitch decks to different audiences and purposes</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Ensure consistency in branding, design, and messaging across all presentation materials</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Structure and organize pitch decks in a logical and compelling manner</p></div>
                    </div>
                </div>
            </div>
			<br>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/job7.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="registerworker.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Apply Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
							<h3 class="mb-4">E-Commerce Admin</h3>
                            <h5 class="mb-0"><i class="fa fa-money-bill me-3"></i>Start from SGD 150</h5>
                            <div class="mb-3"></div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Internship</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>40 Hrs/Wk</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>1 Positions</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">E-Commerce Admin</h1>
                    <p class="mb-4">As an E-commerce Admin Intern, you will play a key role in supporting e-commerce operations and ensuring the smooth functioning of online storefront. You will gain hands-on experience in managing product listings, processing orders, and providing customer support to enhance the overall shopping experience for customers.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Assist in managing product listings on our e-commerce platform</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Monitor and update product information</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Process customer orders</p></div>
                        <div><p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Monitor order fulfillment and shipping processes</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div></div> -->
    <!-- About End -->

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
                        <p>Work from Anywhere is a program by MX Solution. We connects highly skilled professionals with businesses seeking remote talent solutions.</p>
						<p>We bridge talent across borders by providing exceptional remote work opportunities. We understand the unique cultural and professional synergies between Indonesia and other countries and leverage this knowledge to foster smooth, productive working relationships.</p>
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
					hello@mxsolution.id</p>
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