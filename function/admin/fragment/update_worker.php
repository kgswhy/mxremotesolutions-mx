<?php
require '../../worker_function.php';
require '../../getData.php';

// Tentukan kunci enkripsi
$encryption_key = 'mxremotesolutions';

if (isset($_GET['id'])) {
    $worker_id_encrypted = $_GET['id'];
    $worker_id = decrypt($worker_id_encrypted, $encryption_key);

    if (is_numeric($worker_id)) {
        // Lanjutkan dengan logika untuk mengupdate worker
        $worker = get_worker_by_id($worker_id);

        if (!$worker) {
            die('Worker not found.');
        }
    } else {
        die('Invalid Worker ID.');
    }
} else {
    die('No Worker ID provided.');
}
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>

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

        .btn-group-toggle .btn input[type="radio"]:checked+label {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>
            Update Worker Detail
        </h1>
        <form method="post" action="submit_worker_update.php" enctype="multipart/form-data">
            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <div class="card mt-4" ">
                <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <input type="hidden" name="worker_id" value="<?php echo htmlspecialchars($worker_id); ?>">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname"><strong>Full Name:</strong></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($worker['fullname']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="shortname"><strong>Short Name:</strong></label>
                                <input type="text" class="form-control" id="shortname" name="shortname" value="<?php echo htmlspecialchars($worker['shortname']); ?>">
                            </div>
                            <!-- <div class="form-group">
                                <label for="position"><strong>Position:</strong></label>
                                <select id="desired_position_id" name="desired_position_id" class="form-control" required>
                                    <option value="" selected>Select Position</option>
                                    <?php
                                    foreach ($positions as $level_position) {
                                        $selected = $worker['desired_position_id'] == $level_position['id'] ? 'selected' : '';
                                        echo "<option value=\"{$level_position['id']}\" $selected>{$level_position['name']}</option>";
                                    }
                                    ?>
                                </select>                            </div> -->
                            <div class="form-group">
                                <label for="gender"><strong>Gender:</strong></label>
                                <select id="gender_id" name="gender_id" class="form-control">
                                    <?php
                                    foreach ($genders as $gender) {
                                        $selected = $worker['gender_id'] == $gender['id'] ? 'selected' : '';
                                        echo "<option value=\"{$gender['id']}\">{$gender['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone"><strong>Phone:</strong></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($worker['phone']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="religion"><strong>Religion:</strong></label>
                                <select id="religion_id" name="religion_id" class="form-control" required>
                                    <option value="" selected>Select Religion</option>
                                    <?php
                                    foreach ($religions as $religion) {
                                        $selected = $worker['religion_id'] == $religion['id'] ? 'selected' : '';
                                        echo "<option value=\"{$religion['id']}\" $selected>{$religion['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($worker['email']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="address"><strong>Address:</strong></label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($worker['address']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="birthplace"><strong>Birthplace:</strong></label>
                                <input type="text" class="form-control" id="birthplace" name="birthplace" value="<?php echo htmlspecialchars($worker['birthplace']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="birthday"><strong>Birthday:</strong></label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($worker['birthday']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="marital_status"><strong>Marital Status:</strong></label>
                                <select id="marital_status_id" name="marital_status_id" class="form-control" required>
                                    <option value="" selected>Select Marital Status</option>
                                    <?php
                                    foreach ($marital_statuses as $level) {
                                        $selected = $worker['marital_status_id'] == $level['id'] ? 'selected' : '';
                                        echo "<option value=\"{$level['id']}\" $selected>{$level['name']}</option>";
                                    }
                                    ?>
                                </select>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Educational Background -->
            <div class="col-md-6">
            <div class="card mt-4" ">
                        <div class="card-body">
                            <h4 class="card-title">Educational Background</h4>
                            <hr>
                            <div class="form-group">
                                <label for="current_education_level"><strong>Current Education Level:</strong></label>
                                <select id="current_education_level_id" name="current_education_level_id"
                                    class="form-control">
                                    <option value="test" selected>Select Education Level</option>
                                    <?php
                                    $selected = $worker['current_education_level_id'] == $level['id'] ? 'selected' : '';
                                    foreach ($education_levels as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="current_major"><strong>Current Major:</strong></label>
                                <input type="text" class="form-control" id="current_major" name="current_major"
                                    value="<?php echo htmlspecialchars($worker['current_major']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="current_school"><strong>Current School:</strong></label>
                                <input type="text" class="form-control" id="current_school" name="current_school"
                                    value="<?php echo htmlspecialchars($worker['current_school']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_education_level"><strong>Last Education Level:</strong></label>
                                <select id="last_education_level_id" name="last_education_level_id"
                                    class="form-control">
                                    <?php
                                    $selected = $worker['last_education_level_id'] == $level['id'] ? 'selected' : '';
                                    foreach ($education_levels as $level) {
                                        echo "<option value=\"{$level['id']}\">{$level['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="last_major"><strong>Last Major:</strong></label>
                                <input type="text" class="form-control" id="last_major" name="last_major"
                                    value="<?php echo htmlspecialchars($worker['last_major']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_school"><strong>Last School:</strong></label>
                                <input type="text" class="form-control" id="last_school" name="last_school"
                                    value="<?php echo htmlspecialchars($worker['last_school']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="toefl_score"><strong>Toefl Score:</strong></label>
                                <input type="text" class="form-control" id="toefl_score" name="toefl_score"
                                    value="<?php echo htmlspecialchars($worker['toefl_score']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="english_proficiency"><strong>English Proficiency:</strong></label>
                                <select id="english_proficiency" name="english_proficiency" class="form-control">
                                    <option value="">Select English Proficiency</option>
                                    <?php
                                    $levels = [
                                        1 => 'Beginner',
                                        2 => 'Intermediate',
                                        3 => 'Advanced',
                                        4 => 'Fluent',
                                        5 => 'Native',
                                    ];
                                    
                                    foreach ($levels as $id => $name) {
                                        if ($worker['english_proficiency'] == $id) {
                                            echo "<option value=\"$id\" selected>$name</option>";
                                        } else {
                                            echo "<option value=\"$id\">$name</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Work Experience -->
                <div class="col-md-6">
                    <div class="card mt-4" ">
                <div class="card-body">
                    <h4 class="card-title">Work Experience</h4>
                    <hr>
                    <div class="form-group">
                        <label for="last_position"><strong>Last Position:</strong></label>
                        <input type="text" class="form-control" id="last_position" name="last_position" value="<?php echo htmlspecialchars($worker['last_position']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_company"><strong>Last Company:</strong></label>
                        <input type="text" class="form-control" id="last_company" name="last_company" value="<?php echo htmlspecialchars($worker['last_company']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_job_desc"><strong>Last Job Description:</strong></label>
                        <textarea type="text" class="form-control" id="last_job_desc" name="last_job_desc" value="<?php echo htmlspecialchars($worker['last_job_desc']); ?>"></textarea>
                    </div>
                    <div class="form-group">
                                <label for="skill_level">Skill Level:</label>
                                <select id="skill_level" name="skill_level" class="form-control">
                                    <option value="">Select Skill Level</option>
                                    <?php
                                    $levels = [
                                        1 => 'Beginner',
                                        2 => 'Intermediate',
                                        3 => 'Advanced',
                                        4 => 'Expert',
                                        5 => 'Master',
                                    ];
                                    
                                    foreach ($levels as $id => $name) {
                                        if ($worker['skill_level'] == $id) {
                                            echo "<option value=\"$id\" selected>$name</option>";
                                        } else {
                                            echo "<option value=\"$id\">$name</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="internet">Internet Connection Quality:</label>
                                <select id="internet" name="internet" class="form-control">
                                    <option value="">Select Internet Connection Quality</option>
                                    <?php
                                    $qualities = [
                                        1 => 'Very Poor',
                                        2 => 'Poor',
                                        3 => 'Average',
                                        4 => 'Good',
                                        5 => 'Excellent',
                                    ];
                                    
                                    foreach ($qualities as $id => $name) {
                                        if (isset($worker['internet']) && $worker['internet'] == $id) {
                                            echo "<option value=\"$id\" selected>$name</option>";
                                        } else {
                                            echo "<option value=\"$id\">$name</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                </div>
            </div>
             </div>

             <!-- Documents and Portfolio -->
            <div class="col-md-6">
            <div class="card mt-4" ">
                        <div class="card-body">
                            <h4 class="card-title">Documents and Portfolio</h4>
                            <hr>

                            <div class="form-group">
                                <label for="willing">Willing to Relocate:</label>
                                <select id="willing" name="willing" class="form-control">
                                    <option value="">Are You Willing to Have Another Full-Time Job While Doing
                                        This Remote Internship?</option>
                                    <?php
                                    $options = [
                                        1 => 'Yes',
                                        2 => 'No',
                                    ];
                                    
                                    foreach ($options as $id => $label) {
                                        if (isset($worker['willing']) && $worker['willing'] == $id) {
                                            echo "<option value=\"$id\" selected>$label</option>";
                                        } else {
                                            echo "<option value=\"$id\">$label</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="recruitment">In a Recruitment Process:</label>
                                <select id="recruitment" name="recruitment" class="form-control">
                                    <option value="">In a Recruitment Process With Other Company?</option>
                                    <?php
                                    $options = [
                                        1 => 'Yes',
                                        2 => 'No',
                                    ];
                                    foreach ($options as $id => $label) {
                                        if (isset($worker['recruitment']) && $worker['recruitment'] == $id) {
                                            echo "<option value=\"$id\" selected>$label</option>";
                                        } else {
                                            echo "<option value=\"$id\">$label</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Introduction -->
                            <div class="form-group">
                                <label for="introduction"><strong>Introduction:</strong></label>
                                <input type="file" class="form-control" id="introduction" name="introduction"
                                    accept="video/*">

                                <?php if (!empty($worker['introduction'])): ?>
                                <div class="mt-2">
                                    <a href="<?php echo htmlspecialchars($worker['introduction']); ?>" target="_blank">View Current Introduction</a>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="referral"><strong>referral:</strong></label>
                                <input type="text" class="form-control" id="referral" name="referral"
                                    value="<?php echo htmlspecialchars($worker['referral']); ?>">
                            </div>

                            <!-- CV -->
                            <div class="form-group">
                                <label for="cv"><strong>CV:</strong></label>
                                <input type="file" class="form-control" id="cv" name="cv"
                                    value="<?php echo htmlspecialchars($worker['cv']); ?>">
                            </div>

                            <!-- Portfolio -->
                            <div class="form-group">
                                <label for="portofolio"><strong>Portfolio:</strong></label>
                                <input type="file" class="form-control" id="portofolio" name="portofolio"
                                    value="<?php echo htmlspecialchars($worker['portofolio']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

</html>
