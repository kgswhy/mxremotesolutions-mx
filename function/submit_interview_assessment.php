<?php
// submit_interview_assessment.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'utilities.php'; // Pastikan file utilities.php berada di lokasi yang benar

// Periksa apakah data formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require './worker_function.php';
    // Ambil dan bersihkan data dari formulir
    $worker_id = clean_input($_POST['worker_id']);
    $candidate_name = validate_input($_POST['candidate']);
    $applied_position = validate_input($_POST['appliedPosition']);
    $interview_date = validate_input($_POST['interview_date']);
    $interviewer = validate_input($_POST['interviewer']);
    $educational_background_id = validate_input($_POST['educational_background_id']);
    $prior_work_experience_id = validate_input($_POST['prior_work_experience_id']);
    $technical_skills_id = validate_input($_POST['technical_skills_id']);
    $verbal_communication_id = validate_input($_POST['verbal_communication_id']);
    $candidate_enthusiasm_id = validate_input($_POST['candidate_enthusiasm_id']);
    $teambuilding_skills_id = validate_input($_POST['teambuilding_skills_id']);
    $initiative_id = validate_input($_POST['initiative_id']);
    $time_management_id = validate_input($_POST['time_management_id']);
    $dedication_id = validate_input($_POST['dedication_id']);
    $overall_recommendation = validate_input($_POST['overall_recommendation']);
    $notes = validate_input($_POST['notes']);

    // Panggil fungsi untuk menyimpan data penilaian wawancara ke dalam database
    $result = submit_interview_assessment($worker_id, $candidate_name, $applied_position, $interview_date, $interviewer, $educational_background_id, $prior_work_experience_id, $technical_skills_id, $verbal_communication_id, $candidate_enthusiasm_id, $teambuilding_skills_id, $initiative_id, $time_management_id, $dedication_id, $overall_recommendation, $notes);

    // Periksa apakah penyimpanan berhasil
    if ($result) {
        echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Penilaian Berhasil!',
                text: 'Data penilaian wawancara berhasil disimpan.',
                showConfirmButton: false,
                timer: 1500 // Tutup otomatis setelah 1.5 detik
            }).then(function() {
                
                window.location = './admin/fragment/interview.php'; 
            });
        });
    </script>";
    exit();
    exit();
    } else {
        // Jika gagal, munculkan pesan kesalahan atau lakukan tindakan lain yang sesuai
        echo "Gagal menyimpan data penilaian wawancara.";
    }
} else {
    // Jika halaman diakses tanpa pengiriman data formulir, tampilkan pesan atau lakukan tindakan lain yang sesuai
    echo "Akses tidak sah.";
}
?>
