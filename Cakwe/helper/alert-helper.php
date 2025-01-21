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
    'user_not_login' => [
        'title' => 'Failed',
        'message' => 'Please Login First!',
        'icon' => 'error'
    ],

    // ============ PROFILE UPDATE MESSAGE HANDLER ============
    'update_profile_success' => [
        'title' => 'Success',
        'message' => 'Profile updated successfully.',
        'icon' => 'success'
    ],
    'update_profile_error' => [
        'title' => 'Failed',
        'message' => 'Update Profile Failed. Please try again.',
        'icon' => 'error'
    ],
    'image_size_error' => [
        'title' => 'Failed',
        'message' => 'Please Select an Image with a Maximum Size of 2MB.',
        'icon' => 'error'
    ],

    // ============ LOGOUT MESSAGE HANDLER ============

    'logout_success' => [
        'title' => 'Success',
        'message' => 'You have successfully logged out.',
        'icon' => 'success'
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
};



if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo showAlert($message, $modal_metadata);
}
