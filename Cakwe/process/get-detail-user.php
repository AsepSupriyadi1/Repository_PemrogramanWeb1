<?php

require_once __DIR__ . '/../helper/connection.php';
$user_id = $_SESSION['user_id'];

// Ambil data pengguna dari database
$stmt = $conn->prepare("SELECT u.email, ud.full_name, ud.bio, ud.profile_picture FROM tb_users u
    JOIN tb_user_detail ud ON u.user_id = ud.user_id
    WHERE u.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email, $full_name, $bio, $profile_picture);
$stmt->fetch();
$stmt->close();
$conn->close();
