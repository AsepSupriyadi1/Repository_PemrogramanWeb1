<?php
session_start();
$user_id = $_SESSION['user_id'];
require_once __DIR__ . '../../../../helper/connection.php';
require_once __DIR__ . '../../../../helper/routes.php';

try {
    $post_id = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);

    if (isBookmarked($post_id, $user_id)) {
        // Tambahkan bookmark
        $stmt = $conn->prepare("DELETE FROM tb_bookmark_post WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $post_id, $user_id);

        if ($stmt->execute()) {
            $current_page = getCurrentPage();
            header("Location: /Cakwe/profile?message=bookmark_deleted_success");
            $stmt->close();
            exit();
        } else {
            $stmt->close();
            header("Location: /Cakwe/profile?message=bookmark_deleted_failed");
        }
    } else {
        // Tambahkan bookmark
        $stmt = $conn->prepare("INSERT INTO tb_bookmark_post (post_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $post_id, $user_id);

        if ($stmt->execute()) {
            header("Location: /Cakwe/profile?message=bookmark_added_success");
            $stmt->close();
            exit();
        } else {
            $stmt->close();
            header("Location: /Cakwe/profile?message=bookmark_added_failed");
        }
    }

} catch (Exception $e) {
    header("Location: /Cakwe/home?message=error");
    echo "<script>console.log('Error: " . $e->getMessage() . "');</script>";
    exit();
}

function isBookmarked($param_bookmark_post_id, $param_user_id)
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT COUNT(bookmark_post_id) FROM tb_bookmark_post WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $param_bookmark_post_id, $param_user_id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    $stmt->close();

    return $count > 0;
}