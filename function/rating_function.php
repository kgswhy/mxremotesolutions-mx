<?php

require 'db_connection.php';

// Function to get all rating options
function get_rating_options() {
    global $pdo;

    try {
        $sql = "SELECT * FROM rating_options";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}

// Function to get rating name by ID
function get_rating_name_by_id($rating_id) {
    global $pdo;

    if (!is_numeric($rating_id)) {
        throw new InvalidArgumentException("Invalid rating ID.");
    }

    try {
        $sql = "SELECT rating_value FROM rating_options WHERE rating_id = :rating_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() instead of fetchAll()
        return $row ? (string)$row['rating_value'] : '-';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return '-';
    }
}

?>
