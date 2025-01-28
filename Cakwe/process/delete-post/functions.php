<?php
require_once 'helper/connection.php';

function deletePost($post_id, $user_id)
{
    global $conn;

    try {
        $sql = "DELETE FROM tb_posts WHERE post_id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $post_id, $user_id);
        return $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
