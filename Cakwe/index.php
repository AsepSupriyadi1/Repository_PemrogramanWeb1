<?php include 'helper/connection.php' ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | Home</title>

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

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'views/components/navbar_component.php' ?>

    <!-- Main Content -->
    <div class="l-main">
        <!-- Sidebar Kiri -->
        <?php include 'views/components/sidebar_component.php' ?>

        <!-- Container Content Tengah (Scroll) -->
        <div class="l-content">
            <!-- CONTAINER POST ITEM -->
            <div class="d-flex flex-column row-gap-3 p-4 py-2">
                <!-- POST ITEM -->

                <section class="d-flex border border-1 rounded l-post-item">
                    <div class="border-end">
                        <div class="p-3 text-center d-flex flex-column align-items-center gap-2">
                            <img src="./asset/icons/arrow-up_default.svg" alt="arrow-up_default"></img>
                            <span class="l-regular-md">500</span>
                            <img src="./asset/icons/arrow-down_default.svg" alt="arrow-down_default"></img>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="py-3">
                            <div class="px-3">
                                <div class="d-flex align-items-center column-gap-1">
                                    <img class="me-2" src="./asset/images/default_user.png" alt="default_user">
                                    <span class="l-regular-md">Rin Shima</span>
                                    <img src="./asset/icons/dot.png" alt="dot">
                                    <span class="l-light-sm">Posted 3 hours ago</span>
                                </div>
                                <a href="">
                                    <h1 class="l-medium-lg my-2">Ketika Semua Orang Dievakuasi, Hanya Kuda Yang Bisa
                                        Diwawancarai</h1>
                                </a>
                            </div>
                            <div class="l-post-image-container">
                                <a href="">
                                    <div class="overlay"></div>
                                    <img class="l-post-image" src="./asset/images/example-meme-01.png" alt="">
                                </a>
                            </div>
                            <div class="px-3 mt-2">
                                <div class="d-flex column-gap-3 align-items-center">
                                    <div class="d-flex column-gap-1 align-items-center">
                                        <img src="./asset/icons/comment.svg" alt="comment">
                                        <span class="l-regular-sm">400 Comments</span>
                                    </div>
                                    <div class="d-flex column-gap-1 align-items-center">
                                        <img src="./asset/icons/share.svg" alt="share">
                                        <span class="l-regular-sm">Share</span>
                                    </div>
                                    <div class="d-flex column-gap-1 align-items-center">
                                        <img src="./asset/icons/more.svg" alt="more">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Sidebar Kanan -->
        <div class="l-sidebar-right py-2 px-3">
            <?php include 'views/components/recent-post_component.php' ?>
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <p>Thanks for clicking. That felt good.</p>
        <a href="#" rel="modal:close">Close</a>
    </div>


    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- ALERT HELPER -->
    <?php include 'helper/alert-helper.php' ?>
</body>

</html>