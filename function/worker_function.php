<?php
require 'db_connection.php';
require 'utilities.php';
// Fungsi untuk validasi dan sanitasi input
function register_worker($data, $files)
{
    global $pdo; // Akses koneksi database PDO yang telah disiapkan sebelumnya

    try {
        // Validasi dan sanitasi input untuk personal information
        $fullname = isset($data['fullname']) ? validate_input($data['fullname']) : null;
        $shortname = isset($data['shortname']) ? validate_input($data['shortname']) : null;
        $gender_id = isset($data['gender_id']) ? (int) $data['gender_id'] : null;
        $phone = isset($data['phone']) ? validate_input($data['phone']) : null;
        $email = isset($data['email']) ? (validate_email($data['email']) ? $data['email'] : null) : null;
        $address = isset($data['address']) ? validate_input($data['address']) : null;
        $birthplace = isset($data['birthplace']) ? validate_input($data['birthplace']) : null;
        $birthday = isset($data['birthday']) ? $data['birthday'] : null;
        $religion_id = isset($data['religion_id']) ? (int) $data['religion_id'] : null;
        $marital_status_id = isset($data['marital_status_id']) ? (int) $data['marital_status_id'] : null;

        // Validasi dan sanitasi input untuk educational background
        $current_education_level_id = isset($data['current_education_level_id']) ? (int) $data['current_education_level_id'] : null;
        $current_major = isset($data['current_major']) ? validate_input($data['current_major']) : null;
        $current_school = isset($data['current_school']) ? validate_input($data['current_school']) : null;
        $last_education_level_id = isset($data['last_education_level_id']) ? (int) $data['last_education_level_id'] : null;
        $last_major = isset($data['last_major']) ? validate_input($data['last_major']) : null;
        $last_school = isset($data['last_school']) ? validate_input($data['last_school']) : null;
        $english_proficiency = isset($data['english_proficiency']) ? (int) $data['english_proficiency'] : null;
        $toefl_score = isset($data['toefl_score']) ? (int) $data['toefl_score'] : null;

        // Validasi dan sanitasi input untuk work experience
        $last_position = isset($data['last_position']) ? validate_input($data['last_position']) : null;
        $last_company = isset($data['last_company']) ? validate_input($data['last_company']) : null;
        $desired_position_id = isset($data['desired_position_id']) ? (int) $data['desired_position_id'] : null;
        $last_job_desc = isset($data['last_job_desc']) ? validate_input($data['last_job_desc']) : null;

        // Validasi dan sanitasi input untuk documents and portfolio
        $skill_level = isset($data['skill_level']) ? (int) $data['skill_level'] : null;
        $internet = isset($data['internet']) ? (int) $data['internet'] : null;
        $willing = isset($data['willing']) ? (int) $data['willing'] : null;
        $recruitment = isset($data['recruitment']) ? (int) $data['recruitment'] : null;
        $referral = isset($data['referral']) ? validate_input($data['referral']) : null;

        // Fungsi untuk mengunggah file
        function upload_file($file, $directory, $max_file_size_mb)
        {
            // Default value for $file_path
            $file_path = '';
            
            // Check if file is provided
            if (!isset($file) || $file['error'] != 0) {
                return $file_path;
            }
        
            // Check if file size exceeds the limit
            if ($file['size'] > ($max_file_size_mb * 1024 * 1024)) {
                return "File size exceeds the limit of {$max_file_size_mb} MB.";
            }
        
            $target_file = $directory . basename($file['name']);
            $final_path = '../../' . $target_file; // Final path to be inserted into the database
            if (move_uploaded_file($file['tmp_name'], $final_path)) {
                $file_path = $target_file; // Update the $file_path value if successfully uploaded
            }
        
            return $file_path;
        }
        
        // Maximum file size for introduction file (in MB)
        $max_intro_size_mb = 15;
        
        // Upload introduction file and get its path
        $introduction_path = upload_file($files['introduction'] ?? null, './introduction/', $max_intro_size_mb);
        
        // Upload CV file and get its path
        $cv_path = upload_file($files['cv'] ?? null, './cvWorker/', 10);
        
        // Upload portfolio file and get its path
        $portofolio_path = upload_file($files['portfolio'] ?? null, './portfolio/', 10);
        
        // Handle cases where the upload might have failed or was not provided
        if (is_string($introduction_path) && strpos($introduction_path, "File size exceeds") === 0) {
            // Handle file size error for introduction
            // You might want to return or handle this error
            echo json_encode(["success" => false, "error" => $introduction_path]);
            exit;
        }
        
        if (is_string($cv_path) && strpos($cv_path, "File size exceeds") === 0) {
            // Handle file size error for CV
            // You might want to return or handle this error
            echo json_encode(["success" => false, "error" => $cv_path]);
            exit;
        }
        
        if (is_string($portofolio_path) && strpos($portofolio_path, "File size exceeds") === 0) {
            // Handle file size error for portfolio
            // You might want to return or handle this error
            echo json_encode(["success" => false, "error" => $portofolio_path]);
            exit;
        }
        
        // Use $introduction_path, $cv_path, and $portfolio_path as needed
        // If files were not uploaded, their paths will be empty strings
        

        // Simpan data ke dalam tabel worker
        $sql = "INSERT INTO worker (
    fullname, shortname, gender_id, phone, email, address, birthplace, birthday, religion_id, marital_status_id,
    current_education_level_id, current_major, current_school,
    last_education_level_id, last_major, last_school,
    english_proficiency, toefl_score, last_position, last_company,
    last_job_desc, desired_position_id, skill_level, internet,
    willing, recruitment, introduction, cv, portofolio, referral,
    status_worker_id
) VALUES (
    :fullname, :shortname, :gender_id, :phone, :email, :address, :birthplace, :birthday, :religion_id, :marital_status_id,
    :current_education_level_id, :current_major, :current_school,
    :last_education_level_id, :last_major, :last_school,
    :english_proficiency, :toefl_score, :last_position, :last_company,
    :last_job_desc, :desired_position_id, :skill_level, :internet,
    :willing, :recruitment, :introduction, :cv, :portofolio, :referral,
    '1'  
)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':fullname' => $fullname,
            ':shortname' => $shortname,
            ':gender_id' => $gender_id,
            ':phone' => $phone,
            ':email' => $email,
            ':address' => $address,
            ':birthplace' => $birthplace,
            ':birthday' => $birthday,
            ':religion_id' => $religion_id,
            ':marital_status_id' => $marital_status_id,
            ':current_education_level_id' => $current_education_level_id,
            ':current_major' => $current_major,
            ':current_school' => $current_school,
            ':last_education_level_id' => $last_education_level_id,
            ':last_major' => $last_major,
            ':last_school' => $last_school,
            ':english_proficiency' => $english_proficiency,
            ':toefl_score' => $toefl_score,
            ':last_position' => $last_position,
            ':last_company' => $last_company,
            ':last_job_desc' => $last_job_desc,
            ':desired_position_id' => $desired_position_id,
            ':skill_level' => $skill_level,
            ':internet' => $internet,
            ':willing' => $willing,
            ':recruitment' => $recruitment,
            ':introduction' => $introduction_path,
            ':cv' => $cv_path,
            ':portofolio' => $portofolio_path,
            ':referral' => $referral,
        ]);
        return true; // Sukses
    } catch (PDOException $e) {
        echo 'Worker Registration Error: ' . $e->getMessage(); // Log kesalahan
        return false; // Gagal
    }
}

