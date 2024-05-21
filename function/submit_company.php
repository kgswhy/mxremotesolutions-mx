<?php
require 'db_connection.php'; // Koneksi ke database
require 'utilities.php'; // Utilitas untuk validasi dan sanitasi

try {
    // Mulai transaksi untuk memastikan konsistensi database
    $pdo->beginTransaction();

    // Data dari bagian Company Information
    $name = clean_input($_POST['name']);
    $website = clean_input($_POST['website']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    $pic_name = clean_input($_POST['pic_name']);
    $pic_phone = clean_input($_POST['pic_phone']);
    $pic_email = clean_input($_POST['pic_email']);

    $target_dir = './uploads/';
    $target_file = $target_dir . basename($_FILES['logo']['name']);
    $logo = null;

    // Periksa apakah file telah diunggah dengan benar
    if (isset($_FILES['logo']['tmp_name']) && !empty($_FILES['logo']['tmp_name'])) {
        // Pindahkan file yang diunggah ke direktori yang ditentukan
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            // Ubah path untuk disimpan di database
            $logo = '../../uploads/' . basename($_FILES['logo']['name']);
        } else {
            echo 'Maaf, terjadi kesalahan saat mengunggah file.';
        }
    } else {
        echo 'Maaf, tidak ada file yang diunggah.';
    }
    // Insert data ke dalam tabel "company"
    $sql = "INSERT INTO company (name, logo, website, address, phone, pic_name, pic_phone, pic_email)
            VALUES (:name, :logo, :website, :address, :phone, :pic_name, :pic_phone, :pic_email)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':logo' => $logo,
        ':website' => $website,
        ':address' => $address,
        ':phone' => $phone,
        ':pic_name' => $pic_name,
        ':pic_phone' => $pic_phone,
        ':pic_email' => $pic_email,
    ]);

    // Dapatkan ID perusahaan yang baru saja dibuat
    $company_id = $pdo->lastInsertId();

    // Data dari bagian Worker Request
    $position_id = (int) $_POST['position_id'];
    $quota = (int) $_POST['quota'];
    $job_level_id = (int) $_POST['job_level_id'];
    $requirement = clean_input($_POST['job_requirement']);
    $description = clean_input($_POST['job_description']);
    $referral = clean_input($_POST['refferal_partner']);

    // Insert data ke dalam tabel "job_opportunity"
    $job_sql = "INSERT INTO job_opportunity (company_id, position_id, quota, job_level_id, requirement, description, referral)
                VALUES (:company_id, :position_id, :quota, :job_level_id, :requirement, :description, :referral)";

    $stmt = $pdo->prepare($job_sql);
    $stmt->execute([
        ':company_id' => $company_id,
        ':position_id' => $position_id,
        ':quota' => $quota,
        ':job_level_id' => $job_level_id,
        ':requirement' => $requirement,
        ':description' => $description,
        ':referral' => $referral,
    ]);

    // Jika berhasil, commit transaksi
    $pdo->commit();

    // Redirect dengan pesan sukses
    header('Location: ../registercompany.php?success=true');
    exit();
} catch (PDOException $e) {
    // Rollback transaksi jika terjadi kesalahan
    $pdo->rollBack();
    echo 'Error: ' . $e->getMessage();
}
