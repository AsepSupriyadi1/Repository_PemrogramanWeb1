<?php
session_start();
$user_id = null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location: /Cakwe/home?message=login_required');
}
?>
<?php include 'process/post/functions.php' ?>
<?php include 'helper/date-converter.php' ?>
<?php include 'helper/url-converter.php' ?>
<?php include 'helper/security-helper.php' ?>

<?php
$decrypted_id = decryptId($_GET['id']);
$post_detail = getDetailPosts($decrypted_id);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | Home</title>

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
    <link rel="stylesheet" href="./asset/styles/_global.css">
    <link rel="stylesheet" href="./asset/styles/_main.css">
    <link rel="stylesheet" href="./asset/styles/_bootstrap.css">
</head>

<body>
    <?php include 'views/components/navbar_component.php' ?>
    <?php addToRecentPost($decrypted_id, $user_id) ?>

    <!-- Main Content -->
    <div class="l-main">
        <!-- Sidebar Kiri -->
        <?php include 'views/components/sidebar_component.php' ?>

        <!-- Container Content Tengah (Scroll) -->

        <div class="l-content">
            <!-- DETAIL POST -->
            <div class="d-flex">
                <div class="p-3">
                    <a href="/Cakwe/">
                        <img class="l-back-button" src="./asset/icons/back-button.svg" alt="arrow-down_default"></img>
                    </a>
                </div>
                <div class="l-w-full">
                    <div class="py-3">
                        <div class="">
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
                                <span class="l-light-sm"><?= timeAgo($post_detail['created_at']) ?></span>
                            </div>
                            <div class="my-3">
                                <h1 class="l-medium-lg"><?= $post_detail['title'] ?></h1>
                                <p class="l-paragraph"><?= $post_detail['description'] ?></p>
                            </div>
                        </div>
                        <?php if ($post_detail['post_image'] != null): ?>
                            <div class="l-post-image-container">
                                <a href="">
                                    <img class="l-post-image"
                                        src="data:image/jpeg;base64,<?= base64_encode($post_detail['post_image']) ?>"
                                        alt="post_image">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($post_detail['link'] != null): ?>
                            <?php $embedUrl = getYouTubeEmbedUrl($post_detail['link']); ?>
                            <div class="l-post-image-container">
                                <iframe class="l-post-url" src="<?= $embedUrl ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
                        <div class="mt-3">
                            <div class="d-flex column-gap-3 align-items-center">
                                <div class="d-flex column-gap-1 align-items-center">
                                    <img src="./asset/icons/comment.svg" alt="comment">
                                    <span class="l-regular-sm">400 Comments</span>
                                </div>
                                <div class="d-flex column-gap-1 align-items-center">
                                    <img src="./asset/icons/share.svg" alt="share">
                                    <span class="l-regular-sm">Share</span>
                                </div>
                                <?php if ($user_id != null): ?>
                                    <div class="dropdown">
                                        <img src="./asset/icons/more.svg" alt="more" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a
                                                    href="/Cakwe/process/post/controllers/bookmark-post.php?post_id=<?= $post_detail['post_id'] ?>">
                                                    <div class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                        <?php if (isBookmarked($post_detail['post_id'], $user_id)): ?>
                                                            <img src="./asset/icons/bookmark-filled.svg" alt="bookmark">
                                                            <p class="l-regular-md">Unbookmark post</p>
                                                        <?php else: ?>
                                                            <img src="./asset/icons/bookmark.svg" alt="bookmark">
                                                            <p class="l-regular-md">Bookmark post</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input class="form-control l-p-input-md l-regular-md-input-text  rounded-5" type="text"
                                name="url" id="url" placeholder="Enter comment..." required>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="l-sidebar-right py-2 px-3">
            <?php include 'views/components/recent-post_component.php' ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>