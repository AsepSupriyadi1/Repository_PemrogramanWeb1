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
    <title>Cakwe | Edit Profile</title>

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

        <div class="l-content">
            <div class="p-4">

                <h1 class="l-semibold-xl">Edit Profile</h1>

                <div>
                    <h2 class="l-medium-lg my-4">Avatar</h2>

                    <form method="POST" action="/Cakwe/process/account/controllers/profile-edit.php"
                        enctype="multipart/form-data">
                        <div class="d-flex align-items-center column-gap-2 my-4">
                            <img class="l-profile-picture"
                                src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                                alt="photo_profile">
                            <div>
                                <input type="file" name="profile_picture" accept="image/*"
                                    class="form-control l-p-input-md rounded-2">
                                <button type="submit" class="btn l-btn-primary ms-auto align-self-end mt-2">Change
                                    Avatar</button>
                            </div>
                        </div>
                    </form>

                    <h2 class="l-medium-lg my-4">General</h2>

                    <form method="POST" action="/Cakwe/process/account/controllers/profile-edit.php">
                        <div class=" d-flex flex-column row-gap-3">
                            <div>
                                <input class="form-control l-p-input-md l-regular-md-input-text rounded-2" type="text"
                                    name="full_name" id="full_name" placeholder="Enter name.."
                                    value="<?= $user_detail['full_name'] ?>" required>
                            </div>

                            <div>
                                <textarea class="form-control l-regular-md-input-text l-p-input-md rounded-2" name="bio"
                                    id="bio" placeholder="Enter description..." rows="10"
                                    required><?= $user_detail['bio'] ?></textarea>
                            </div>
                            <button type="submit" class="btn l-btn-primary ms-auto align-self-end">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>


    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- ALERT HELPER -->
    <?php include './helper/alert-helper.php' ?>

</body>

</html>