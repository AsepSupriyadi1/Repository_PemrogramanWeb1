<?php

if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/'); // Hilangkan slash di akhir
    $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi URL
    $urlParts = explode('/', $url); // Pisahkan bagian-bagian URL

    // Routing berdasarkan URL
    switch ($urlParts[0]) {
        case 'add-post':
            require 'views/add-post.php';
            break;
        case 'profile':
            require 'views/profile.php';
            break;
        case 'detail-post':
            require 'views/detail-post.php';
            break;
        case 'privacy-policy':
            require 'views/privacy-policy.php';
            break;
        case 'content-policy':
            require 'views/content-policy.php';
            break;
        case 'edit-profile':
            require 'views/edit-profile.php';
            break;
        case 'search-result':
            require 'views/search-result.php';
            break;
        case 'friends-error':
            require 'views/friends-error.php';
            break;
        default:
            http_response_code(404);
            require 'views/404.php';
            echo print_r($urlParts[0]);
            echo "404 - Halaman tidak ditemukan";
            break;
    }
    exit;
}
