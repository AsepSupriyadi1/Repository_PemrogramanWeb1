<?php
session_start();
require_once __DIR__ . '/../helper/connection.php';

$user_id = $_SESSION['user_id'];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $query = $conn->prepare("SELECT full_name, bio, profile_picture FROM tb_user_detail WHERE user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();
        $query->bind_result($current_full_name, $current_bio, $current_profile_picture);
        $query->fetch();
        $query->close();

        $full_name = isset($_POST['full_name']) && !empty(trim($_POST['full_name'])) ? trim($_POST['full_name']) : $current_full_name;
        $bio = isset($_POST['bio']) && !empty(trim($_POST['bio'])) ? trim($_POST['bio']) : $current_bio;

        $profile_picture = $current_profile_picture;

        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $file_tmp_path = $_FILES['profile_picture']['tmp_name'];
            $file_size = $_FILES['profile_picture']['size'];

            // Validasi ukuran file maksimal 2MB
            if ($file_size > 2 * 1024 * 1024) {
                header("Location: /Cakwe/edit-profile?message=image_size_error");
                exit();
            }

            $profile_picture = file_get_contents($file_tmp_path);
        }

        // Update data di database
        $stmt = $conn->prepare("UPDATE tb_user_detail SET full_name = ?, bio = ?, profile_picture = ? WHERE user_id = ?");
        $stmt->bind_param("sssi", $full_name, $bio, $profile_picture, $user_id);

        if ($stmt->execute()) {
            header("Location: /Cakwe/profile?message=update_profile_success");
        } else {
            header("Location: /Cakwe/edit-profile?message=update_profile_error");
        }

        $stmt->close();
        $conn->close();
        exit();
    }
} catch (Exception $e) {
    // General errors
    header("Location: /Cakwe/error?message=" . $e->getMessage());
    exit();
}
