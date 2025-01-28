<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../helper/connection.php';

try {
    // Delete all recent posts
    $sql = "DELETE FROM tb_recent_post WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        header("Location: /Cakwe/home?message=post_success");
        exit();
    } else {
        throw new Exception('Error deleting recent posts');
    }

} catch (Exception $e) {
    echo $e->getMessage();
    // header("Location: /Cakwe/home?message=recent_post_failed");
    exit();
}


