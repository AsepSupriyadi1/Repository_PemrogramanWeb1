<?php
require_once 'helper/connection.php';

function getRecentPosts()
{
    global $conn;

    // Ambil daftar postingan pengguna dari database
    $stmt = $conn->prepare("SELECT rp.post_id, rp.user_id, rp.viewed_at, ud.full_name, ud.profile_picture, p.title, p.created_at, rp.author_id FROM tb_recent_post rp JOIN tb_posts p ON rp.post_id = p.post_id JOIN tb_user_detail ud ON rp.user_id = ud.user_id WHERE  rp.user_id = ? ORDER BY rp.recent_post_id DESC LIMIT 5;");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($post_id, $user_id, $viewed_at, $full_name, $profile_picture, $title, $created_at, $author_id);

    $posts = [];
    while ($stmt->fetch()) {
        $posts[] = [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'viewed_at' => $viewed_at,
            'full_name' => $full_name,
            'profile_picture' => $profile_picture,
            'title' => $title,
            'created_at' => $created_at,
            'author_id' => $author_id
        ];
    }

    $stmt->close();
    return $posts;
}


function addToRecentPost($post_id, $user_id, $author_id)
{
    global $conn;

    try {
        // Start transaction
        $conn->begin_transaction();

        // Check if post exists in history
        $check_stmt = $conn->prepare("SELECT COUNT(recent_post_id) FROM tb_recent_post WHERE user_id = ? AND post_id = ?");
        if (!$check_stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $check_stmt->bind_param("ii", $user_id, $post_id);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count > 0) {
            // Update existing record
            $update_stmt = $conn->prepare("UPDATE tb_recent_post SET viewed_at = CURRENT_TIMESTAMP WHERE user_id = ? AND post_id = ?");
            if (!$update_stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }

            echo "<script>console.log('Updating existing record');</script>";

            $update_stmt->bind_param("ii", $user_id, $post_id);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // Insert new record
            $insert_stmt = $conn->prepare("INSERT INTO tb_recent_post (post_id, user_id, author_id) VALUES (?, ?, ?)");
            if (!$insert_stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }

            echo "<script>console.log('Inserting new record');</script>";

            $insert_stmt->bind_param("iii", $post_id, $user_id, $author_id);
            $insert_stmt->execute();
            $insert_stmt->close();
        }

        // Commit transaction
        $conn->commit();
        return true;

    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        error_log("Recent Post Error: " . $e->getMessage());
        return false;
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

