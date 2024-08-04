<?php
require '../../auth_function.php';
require '../../worker_function.php';
require '../../getData.php';
require '../../rating_function.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!is_admin_logged_in()) {
    header('Location: ../login.php');
    exit();
}

if (!can_access()) {
    // Redirect to an access denied page or home
    header('Location: ./access_denied.php');
    exit();
}


$interview_id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$interview = get_worker_interview_by_id($interview_id);

if (!$interview) {
    echo "Data wawancara tidak ditemukan.";
    exit;
}

$worker = get_worker_by_id($interview['worker_id']);
$rating_options = get_rating_options();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions - Interview Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.png" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../../css/style.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
<div class="d-flex">
        </div>

    <div class="container-fluid p-4" style="height: 100vh">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Interview Detail for <?= $worker['fullname'] ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            // Data pribadi kandidat
                            $personal_info = [
                                'Candidate Name' => $interview['candidate_name'],
                                'Applied Position' => $interview['applied_position'],
                                'Interview Date' => $interview['interview_date'],
                                'Interviewer' => $interview['interviewer']
                            ];

                            foreach ($personal_info as $label => $value) {
                                echo "<div class='col-md-6 mb-3'>";
                                echo "<label class='form-label'>{$label}</label>";
                                echo "<input type='text' class='form-control' value='{$value}' readonly>";
                                echo "</div>";
                            }
                            ?>
                        </div>

                        <div class="row">
                            <?php
                             $rating_fields = [
                                'educational_background_id',
                                'prior_work_experience_id',
                                'technical_skills_id',
                                'verbal_communication_id',
                                'candidate_enthusiasm_id',
                                'teambuilding_skills_id',
                                'initiative_id',
                                'time_management_id',
                                'dedication_id'
                            ];
                            // Rating penilaian wawancara
                            foreach ($rating_fields as $field) {
                                $rating_id = $interview[$field];
                                $rating_value = get_rating_name_by_id($rating_id);
                                echo "<div class='col-md-4 mb-3'>";
                                echo "<label class='form-label'>" . ucwords(str_replace('_id', '', $field)) . "</label>";
                                echo "<input type='text' class='form-control' value='{$rating_value}' readonly>";
                                echo "</div>";
                            }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class='form-label'>Overall Recommendation</label>
                                <textarea class='form-control' readonly><?= $interview['overall_recommendation'] ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class='form-label'>Notes</label>
                                <textarea class='form-control' readonly><?= $interview['notes'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="interview.php" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


