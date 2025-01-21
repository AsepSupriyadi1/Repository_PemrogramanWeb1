<?php
require_once __DIR__ . '/../helper/connection.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Input Sanitization (IMPORTANT)
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['reqPassword'];

        if (!$email || !$password) {
            throw new Exception('Invalid input');
        }

        // Password Hashing (ESSENTIAL)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Prepared statement (SQL Injection Prevention)
        $sql = "INSERT INTO tb_users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password_hash);

        if ($stmt->execute()) {
            // Get the last inserted ID
            $user_id = $stmt->insert_id;

            // Insert into tb_user_detail
            $sql_detail = "INSERT INTO tb_user_detail (user_id, full_name) VALUES (?, ?)";
            $stmt_detail = $conn->prepare($sql_detail);

            // Generated default full name 
            $full_name = explode('@', $email)[0] . "_" . generateToken(4);

            $stmt_detail->bind_param("is", $user_id, $full_name);

            if ($stmt_detail->execute()) {
                echo "success"; // Return success message
                header("Location: /Cakwe/home?message=registration_success");
            } else {
                throw new Exception('Error during user detail insertion');
            }

            $stmt_detail->close();
        } else {
            throw new Exception('Error during registration');
        }

        $stmt->close();
        $conn->close();
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        // Duplicate entry error
        header("Location: /Cakwe/home?message=duplicate_entry");
    } else {
        // Other MySQL errors
        header("Location: /Cakwe/home?message=registration_failed");
    }
} catch (Exception $e) {
    header("Location: /Cakwe/error?message=" . $e->getMessage());
    exit();
}

function generateToken($length = 16)
{
    // Karakter yang digunakan untuk token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $token = '';

    // Loop untuk membuat token dengan panjang tertentu
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}