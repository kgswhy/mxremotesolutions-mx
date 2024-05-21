<?php

require 'db_connection.php'; // Ganti dengan file koneksi database Anda

// Fungsi untuk mendapatkan semua posisi
function get_positions() {
    global $pdo;

    try {
        $sql = "SELECT * FROM position_table";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($positions === false) {
            // Jika kueri tidak mengembalikan hasil, tampilkan pesan kesalahan
            error_log("Error fetching positions: Query execution failed");
            return [];
        }

        return $positions;
    } catch (PDOException $e) {
        // Tangani kesalahan PDOException
        error_log("Error fetching positions: " . $e->getMessage());
        return [];
    }
}

function get_position_by_name($name) {
    global $pdo;

    try {
        $sql = "SELECT * FROM position_table WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        var_dump($stmt->errorInfo());
        $position = $stmt->fetch(PDO::FETCH_ASSOC);
        return $position;
    } catch (PDOException $e) {
        error_log("Error fetching position by name: " . $e->getMessage());
        return false;
    }
}
function add_position($name) {
    global $pdo; // Access the global PDO object

    try {
        // Prepare the SQL query
        $sql = "INSERT INTO position_table (name) VALUES (:name)";
        $stmt = $pdo->prepare($sql);

        // Bind the parameter and execute the statement
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        // Return true if the addition is successful
        return true;
    } catch (PDOException $e) {
        // Log any errors and return false
        error_log("Error adding position: " . $e->getMessage());
        return false;
    }
}
?>


// Fungsi untuk mengubah posisi
function edit_position($id, $name) {
    global $pdo;

    try {
        $sql = "UPDATE position_table SET name = :name WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error updating position: " . $e->getMessage());
        return false;
    }
}


// Fungsi untuk menghapus posisi
function delete_position($id) {
    global $pdo;

    try {
        $sql = "DELETE FROM position_table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error deleting position: " . $e->getMessage());
        return false;
    }
}

?>
