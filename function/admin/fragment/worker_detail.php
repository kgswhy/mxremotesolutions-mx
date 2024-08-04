<?php

use Google\Service\SecurityCommandCenter\Cve;

require '../../getData.php'; // Mendapatkan data untuk dropdown
require '../../worker_function.php';

require '../../auth_function.php'; // Menggunakan fungsi autentikasi
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi hanya jika belum aktif
}
// Memulai sesi

// Memeriksa apakah admin telah login
if (!is_admin_logged_in()) {
    // Jika tidak, arahkan ke halaman login
    header('Location: ../login.php');
    exit();
}

if (!can_access()) {
    // Redirect to an access denied page or home
    header('Location: ./access_denied.php');
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $worker_id = (int) $_GET['id'];
    $worker = get_worker_by_id($worker_id);

    if (!$worker) {
        die('Worker not found.');
    }
} else {
    die('Invalid Worker ID.');
}

$encryption_key = 'mxremotesolutions'; // Key untuk enkripsi dan dekripsi
$worker_id_encrypted = encrypt($worker_id, $encryption_key);
$encrypted_link = "update_worker.php?id=$worker_id_encrypted";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Worker Detail - MX Remote Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../../../img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Load PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">


    <style>
        .modal-content {
            height: 100%;
        }

        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }

        .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .card-title {
            color: #333;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-secondary:focus {
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        /* Custom styling for selected radio button */
        .btn-group-toggle .btn input[type="radio"]:checked+label {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Worker Detail: <?php echo htmlspecialchars($worker['fullname']); ?></h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Status Worker</h4>
                <p><strong>Status Worker:</strong> <?php echo htmlspecialchars($worker['status_worker_name']); ?></p>
                <form id="updateStatusForm" method="post" action="update_worker_status.php">
                    <input type="hidden" name="worker_id" value="<?php echo $worker_id; ?>">
                    <div class="form-group mb-2">
                        <label for="new_status">Change Status:</label>
                        <select id="new_status" name="new_status" class="form-control">
                            <option value="">Select Status Worker</option>
                            <?php
                            foreach ($status_workers as $status_worker) {
                                echo "<option value=\"{$status_worker['id']}\">{$status_worker['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Status</button>
                </form>


                <script>
                    document.getElementById('updateStatusForm').addEventListener('submit', function(event) {
                        var newStatus = document.getElementById('new_status').value;
                        if (!newStatus) {
                            event.preventDefault(); // Prevent form submission
                            alert('Please select a status.'); // Show alert
                        }
                    });
                </script>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Worker</h4>
                <a href="<?php echo $encrypted_link; ?>" class="btn btn-primary mt-2">Update Worker</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Interview Assessment</h4>
                    <form id="interviewAssessmentForm" method="post" action="../../submit_interview_assessment.php">

                        <input type="hidden" name="worker_id" value="<?php echo $worker_id; ?>">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="candidate_name">Candidate Name:</label>
                                    <input type="text" id="candidate_name" name="candidate" class="form-control"
                                        value="<?php echo $worker['fullname']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="applied_position">Applied Position:</label>
                                    <input type="text" id="applied_position" name="appliedPosition"
                                        class="form-control" value="<?php echo $worker['position_table_name']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="interview_date">Interview Date:</label>
                                    <input type="date" id="interview_date" name="interview_date" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="interviewer">Interviewer:</label>
                                    <input type="text" id="interviewer" name="interviewer" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>

                        <?php
            $criteria = [
                'educational_background_id' => '<b>Educational Background :</b> Does the candidate\'s educational background align well with the requirements of this position?',
                'prior_work_experience_id' => '<b>Prior Work Experience :</b> To what extent does the candidate\'s past work experience demonstrate the skills and knowledge needed for this role?',
                'technical_skills_id' => '<b>Technical Skills :</b> How would you rate the candidate\'s proficiency in the technical skills required for this position?',
                'verbal_communication_id' => '<b>Verbal Communication :</b> How effectively did the candidate communicate their thoughts and ideas during the interview?',
                'candidate_enthusiasm_id' => '<b>Candidate Enthusiasm :</b> How enthusiastic and motivated did the candidate seem about the opportunity and our company?',
                'teambuilding_skills_id' => '<b>Teambuilding/Interpersonal Skills :</b> Based on the interview, how well do you believe the candidate would collaborate and work effectively with others?',
                'initiative_id' => '<b>Initiative :</b> Did the candidate proactively ask insightful questions or offer suggestions beyond what was directly asked?',
                'time_management_id' => '<b>Time Management :</b> Based on their past experience and interview responses, how well do you think the candidate manages their time and prioritizes tasks?',
                'dedication_id' => '<b>Dedication :</b> How committed and dedicated do you perceive the candidate to be based on their responses and overall demeanor?'
            ];
            foreach ($criteria as $field => $label) {
            ?>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold"><?php echo $label; ?>:</label>
                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                <?php foreach ($rating_options as $option) { ?>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" id="<?php echo $field . '_' . $option['rating_id']; ?>" name="<?php echo $field; ?>"
                                        value="<?php echo $option['rating_id']; ?>" required>
                                    <?php echo $option['rating_value']; ?>
                                </label>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>


                        <div class="form-group mb-3">
                            <label for="overall_recommendation">Overall Recommendation:</label>
                            <select id="overall_recommendation" name="overall_recommendation" class="form-control"
                                required>
                                <option value="Not Fill Recomendation">Select Recommendation</option>
                                <option value="Strongly not recommended">Strongly not recommended</option>
                                <option value="Better Not recommended">Better not recommended</option>
                                <option value="Recommended">Recommended</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="notes">Notes:</label>
                            <textarea id="notes" name="notes" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Assessment</button>
                    </form>

                    <script>
                        document.getElementById('interviewAssessmentForm').addEventListener('submit', function(event) {
                            var requiredFields = document.querySelectorAll(
                                '#interviewAssessmentForm select[required], #interviewAssessmentForm input[type="radio"][required]'
                            );
                            for (var i = 0; i < requiredFields.length; i++) {
                                if (!requiredFields[i].value) {
                                    event.preventDefault();
                                    alert('Please fill in all required fields.');
                                    return;
                                }
                            }
                        });
                    </script>
                </div>
            </div>




            <!-- Personal Information & Educational Background -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <div class="card mt-4" style="height: 400px;">
                        <div class="card-body">
                            <h4 class="card-title">Personal Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($worker['fullname']); ?></p>
                                    <p><strong>Short Name:</strong> <?php echo htmlspecialchars($worker['shortname']); ?></p>
                                    <p><strong>Position:</strong> <?php echo htmlspecialchars($worker['position_table_name']); ?></p>
                                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($worker['gender_name']); ?></p>
                                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($worker['phone']); ?></p>
                                    <p><strong>Marital Status:</strong> <?php echo htmlspecialchars($worker['marital_status_name']); ?></p>
                                    <p><strong>Marital Status:</strong> <?php echo htmlspecialchars($worker['religion_name']); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> <?php echo htmlspecialchars($worker['email']); ?></p>
                                    <p><strong>Address:</strong> <?php echo htmlspecialchars($worker['address']); ?></p>
                                    <p><strong>Birthplace:</strong> <?php echo htmlspecialchars($worker['birthplace']); ?></p>
                                    <p><strong>Birthday:</strong> <?php echo htmlspecialchars($worker['birthday']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Educational Background -->
                <div class="col-md-6">
                    <div class="card mt-4" style="height: 400px;">
                        <div class="card-body">
                            <h4 class="card-title">Educational Background</h4>
                            <hr>
                            <p><strong>Current Education Level:</strong> <?php echo htmlspecialchars($worker['current_education_level_name']); ?></p>
                            <p><strong>Current Major:</strong> <?php echo htmlspecialchars($worker['current_major']); ?></p>
                            <p><strong>Current School:</strong> <?php echo htmlspecialchars($worker['current_school']); ?></p>
                            <p><strong>Last Education Level:</strong> <?php echo htmlspecialchars($worker['last_education_level_name']); ?></p>
                            <p><strong>Last Major:</strong> <?php echo htmlspecialchars($worker['last_major']); ?></p>
                            <p><strong>English Proficiency:</strong>
                                <?php
                                $levels = [
                                    1 => 'Beginner',
                                    2 => 'Intermediate',
                                    3 => 'Advanced',
                                    4 => 'Fluent',
                                    5 => 'Native',
                                ];
                                
                                echo isset($levels[(int) $worker['english_proficiency']]) ? htmlspecialchars($levels[(int) $worker['english_proficiency']]) : 'Unknown';
                                ?>
                            </p>
                            <p><strong>Toefl Score:</strong> <?php echo htmlspecialchars($worker['toefl_score']); ?></p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Work Experience -->
                <div class="col-md-6">
                    <div class="card mt-4" style="height: 400px;">
                        <div class="card-body">
                            <h4 class="card-title">Work Experience</h4>
                            <hr>
                            <p><strong>Last Position:</strong> <?php echo htmlspecialchars($worker['last_position']); ?></p>
                            <p><strong>Last Company:</strong> <?php echo htmlspecialchars($worker['last_company']); ?></p>
                            <p><strong>Last Job Description:</strong> <?php echo htmlspecialchars($worker['last_job_desc']); ?></p>
                            <p><strong>Skill Level:</strong>
                                <?php
                                $levels = [
                                    1 => 'Beginner',
                                    2 => 'Intermediate',
                                    3 => 'Advanced',
                                    4 => 'Expert',
                                    5 => 'Master',
                                ];
                                
                                echo isset($levels[(int) $worker['skill_level']]) ? htmlspecialchars($levels[(int) $worker['skill_level']]) : 'Unknown';
                                ?>
                            </p>
                            <p><strong>Internet:</strong>
                                <?php
                                $qualities = [
                                    1 => 'Very Poor',
                                    2 => 'Poor',
                                    3 => 'Average',
                                    4 => 'Good',
                                    5 => 'Excellent',
                                ];
                                
                                echo isset($qualities[(int) $worker['internet']]) ? htmlspecialchars($qualities[(int) $worker['internet']]) : 'Unknown';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Documents and Portfolio -->
                <div class="col-md-6">
                    <div class="card mt-4" style="height: 400px;">
                        <div class="card-body">
                            <h4 class="card-title">Documents and Portfolio</h4>
                            <hr>

                            <?php if (empty($worker['introduction']) && empty($worker['cv']) && empty($worker['portofolio'])): ?>
                            <p>Document & portfolio not available</p>
                            <?php endif; ?>

                            <?php if (!empty($worker['introduction'])): ?>
                            <p><strong>Introduction:</strong> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#introductionModal">Watch Video (Audio Only)</a></p>

                            <div class="modal fade" id="introductionModal" tabindex="-1"
                                aria-labelledby="introductionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="introductionModalLabel">Introduction Video
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <video controls style="width: 100%;">
                                                <source src="<?php echo htmlspecialchars($worker['introduction']); ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($worker['cv'])): ?>
                            <p><strong>CV:</strong> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#cvPreviewModal">Preview</a></p>

                            <!-- Bootstrap Modal -->
                            <div class="modal fade" id="cvPreviewModal" tabindex="-1"
                                aria-labelledby="cvPreviewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cvPreviewModalLabel">CV Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="<?php echo htmlspecialchars($worker['cv']); ?>" type="application/pdf" width="100%"
                                                height="600px">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endif; ?>
                            <?php if (!empty($worker['portofolio'])): ?>
                            <p><strong>Portofolio:</strong> <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#PortofolioPreviewModal">Preview</a></p>

                            <div class="modal fade" id="PortofolioPreviewModal" tabindex="-1"
                                aria-labelledby="PortofolioPreviewModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cvPreviewModalLabel">CV Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <embed src="<?php echo htmlspecialchars($worker['portofolio']); ?>" type="application/pdf" width="100%"
                                        height="600px">                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endif; ?>
                            <p><strong>Willing to Relocate:</strong>
                                <?php
                                $options = [
                                    1 => 'Yes',
                                    2 => 'No',
                                ];
                                
                                echo isset($options[(int) $worker['willing']]) ? htmlspecialchars($options[(int) $worker['willing']]) : 'Unknown';
                                ?>
                            </p>
                            <p><strong>In a Recruitment Process:</strong>
                                <?php
                                $options = [
                                    1 => 'Yes',
                                    2 => 'No',
                                ];
                                
                                echo isset($options[(int) $worker['recruitment']]) ? htmlspecialchars($options[(int) $worker['recruitment']]) : 'Unknown';
                                ?>
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <a href="index.php" class="btn btn-secondary mt-4">Back to List</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (sessionStorage.getItem('resetForm') === 'true') {
                document.getElementById("interviewAssessmentForm").reset(); // Reset formulir
                sessionStorage.removeItem('resetForm'); // Hapus data sesi
            }
        });
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
