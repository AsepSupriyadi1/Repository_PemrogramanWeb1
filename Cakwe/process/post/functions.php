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

function getUserPosts()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT post_id, title, description, post_image, link, created_at, user_id FROM tb_posts WHERE user_id = ? ORDER BY post_id DESC");
    $stmt->bind_param("i", $_SESSION['user_id']);
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

function getBookmarkedPost()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT p.post_id, p.title, p.description, p.post_image, p.link, bp.bookmarked_at, bp.user_id, bp.bookmark_post_id FROM tb_bookmark_post bp JOIN tb_posts p ON bp.post_id = p.post_id JOIN tb_user_detail ud ON bp.user_id = ud.user_id WHERE  p.user_id = ? ORDER BY bp.bookmark_post_id DESC;");

    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($post_id, $title, $description, $post_image, $link, $bookmarked_at, $user_id, $bookmark_post_id);

    $boomarked_posts = [];
    while ($stmt->fetch()) {
        $boomarked_posts[] = [
            'post_id' => $post_id,
            'title' => $title,
            'description' => $description,
            'post_image' => $post_image,
            'link' => $link,
            'bookmarked_at' => $bookmarked_at,
            'user_id' => $user_id,
            'bookmark_post_id' => $bookmark_post_id
        ];
    }

    $stmt->close();
    return $boomarked_posts;
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