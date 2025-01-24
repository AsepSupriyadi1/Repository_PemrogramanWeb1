<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
// else{
//     header('Location: /Cakwe/home');
// }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | 404 Not Found</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./asset/styles/_global.css">
    <link rel="stylesheet" href="./asset/styles/_main.css">
    <link rel="stylesheet" href="./asset/styles/_bootstrap.css">

    <style>
        img {
            max-width: 200px;
            max-height: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php require("c:/xampp/htdocs/Cakwe/views/components/navbar_component.php") ?>

    <!-- Main Content -->
    <div class="l-main d-flex flex-column align-items-center justify-content-center text-center">
        <!-- Container Content Tengah (Scroll) -->
        <div class="l-content mt-5 p-5">
            <div class="404-not-found mt-5 p-5">
                <img src="./asset/images/404.jpg" class="img-fluid" alt="page_not_found"></img>
                <h1 class="l-semibold-xl">Oops!</h1>
                <p class="l-uppercase-light-text-md">404 - PAGE NOT FOUND</p>
                <p class="l-medium-sm">The page you are looking for might have been removed had its name changed, or temporarily unavailable</p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>