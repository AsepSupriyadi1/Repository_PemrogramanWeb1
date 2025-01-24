<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /Cakwe/home?message=post_not_login");
    exit;
}

$user_id = $_SESSION['user_id'];