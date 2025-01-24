<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location: /Cakwe/home?message=login_required');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | My Profile</title>

    <!-- BASE URL -->
    <base href="http://localhost/Cakwe/">

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
    <link rel="stylesheet" href="asset/styles/_main.css">
    <link rel="stylesheet" href="asset/styles/_global.css">
    <link rel="stylesheet" href="asset/styles/_bootstrap.css">

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

            <div class="p-4">

                <div class="d-flex align-items-center column-gap-2">
                    <img class="l-profile-picture"
                        src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                        alt="photo_profile">
                    <div>
                        <h4 class="l-medium-xl"><?= $user_detail['full_name'] ?></h4>
                        <div class="mt-2">
                            <h5 class="l-medium-md">Bio:</h5>
                            <p class="l-regular-md"><?= $user_detail['bio'] ?></p>
                        </div>
                    </div>
                </div>

                <div id="tab">
                    <nav class="d-flex column-gap-3 my-4">
                        <span class="l-regular-lg active l-cursor-pointer" data-id='1'>Post</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='2'>Comments</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='3'>Saved</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='4'>Upvoted</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='5'>Downvoted</span>
                    </nav>

                    <form action="">

                        <!-- TEXT INPUT -->
                        <div class="tab-content active" data-content='1'>

                        </div>

                        <!-- IMAGES INPUT -->
                        <div class="tab-content" data-content='2'>

                        </div>

                        <!-- URL INPUT -->
                        <div class="tab-content" data-content='3'>

                        </div>

                        <!-- URL INPUT -->
                        <div class="tab-content" data-content='4'>

                        </div>

                        <!-- URL INPUT -->
                        <div class="tab-content" data-content='5'>

                        </div>
                    </form>

                </div>

            </div>

        </div>


        <!-- Sidebar Kanan -->
        <div class="l-sidebar-right">

            <div class="py-4 pe-3">
                <!-- CONTAINER -->
                <div class="p-3 border rounded">

                    <div>
                        <h3 class="l-uppercase-light-text-md">your info</h3>

                        <div class="row gap-2 my-3">
                            <div class="col-3">
                                <div>
                                    <h3 class="l-semibold-lg">200</h3>
                                    <p class="l-regular-md">Followers</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h3 class="l-semibold-lg">200</h3>
                                    <p class="l-regular-md">Following</p>
                                </div>
                            </div>
                            <div class="col-5">
                                <div>
                                    <h3 class="l-semibold-lg">03 Jul, 2004</h3>
                                    <p class="l-regular-md">Date birth</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h3 class="l-semibold-lg">200</h3>
                                    <p class="l-regular-md">Total funs</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h3 class="l-semibold-lg">200</h3>
                                    <p class="l-regular-md">Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr class="border">

                    <div>
                        <h3 class="l-uppercase-light-text-md">Settings</h3>

                        <div class="mt-3">
                            <div class="d-flex align-items-center justify-content-between column-gap-2">
                                <div>
                                    <img src="./asset/images/default_user2.png" alt="default_user">
                                </div>
                                <div class="l-w-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <h4 class="l-regular-md">Profile</h4>
                                        <p class="l-light-md">Customize your profile</p>
                                    </div>
                                    <a class="btn l-btn-secondary ms-auto align-self-end">Edit</a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="./jqueries/tabs.js"></script>

    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- ALERT HELPER -->
    <?php include './helper/alert-helper.php' ?>
</body>

</html>