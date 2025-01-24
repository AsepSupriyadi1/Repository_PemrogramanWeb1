<?php

$key = '^"7PgNi$GOEr/7@{W1!u%E+d^E$&Kv';

function encryptId($id)
{
    global $key;

    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($id, $cipher, $key, 0, $iv);
    return base64_encode($iv . $ciphertext);
}

function decryptId($encryptedId)
{
    global $key;
    
    $cipher = "aes-256-cbc";
    $data = base64_decode($encryptedId);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $ivlen);
    $ciphertext = substr($data, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, 0, $iv);
}