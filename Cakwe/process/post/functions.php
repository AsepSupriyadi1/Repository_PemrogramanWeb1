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

function searchPosts($keyword) {
    global $conn;
    
    try {
        // Sanitize and prepare search term
        $searchTerm = "%" . $keyword . "%";
        
        // Prepare statement with proper LIKE syntax
        $stmt = $conn->prepare("SELECT post_id, title, description, post_image, link, created_at, user_id 
                               FROM tb_posts 
                               WHERE title LIKE ? OR description LIKE ? 
                               ORDER BY post_id DESC");
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        // Bind the search term twice - once for title, once for description
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
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
        
    } catch (Exception $e) {
        error_log("Search Error: " . $e->getMessage());
        return [];
    }
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
    try {
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

        addToRecentPost($post_id_param, $_SESSION['user_id'], $user_id);
        limitRecentPostHistory($_SESSION['user_id']);

        return $posts_detail;
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}

function getBookmarkedPost()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT p.post_id, p.title, p.description, p.post_image, p.link, bp.bookmarked_at, bp.user_id, bp.bookmark_post_id, bp.author_id FROM tb_bookmark_post bp JOIN tb_posts p ON bp.post_id = p.post_id WHERE bp.user_id = ? ORDER BY bp.bookmark_post_id DESC;");

    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($post_id, $title, $description, $post_image, $link, $bookmarked_at, $user_id, $bookmark_post_id, $author_id);

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
            'bookmark_post_id' => $bookmark_post_id,
            'author_id' => $author_id
        ];
    }

    $stmt->close();
    return $boomarked_posts;
}


function isBookmarked($param_bookmark_post_id, $param_user_id)
{
    try {
        global $conn;

        // Ambil daftar postingan pengguna dari database
        $stmt = $conn->prepare("SELECT COUNT(bookmark_post_id) FROM tb_bookmark_post WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $param_bookmark_post_id, $param_user_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        $stmt->close();

        return $count > 0;
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        return false;
    }
}

function checkOwnership($param_bookmark_post_id, $param_user_id)
{
    try {
        global $conn;

        // Ambil daftar postingan pengguna dari database
        $stmt = $conn->prepare("SELECT COUNT(post_id) FROM tb_posts WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $param_bookmark_post_id, $param_user_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        $stmt->close();

        return $count > 0;
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        return false;
    }
}