function get_workers()
{
    global $pdo;

    $sql = "SELECT w.*, 
                g.name AS gender_name, 
                ms.name AS marital_status_name, 
                r.name AS religion_name, 
                ce.name AS current_education_level_name, 
                le.name AS last_education_level_name, 
                p.name AS position_table_name, 
                sw.name AS status_worker_name
            FROM worker w 
            LEFT JOIN gender g ON w.gender_id = g.id 
            LEFT JOIN marital_status ms ON w.marital_status_id = ms.id 
            LEFT JOIN religion r ON w.religion_id = r.id 
            LEFT JOIN education_level ce ON w.current_education_level_id = ce.id 
            LEFT JOIN education_level le ON w.last_education_level_id = le.id 
            LEFT JOIN position_table p ON w.desired_position_id = p.id 
            LEFT JOIN status_worker sw ON w.status_worker_id = sw.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_worker_by_id($id)
{
    global $pdo;

    // Pastikan ID adalah angka
    if (!is_numeric($id)) {
        return null;
    }

    // Konversi ke integer untuk menghindari SQL injection
    $worker_id = (int) $id;

    // Query untuk mendapatkan informasi pekerja dengan ID tertentu
    $stmt = $pdo->prepare("SELECT w.*, 
                                  g.name AS gender_name, 
                                  ms.name AS marital_status_name, 
                                  r.name AS religion_name, 
                                  ce.name AS current_education_level_name, 
                                  le.name AS last_education_level_name, 
                                  p.name AS position_table_name, 
                                  sw.name AS status_worker_name
                            FROM worker w 
                            LEFT JOIN gender g ON w.gender_id = g.id 
                            LEFT JOIN marital_status ms ON w.marital_status_id = ms.id 
                            LEFT JOIN religion r ON w.religion_id = r.id 
                            LEFT JOIN education_level ce ON w.current_education_level_id = ce.id 
                            LEFT JOIN education_level le ON w.last_education_level_id = le.id 
                            LEFT JOIN position_table p ON w.desired_position_id = p.id 
                            LEFT JOIN status_worker sw ON w.status_worker_id = sw.id 
                            WHERE w.id = :id");

    // Mengikat parameter untuk mencegah SQL injection
    $stmt->bindParam(':id', $worker_id);

    // Eksekusi query
    $stmt->execute();

    // Mengambil hasil sebagai array asosiatif
    $worker = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika tidak ada pekerja dengan ID ini, kembalikan null
    return $worker ?: null;
}

function update_status_worker_by_id($worker_id, $new_status)
{
    global $pdo;

    // Pastikan ID pekerja adalah angka dan status adalah angka
    if (!is_numeric($worker_id) || !is_numeric($new_status)) {
        throw new InvalidArgumentException('Invalid worker ID or status.');
    }

    // Konversi ID dan status ke integer untuk keamanan
    $worker_id = (int) $worker_id;
    $new_status = (int) $new_status;

    // Query untuk memperbarui status pekerja
    $stmt = $pdo->prepare('UPDATE worker SET status_worker_id = :new_status WHERE id = :worker_id');
    $stmt->bindParam(':worker_id', $worker_id);
    $stmt->bindParam(':new_status', $new_status);

    // Eksekusi query dan pastikan itu berhasil
    if ($stmt->execute()) {
        return true; // Mengindikasikan bahwa pembaruan berhasil
    } else {
        return false; // Mengindikasikan bahwa pembaruan gagal
    }
}

// Fungsi untuk mendapatkan jumlah pekerja
function get_total_workers()
{
    global $pdo;

    try {
        $sql = 'SELECT COUNT(*) AS total FROM worker';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalWorkers = $row['total'];
        return $totalWorkers;
    } catch (PDOException $e) {
        error_log('Error: ' . $e->getMessage());
        return false;
    }
}

function submit_interview_assessment($worker_id, $candidate_name, $applied_position, $interview_date, $interviewer, $educational_background_id, $prior_work_experience_id, $technical_skills_id, $verbal_communication_id, $candidate_enthusiasm_id, $teambuilding_skills_id, $initiative_id, $time_management_id, $dedication_id, $overall_recommendation, $notes)
{
    global $pdo;

    try {
        // Query untuk memasukkan data penilaian wawancara ke dalam tabel worker_interview
        $sql = "INSERT INTO worker_interview (
                    worker_id,
                    candidate_name,
                    applied_position,
                    interview_date,
                    interviewer,
                    educational_background_id,
                    prior_work_experience_id,
                    technical_skills_id,
                    verbal_communication_id,
                    candidate_enthusiasm_id,
                    teambuilding_skills_id,
                    initiative_id,
                    time_management_id,
                    dedication_id,
                    overall_recommendation,
                    notes
                ) VALUES (
                    :worker_id,
                    :candidate_name,
                    :applied_position,
                    :interview_date,
                    :interviewer,
                    :educational_background_id,
                    :prior_work_experience_id,
                    :technical_skills_id,
                    :verbal_communication_id,
                    :candidate_enthusiasm_id,
                    :teambuilding_skills_id,
                    :initiative_id,
                    :time_management_id,
                    :dedication_id,
                    :overall_recommendation,
                    :notes
                )";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':worker_id', $worker_id);
        $stmt->bindParam(':candidate_name', $candidate_name);
        $stmt->bindParam(':applied_position', $applied_position);
        $stmt->bindParam(':interview_date', $interview_date);
        $stmt->bindParam(':interviewer', $interviewer);
        $stmt->bindParam(':educational_background_id', $educational_background_id);
        $stmt->bindParam(':prior_work_experience_id', $prior_work_experience_id);
        $stmt->bindParam(':technical_skills_id', $technical_skills_id);
        $stmt->bindParam(':verbal_communication_id', $verbal_communication_id);
        $stmt->bindParam(':candidate_enthusiasm_id', $candidate_enthusiasm_id);
        $stmt->bindParam(':teambuilding_skills_id', $teambuilding_skills_id);
        $stmt->bindParam(':initiative_id', $initiative_id);
        $stmt->bindParam(':time_management_id', $time_management_id);
        $stmt->bindParam(':dedication_id', $dedication_id);
        $stmt->bindParam(':overall_recommendation', $overall_recommendation);
        $stmt->bindParam(':notes', $notes);
        $stmt->execute();

        return true; // Submission berhasil
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Log kesalahan
        return false; // Submission gagal
    }
}

function get_worker_interview($worker_id)
{
    global $pdo;

    // Pastikan ID worker valid (numeric)
    if (!is_numeric($worker_id)) {
        return null;
    }

    try {
        // Query untuk mendapatkan data penilaian wawancara berdasarkan worker_id
        $sql = "SELECT * FROM worker_interview WHERE worker_id = :worker_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':worker_id', $worker_id, PDO::PARAM_INT); // Mengikat parameter worker_id
        $stmt->execute();

        // Ambil data dan kembalikan sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Log kesalahan (untuk keperluan debugging)
        return null; // Kembalikan null jika terjadi kesalahan
    }
}

// Di dalam worker_function.php
function get_worker_interview_by_id($interview_id) {
    global $pdo; // Pastikan Anda telah membuat koneksi database $pdo di file db_connection.php

    // Validasi input interview_id (pastikan bertipe integer)
    if (!is_numeric($interview_id)) {
        throw new InvalidArgumentException("Invalid interview ID.");
    }

    try {
        // Query untuk mengambil data penilaian wawancara berdasarkan interview_id
        $sql = "SELECT * FROM worker_interview WHERE interview_id = :interview_id";
        
        // Persiapan prepared statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':interview_id', $interview_id, PDO::PARAM_INT); // Mengikat parameter dengan nilai yang sesuai

        // Eksekusi query
        $stmt->execute();

        // Ambil data dan kembalikan sebagai array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Tangani kesalahan database jika terjadi
        echo 'Error: ' . $e->getMessage();
        return null; // Kembalikan null jika terjadi kesalahan
    }
}


?>
