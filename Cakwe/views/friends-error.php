<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | Friends Not Found</title>

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
            max-width: 100px;
            max-height: 150px;
        }
    </style>
</head>

<body>
    <?php require("c:/xampp/htdocs/Cakwe/views/components/navbar_component.php") ?>

    <!-- Main Content -->
    <div class="l-main">
        <!-- Sidebar Kiri -->
        <?php require("c:/xampp/htdocs/Cakwe/views/components/sidebar_component.php") ?>

        <div class="l-content">
            <div class="row bg-light mt-5 mx-5 border border-1 rounded l-post-item p-4 align-items-center">

                <div class="col-3 d-flex align-items-center justify-content-center">
                    <img src="./asset/images/robot.png" class="img-fluid" alt="friends_not_found"></img>
                </div>

                <div class="col-9 align-items-center justify-content-center">
                    <p class="l-medium-xl">You are not following anyone yet!</p>
                    <p class="l-paragraph">Go start following your friends</p>
                </div>

            </div>
        </div>

        <!-- Sidebar Kanan -->
        <div class="l-sidebar-right py-2 px-3">
            <?php require("c:/xampp/htdocs/Cakwe/views/components/recent-post_component.php") ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>