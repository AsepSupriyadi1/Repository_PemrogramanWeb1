<?php
require_once 'helper/connection.php';

function getDetailUser($user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT full_name, bio, profile_picture FROM tb_user_detail WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($full_name, $bio, $profile_picture);
    $stmt->fetch();
    $stmt->close();

    $user_detail = [
        'full_name' => $full_name,
        'bio' => $bio,
        'profile_picture' => $profile_picture
    ];

    return $user_detail;
}