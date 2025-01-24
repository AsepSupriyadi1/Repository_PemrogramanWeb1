<?php
require_once __DIR__ . '../../../../helper/connection.php';
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Input Sanitization (IMPORTANT)
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        if (!$email || !$password) {
            throw new Exception('Invalid input');
        }

        // Prepared statement to select user
        $sql = "SELECT user_id, password FROM tb_users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session and redirect to the home page
                $_SESSION['user_id'] = $user_id;
                header("Location: /Cakwe/home?message=login_success");
                $stmt->close();
                $conn->close();
                exit();
            } else {
                // Invalid password
                header("Location: /Cakwe/home?message=invalid_password");
                $stmt->close();
                $conn->close();
                exit();
            }
        } else {
            // No user found with that email
            header("Location: /Cakwe/home?message=user_not_found");
            $stmt->close();
            $conn->close();
            exit();
        }
    }
} catch (Exception $e) {
    // General errors
    header("Location: /Cakwe/error?message=" . $e->getMessage());
    exit();
}