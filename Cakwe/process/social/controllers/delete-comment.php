<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../../helper/connection.php';
require_once __DIR__ . '../../../../helper/security-helper.php';

$comment_id = intval($_GET['comment_id']);
$post_id = intval($_GET['post_id']);

$encrypted_post_id = encryptId($post_id);

try {
    // Hapus data di tb_replies
    $sql = "DELETE FROM tb_replies WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();

    // Hapus data di tb_comments
    $sql = "DELETE FROM tb_comments WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();

    $stmt->close();
    header("Location: /Cakwe/detail-post?id=$encrypted_post_id");
    exit();
} catch (Exception $e) {
    echo $e->getMessage();
    header("Location: /Cakwe/detail-post?id=$encrypted_post_id");
    exit();
}
