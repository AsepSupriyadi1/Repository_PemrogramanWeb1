<?php

$salt = 'admin@yx##';

function encryptId($id) {
    global $salt;
    $salted = $id . $salt;
    return base64_encode($salted);
}

function decryptId($encoded) {
    global $salt;
    $decoded = base64_decode($encoded);
    return str_replace($salt, '', $decoded);
}