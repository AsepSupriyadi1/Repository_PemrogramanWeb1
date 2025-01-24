<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../helper/connection.php';

$post_id = intval($_GET['post_id']);
$user_id = $_SESSION['user_id'];

try {
    // Validasi jika post_id dan user_id cocok
    $sqlValidation = "SELECT * FROM tb_posts WHERE post_id = ? AND user_id = ?";
    $stmtValidation = $conn->prepare($sqlValidation);
    $stmtValidation->bind_param("ii", $post_id, $user_id);
    $stmtValidation->execute();
    $result = $stmtValidation->get_result();

    if ($result->num_rows === 0) {
        // Jika tidak valid, redirect dengan pesan error
        header("Location: /Cakwe/home?message=not_authorized");
        exit();
    }

    // Hapus data di tb_recent_post
    $sql = "DELETE FROM tb_recent_post WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Hapus data di tb_posts
    $sqlPost = "DELETE FROM tb_posts WHERE post_id = ? AND user_id = ?";
    $stmtPost = $conn->prepare($sqlPost);
    $stmtPost->bind_param("ii", $post_id, $user_id);
    $stmtPost->execute();

    header("Location: /Cakwe/home?message=post_delete_success");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
    header("Location: /Cakwe/home?message=post_delete_failed");
    exit();
}
