<?php
require '../../worker_function.php';

try {
    // Pastikan request adalah POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['worker_id']) && is_numeric($_POST['worker_id'])) {
            $worker_id = (int)$_POST['worker_id'];
            $new_status = isset($_POST['new_status']) ? (int)$_POST['new_status'] : null;

            // Pastikan status valid
            if ($new_status !== null) {
                $result = update_status_worker_by_id($worker_id, $new_status);

                if ($result) {
                    echo "<script>alert('Worker status updated successfully.'); window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Failed to update worker status.'); window.location.href='index.php';</script>";
                }
            } else {
                echo "<script>alert('Invalid status.'); window.location.href='index.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid worker ID.'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid request method.'); window.location.href='index.php';</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('An error occurred: " . htmlspecialchars($e->getMessage()) . "'); window.location.href='display_workers.php';</script>";
}
