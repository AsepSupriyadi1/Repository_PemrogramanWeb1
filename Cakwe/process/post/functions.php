<?php
require_once 'process/recent-post/functions.php';
require_once 'helper/connection.php';

function getPosts()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT post_id, title, description, post_image, link, created_at, user_id FROM tb_posts ORDER BY post_id DESC");
    $stmt->execute();
    $stmt->bind_result($post_id, $title, $description, $post_image, $link, $created_at, $user_id);

    $posts = [];
    while ($stmt->fetch()) {
        $posts[] = [
            'post_id' => $post_id,
            'title' => $title,
            'description' => $description,
            'post_image' => $post_image,
            'link' => $link,
            'created_at' => $created_at,
            'user_id' => $user_id
        ];
    }

    $stmt->close();

    return $posts;
}

function getDetailPosts($post_id_param)
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT post_id, title, description, post_image, link, created_at, user_id FROM tb_posts WHERE post_id = ?");
    $stmt->bind_param("i", $post_id_param);
    $stmt->execute();
    $stmt->bind_result($post_id, $title, $description, $post_image, $link, $created_at, $user_id);

    $posts_detail = null;
    while ($stmt->fetch()) {
        $posts_detail = [
            'post_id' => $post_id,
            'title' => $title,
            'description' => $description,
            'post_image' => $post_image,
            'link' => $link,
            'created_at' => $created_at,
            'user_id' => $user_id
        ];
    }

    $stmt->close();

    addToRecentPost($post_id_param, $user_id);
    limitRecentPostHistory($user_id);

    return $posts_detail;
}

