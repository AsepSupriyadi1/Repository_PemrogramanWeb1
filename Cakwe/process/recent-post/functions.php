<?php
require_once 'helper/connection.php';

function getRecentPosts()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT rp.post_id, rp.user_id, rp.viewed_at, ud.full_name, ud.profile_picture, p.title, p.created_at FROM tb_recent_post rp JOIN tb_posts p ON rp.post_id = p.post_id JOIN tb_user_detail ud ON rp.user_id = ud.user_id WHERE  p.user_id = ? ORDER BY rp.recent_post_id DESC LIMIT 5;");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($post_id, $user_id, $viewed_at, $full_name, $profile_picture, $title, $created_at);

    $posts = [];
    while ($stmt->fetch()) {
        $posts[] = [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'viewed_at' => $viewed_at,
            'full_name' => $full_name,
            'profile_picture' => $profile_picture,
            'title' => $title,
            'created_at' => $created_at
        ];
    }

    $stmt->close();
    return $posts;
}


function addToRecentPost($post_id, $user_id)
{
    global $conn;

    try {
        // Query untuk mengecek apakah postingan sudah ada di history
        $sql = "SELECT recent_post_id FROM tb_recent_post WHERE user_id = ? AND post_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $post_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Query untuk mengupdate waktu history postingan terakhir
            $sql = "UPDATE tb_recent_post SET viewed_at = CURRENT_TIMESTAMP WHERE user_id = ? AND post_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $post_id);
            $stmt->execute();
            echo "<script>console.log('Successfully updated the history post');</script>";
        } else {
            // Query untuk menambahkan history postingan baru
            $sql = "INSERT INTO tb_recent_post (post_id, user_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $post_id, $user_id);
            $stmt->execute();
            echo "<script>console.log('Successfully added the history post');</script>";
        }

        $stmt->close();

    } catch (Exception $e) {
        header("Location: /Cakwe/home?message=recent_post_failed");
        echo "<script>console.log('Error adding post');</script>";
    }
}

function limitRecentPostHistory($userId, $limit = 5)
{
    global $conn;

    try {
        // Hapus data paling lama jika melebihi batas
        $deleteQuery = "DELETE FROM tb_recent_post 
                        WHERE user_id = ? AND recent_post_id NOT IN (
                            SELECT recent_post_id FROM (
                                SELECT recent_post_id FROM tb_recent_post WHERE user_id = ? ORDER BY viewed_at DESC LIMIT ?
                            ) AS recent_ids
                        )";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("iii", $userId, $userId, $limit);
        $stmt->execute();
        echo "<script>console.log('Successfully limit the history post');</script>";
        
    } catch (Exception $e) {
        header("Location: /Cakwe/home?message=recent_post_failed");
        echo "<script>console.log('Error limtting post');</script>";
    }
}

