<?php
require_once 'process/recent-post/functions.php';
require_once 'helper/connection.php';

function getCommentsByPostId($post_id_param)
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT user_id, post_id, comment_id, created_at, message FROM tb_comments WHERE post_id = ? ORDER BY comment_id DESC");
    $stmt->bind_param("i", $post_id_param);
    $stmt->execute();
    $stmt->bind_result($user_id, $post_id, $comment_id, $created_at, $message);

    $comments = [];
    while ($stmt->fetch()) {
        $comments[] = [
            'user_id' => $user_id,
            'post_id' => $post_id,
            'comment_id' => $comment_id,
            'created_at' => $created_at,
            'message' => $message
        ];
    }

    $stmt->close();

    return $comments;
}


function getRepliesByCommentId($comment_id_param)
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT user_id, comment_id, reply_id, created_at, reply_to_id, message FROM tb_replies WHERE comment_id = ?");
    $stmt->bind_param("i", $comment_id_param);
    $stmt->execute();
    $stmt->bind_result($user_id, $comment_id, $reply_id, $created_at, $reply_to_id, $message);

    $replies = [];
    while ($stmt->fetch()) {
        $replies[] = [
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'reply_id' => $reply_id,
            'created_at' => $created_at,
            'reply_to_id' => $reply_to_id,
            'message' => $message
        ];
    }

    $stmt->close();

    return $replies;
}

function getReplyById($reply_id_param)
{
    global $conn;

    $stmt = $conn->prepare("SELECT reply_id, comment_id, message, created_at, user_id, reply_to_id FROM tb_replies WHERE reply_id = ?");
    $stmt->bind_param("i", $reply_id_param);
    $stmt->execute();
    $stmt->bind_result($reply_id, $comment_id, $message, $created_at, $user_id, $reply_to_id);

    $reply_detail = null;
    while ($stmt->fetch()) {
        $reply_detail = [
            'reply_id' => $reply_id,
            'comment_id' => $comment_id,
            'message' => $message,
            'created_at' => $created_at,
            'user_id' => $user_id,
            'reply_to_id' => $reply_to_id
        ];
    }

    $stmt->close();

    return $reply_detail;
}


function isCommentOrReplyAuthor($user_id_param, $comment_id_param, $reply_id_param)
{
    global $conn;

    $stmt = $conn->prepare("SELECT user_id FROM tb_comments WHERE comment_id = ?");
    $stmt->bind_param("i", $comment_id_param);
    $stmt->execute();
    $stmt->bind_result($comment_user_id);

    $stmt->fetch();
    $stmt->close();

    if ($comment_user_id == $user_id_param) {
        return true;
    }

    $stmt = $conn->prepare("SELECT user_id FROM tb_replies WHERE reply_id = ?");
    $stmt->bind_param("i", $reply_id_param);
    $stmt->execute();
    $stmt->bind_result($reply_user_id);

    $stmt->fetch();
    $stmt->close();

    if ($reply_user_id == $user_id_param) {
        return true;
    }

    return false;
}