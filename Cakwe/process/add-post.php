<?php
require_once __DIR__ . '/../helper/connection.php';
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi user login
        if (!isset($_SESSION['user_id'])) {
            header("Location: /Cakwe/home?message=post_not_login");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $link = filter_input(INPUT_POST, 'link', FILTER_VALIDATE_URL);
        $image = $_FILES['image'] ?? null;

        if (!$title) {
            throw new Exception('Title is required');
        }

        // Validasi dan konversi gambar ke BLOB
        $post_image = null;
        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image['type'], $allowed_types)) {
                throw new Exception('Invalid image type');
            }

            $post_image = file_get_contents($image['tmp_name']);
        }

        // Query untuk menyimpan data post
        $sql = "INSERT INTO post (title, description, post_image, link, user_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $description, $post_image, $link, $user_id);

        if ($stmt->execute()) {
            header("Location: /Cakwe/home?message=post_success");
            exit();
        } else {
            throw new Exception('Error adding post');
        }
    }
} catch (Exception $e) {
    header("Location: /Cakwe/home?message=post_failed");
    header("Location: /Cakwe/error?message=" . $e->getMessage());
    exit();
}
