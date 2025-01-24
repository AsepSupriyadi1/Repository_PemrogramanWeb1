<?php

function getCurrentPage(){
    $url = rtrim($_GET['url'], '/'); // Hilangkan slash di akhir
    $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi URL
    $urlParts = explode('/', $url); // Pisahkan bagian-bagian URL

    return $urlParts[0];
}