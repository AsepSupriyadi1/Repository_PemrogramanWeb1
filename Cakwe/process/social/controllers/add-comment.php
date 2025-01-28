<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../../helper/connection.php';
require_once __DIR__ . '../../../../helper/security-helper.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi user login
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
        $post_id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_STRING);

        $encrypted_post_id = encryptId($post_id);

        if (!$message) {
            throw new Exception('Message is required');
        }

        // Query untuk menyimpan data post
        $sql = "INSERT INTO tb_comments (post_id, user_id, message) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $post_id, $user_id, $message);

        if ($stmt->execute()) {
            header("Location: /Cakwe/detail-post?id=$encrypted_post_id");
            exit();
        } else {
            throw new Exception('Error adding comment');
        }
    }
} catch (Exception $e) {
    header("Location: /Cakwe/detail-post?id=$encrypted_post_id");
    exit();
}
