<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
// else{
//     header('Location: /Cakwe/home');
// }
?>

<?php include 'process/recent-post/functions.php' ?>
<?php include 'process/post/functions.php' ?>
<?php include 'helper/date-converter.php' ?>
<?php include 'helper/url-converter.php' ?>
<?php include 'helper/security-helper.php' ?>


<?php

$current_keyword = $_GET['keyword'];
$posts = searchPosts($current_keyword);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | Search</title>

    <link rel="shortcut icon" type="image/x-icon" href="./asset/images/logo_icon.png" />

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

                <?php if (count($posts) == 0): ?>
                    <!-- POST ITEM -->
                    <section class="d-flex border border-1 rounded l-post-item">
                        <div class="container-fluid">
                            <div class="row py-3 px-3 d-flex justify-content-between align-items-center">
                                <div class="col-lg-2 text-center">
                                    <img class="l-search-not-found" src="./asset/images/search-not-found.png"
                                        alt="profile_picture">
                                </div>
                                <div class="col-lg-10">
                                    <div class="py-2">
                                        <h1 class="l-medium-lg">Hm... we couldn’t find any results for
                                            "<?= $_GET['keyword'] ?>"</h1>
                                        <p class="l-paragraph mt-2">Double-check your spelling or try different keywords
                                            to adjust your search</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <?php $user_detail = getDetailUser($post['user_id']) ?>
                        <!-- POST ITEM -->
                        <section class="d-flex border border-1 rounded l-post-item">
                            <div class="container-fluid">
                                <div class="row py-3 px-3 d-flex justify-content-between align-items-center">
                                    <div class="col">
                                        <div class="d-flex align-items-center column-gap-1">
                                            <?php if ($user_detail['profile_picture'] == null): ?>
                                                <img class="l-profile-picture-sm" src="./asset/images/avatar_default.png"
                                                    alt="profile_picture">
                                            <?php else: ?>
                                                <img class="l-profile-picture-sm"
                                                    src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                                                    alt="profile_picture">
                                            <?php endif; ?>

                                            <span class="l-regular-md"><?= $user_detail['full_name'] ?></span>
                                            <img src="./asset/icons/dot.png" alt="dot">
                                            <span class="l-light-sm"><?= timeAgo($post['created_at']) ?></span>
                                        </div>
                                        <div class="py-2">
                                            <?php $encryptedId = encryptId($post['post_id']); ?>
                                            <a href="/Cakwe/detail-post?id=<?= urlencode($encryptedId) ?>">
                                                <h1 class="l-medium-lg"><?= $post['title'] ?></h1>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-2 text-end l-search-post-image">
                                        <?php if ($post['post_image'] != null): ?>
                                            <a href="">
                                                <img class="l-search-img"
                                                    src="data:image/jpeg;base64,<?= base64_encode($post['post_image']) ?>"
                                                    alt="post_image">
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($post['link'] != null): ?>
                                            <a href="">
                                                <img class="l-search-icon" src="./asset/icons/camera.svg" alt="profile_picture">
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($post['post_image'] == null && $post['link'] == null): ?>
                                            <a href="">
                                                <img class="l-search-icon" src="./asset/icons/typography.svg" alt="profile_picture">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <!-- Sidebar Kanan -->
        <div class="l-sidebar-right d-none d-lg-block">
            <div class="d-flex flex-column py-3">
                <?php include 'views/components/recent-post_component.php' ?>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>