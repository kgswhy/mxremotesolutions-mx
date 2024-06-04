<?php
require 'db_connection.php';  // Koneksi ke database
require 'utilities.php';     // Fungsi utilitas untuk sanitasi dan validasi

try {
    // Validasi untuk memastikan field yang diperlukan sudah diisi
    if (!isset($_POST['temporary_pic_name']) || !isset($_POST['temporary_pic_email']) ||
        !isset($_POST['temporary_company_name']) || !isset($_POST['temporary_phone']) ||
        !isset($_POST['temporary_positions'])) {
        throw new Exception("All fields are required.");
    }

    // Ambil data dari formulir dan sanitasi
    $name = clean_input($_POST['temporary_pic_name']);  // Sanitasi input teks
    $email = validate_email($_POST['temporary_pic_email']) ? $_POST['temporary_pic_email'] : null;  // Validasi email
    $company_name = clean_input($_POST['temporary_company_name']);  // Sanitasi input
    $phone = clean_input($_POST['temporary_phone']);  // Sanitasi input telepon
    $looking_position = (int)$_POST['temporary_positions'];  // Konversi ke integer
    
    if (!$email) {
        throw new Exception("Invalid email format.");
    }

    // Pernyataan SQL untuk memasukkan data ke tabel "temporary_company"
    $sql = "INSERT INTO temporary_company (name, email, phone, company, position_id) 
            VALUES (:name, :email, :phone, :company_name, :looking_position)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':company_name' => $company_name,
        ':phone' => $phone,
        ':looking_position' => $looking_position
    ]);

    // Jika berhasil, arahkan ke halaman dengan pesan sukses
    header("Location: ../hireintern.php?success=true");
    exit();
} catch (PDOException $e) {
    // Tangani duplikasi email khusus
    if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
        // Abaikan duplikasi entri email dan lanjutkan
        header("Location: ../hireintern.php?success=true");
        exit();
    } else {
        // Penanganan kesalahan database lainnya
        echo "Database Error: " . $e->getMessage();
    }
} catch (Exception $e) {
    // Penanganan kesalahan lainnya
    echo "Error: " . $e->getMessage();
}
?>
