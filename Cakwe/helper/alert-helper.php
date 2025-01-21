<?php

$modal_metadata = [

    // ============ REGISTRATION MESSAGE HANDLER ============
    'registration_failed' => [
        'title' => 'Failed',
        'message' => 'Registration failed. Please try again.',
        'icon' => 'error'
    ],
    'registration_duplicate_entry' => [
        'title' => 'Failed',
        'message' => 'The entered email is already used.',
        'icon' => 'error'
    ],
    'registration_success' => [
        'title' => 'Success',
        'message' => 'Registration completed.',
        'icon' => 'success'
    ],

    // ============ LOGIN MESSAGE HANDLER ============

    'login_success' => [
        'title' => 'Success',
        'message' => 'You have successfully logged in.',
        'icon' => 'success'
    ],
    'invalid_password' => [
        'title' => 'Failed',
        'message' => 'Email or password is incorrect.',
        'icon' => 'error'
    ],
    'user_not_found' => [
        'title' => 'Failed',
        'message' => 'User with the entered email is not found.',
        'icon' => 'error'
    ],

    // ============ LOGOUT MESSAGE HANDLER ============

    'logout_success' => [
        'title' => 'Success',
        'message' => 'You have successfully logged out.',
        'icon' => 'success'
    ],

    // ============ POST MESSAGE HANDLER ============
    'post_success' => [
        'title' => 'Success',
        'message' => 'Post successfully uploaded',
        'icon' => 'success'
    ],

    'post_failed' => [
        'title' => 'Failed',
        'message' => 'Post failed to upload',
        'icon' => 'error'
    ],

    'post_not_login' => [
        'title' => 'Failed',
        'message' => 'User not logged in',
        'icon' => 'error'
    ],

    // ============ ERROR MESSAGE HANDLER ============
    'error' => [
        'title' => 'Failed',
        'message' => 'Something went wrong. Please try again.',
        'icon' => 'error'
    ],
];


function showAlert($message, $errors)
{
    return "<script>
        Swal.fire({
            title: '{$errors[$message]['title']}',
            text: '{$errors[$message]['message']}',
            icon: '{$errors[$message]['icon']}',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Remove the 'message' parameter from the URL
                const url = new URL(window.location.href);
                url.searchParams.delete('message');
                window.history.replaceState({}, document.title, url.toString());
            }
        });
    </script>";
}
;



if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo showAlert($message, $modal_metadata);
}

