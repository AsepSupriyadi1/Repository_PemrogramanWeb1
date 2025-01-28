<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../../helper/connection.php';

$post_id = intval($_GET['post_id']);
$user_id = $_SESSION['user_id'];

try {
    // Hapus data di tb_bookmark
    $sql = "DELETE FROM tb_bookmark_post WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Hapus data di tb_recent_post
    $sql = "DELETE FROM tb_recent_post WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Hapus data di tb_posts
    $sqlPost = "DELETE FROM tb_posts WHERE post_id = ?";
    $stmtPost = $conn->prepare($sqlPost);
    $stmtPost->bind_param("i", $post_id);
    $stmtPost->execute();

    $stmt->close();
    $stmtPost->close();
    header("Location: /Cakwe/home?message=post_delete_success");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
    header("Location: /Cakwe/home?message=post_delete_failed");
    exit();
}
