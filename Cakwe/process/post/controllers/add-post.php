<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../../helper/connection.php';

// Function to validate YouTube URL
function isValidYoutubeUrl($url)
{
    $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[a-zA-Z0-9_-]+/';
    return preg_match($pattern, $url);
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi user login
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $link = filter_input(INPUT_POST, 'link', FILTER_VALIDATE_URL);
        $image = $_FILES['image'] ?? null;

        if (!$title) {
            throw new Exception('Title is required');
        }

        // Validate YouTube URL if link is provided
        if ($link && !isValidYoutubeUrl($link)) {
            throw new Exception('Only YouTube links are allowed');
        }

        // Validasi dan konversi gambar ke BLOB
        $post_image = null;
        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            // Check file size - 2MB maximum
            if ($image['size'] > 2097152) {
                throw new Exception('Image size must be less than 2MB');
            }

            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image['type'], $allowed_types)) {
                throw new Exception('Invalid image type');
            }

            $post_image = file_get_contents($image['tmp_name']);
        }

        // Query untuk menyimpan data post
        $sql = "INSERT INTO tb_posts (title, description, post_image, link, user_id) VALUES (?, ?, ?, ?, ?)";
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
    exit();
}