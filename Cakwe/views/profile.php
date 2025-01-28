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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cakwe | Profile</title>

    <link rel="shortcut icon" type="image/x-icon" href="./asset/images/logo_icon.png" />

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
                    <?php if ($user_detail['profile_picture'] == null): ?>
                        <img class="l-profile-picture" src="./asset/images/avatar_default.png" alt="profile_picture">
                    <?php else: ?>
                        <img class="l-profile-picture"
                            src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                            alt="profile_picture">
                    <?php endif; ?>

                    <div class="ps-2">

                        <h4 class="l-name"><?= $user_detail['full_name'] ?>
                            <a class="btn l-btn-secondary ms-auto align-self-end d-lg-none"
                                href="/Cakwe/edit-profile">Edit</a>
                        </h4>

                        <div class="mt-2">
                            <h5 class="l-medium-md">Bio:</h5>
                            <p class="l-regular-md"><?= $user_detail['bio'] ?></p>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gap-2 my-3 d-lg-none">
                    <div class="col-3">
                        <div>
                            <h5 class="l-semibold-md">200</h5>
                            <p class="l-regular-sm">Followers</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <h5 class="l-semibold-md">200</h5>
                            <p class="l-regular-sm">Following</p>
                        </div>
                    </div>
                    <div class="col-5">
                        <div>
                            <h5 class="l-semibold-md">03 Jul, 2004</h5>
                            <p class="l-regular-sm">Date birth</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <h5 class="l-semibold-md">200</h5>
                            <p class="l-regular-sm">Total funs</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <h5 class="l-semibold-md">200</h5>
                            <p class="l-regular-sm">Comments</p>
                        </div>
                    </div>
                </div>

                <div id="tab">
                    <nav class="d-flex column-gap-3 my-4">
                        <span class="l-list active l-cursor-pointer" data-id='1'>Post</span>
                        <span href="#" class=" l-list l-cursor-pointer" data-id='2'>Comments</span>
                        <span href="#" class=" l-list l-cursor-pointer" data-id='3'>Saved</span>
                        <span href="#" class=" l-list l-cursor-pointer" data-id='4'>Upvoted</span>
                        <span href="#" class=" l-list l-cursor-pointer" data-id='5'>Downvoted</span>
                    </nav>

                    <form action="">

                        <!-- POSTED BY THE USER -->
                        <div class="tab-content active" data-content='1'>
                            <div class="d-flex flex-column row-gap-3">
                                <?php foreach (getUserPosts() as $post): ?>
                                    <?php $user_detail = getDetailUser($post['user_id']) ?>
                                    <section class="d-flex border border-1 rounded l-post-item">
                                        <div class="border-end">
                                            <div class="p-3 text-center d-flex flex-column align-items-center gap-2">
                                                <img src="./asset/icons/arrow-up_default.svg"
                                                    alt="arrow-down_default"></img>
                                                <span class="l-regular-md">500</span>
                                                <img src="./asset/icons/arrow-down_default.svg"
                                                    alt="arrow-down_default"></img>
                                            </div>
                                        </div>
                                        <div class="l-w-full">
                                            <div class="py-3">
                                                <div class="px-3">
                                                    <div class="d-flex align-items-center column-gap-1">
                                                        <?php if ($user_detail['profile_picture'] == null): ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="./asset/images/avatar_default.png" alt="profile_picture">
                                                        <?php elseif ($user_detail['profile_picture'] != null): ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                                                                alt="profile_picture">
                                                        <?php endif; ?>

                                                        <span class="l-regular-md">
                                                            <?= $post['user_id'] == $user_id ? "You" : $user_detail['full_name'] ?>
                                                        </span>
                                                        <img src="./asset/icons/dot.png" alt="dot">
                                                        <span class="l-light-sm"><?= timeAgo($post['created_at']) ?></span>
                                                    </div>
                                                    <div class="my-3">
                                                        <?php $encryptedId = encryptId($post['post_id']); ?>
                                                        <a href="/Cakwe/detail-post?id=<?= urlencode($encryptedId) ?>">
                                                            <h1 class="l-medium-lg"><?= $post['title'] ?></h1>
                                                        </a>
                                                        <p class="l-paragraph"><?= $post['description'] ?></p>
                                                    </div>
                                                </div>

                                                <?php if ($post['post_image'] != null): ?>
                                                    <div class="l-post-image-container">
                                                        <a href="">
                                                            <img class="l-post-image"
                                                                src="data:image/jpeg;base64,<?= base64_encode($post['post_image']) ?>"
                                                                alt="post_image">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($post['link'] != null): ?>
                                                    <?php $embedUrl = getYouTubeEmbedUrl($post['link']); ?>
                                                    <div class="l-post-image-container">
                                                        <iframe class="l-post-url" src=<?= $embedUrl ?> frameborder="0"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                <?php endif; ?>


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
                                                        <?php if ($user_id != null): ?>
                                                            <div class="dropdown">
                                                                <img src="./asset/icons/more.svg" alt="more"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <ul class="dropdown-menu p-2">
                                                                    <li>
                                                                        <a
                                                                            href="/Cakwe/process/post/controllers/bookmark-post.php?post_id=<?= $post['post_id'] ?>">
                                                                            <div
                                                                                class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                                <?php if (isBookmarked($post['post_id'], $user_id)): ?>
                                                                                    <img src="./asset/icons/bookmark-filled.svg"
                                                                                        alt="bookmark">
                                                                                    <p class="l-regular-md">Unbookmark post</p>
                                                                                <?php else: ?>
                                                                                    <img src="./asset/icons/bookmark.svg"
                                                                                        alt="bookmark">
                                                                                    <p class="l-regular-md">Bookmark post</p>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <?php if (checkOwnership($post['post_id'], $user_id)): ?>
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#deleteModal"
                                                                                onclick="setDeleteUrl('/Cakwe/process/post/controllers/delete-post.php?post_id=<?= $post['post_id'] ?>')">
                                                                                <div
                                                                                    class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                                    <img src="./asset/icons/trash.svg" alt="delete">
                                                                                    <p class="l-regular-md">Delete post</p>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- COMMENTED -->
                        <div class="tab-content" data-content='2'>

                        </div>

                        <!-- SAVED -->
                        <div class="tab-content" data-content='3'>
                            <div class="d-flex flex-column row-gap-3">
                                <?php foreach (getBookmarkedPost() as $post): ?>
                                    <?php $author_user_detail = getDetailUser($post['author_id']) ?>
                                    <section class="d-flex border border-1 rounded l-post-item">
                                        <div class="border-end">
                                            <div class="p-3 text-center d-flex flex-column align-items-center gap-2">
                                                <img src="./asset/icons/arrow-up_default.svg"
                                                    alt="arrow-down_default"></img>
                                                <span class="l-regular-md">500</span>
                                                <img src="./asset/icons/arrow-down_default.svg"
                                                    alt="arrow-down_default"></img>
                                            </div>
                                        </div>
                                        <div class="l-w-full">
                                            <div class="py-3">
                                                <div class="px-3">
                                                    <div class="d-flex align-items-center column-gap-1">
                                                        <?php if ($author_user_detail['profile_picture'] == null): ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="./asset/images/avatar_default.png" alt="profile_picture">
                                                        <?php else: ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="data:image/jpeg;base64,<?= base64_encode($author_user_detail['profile_picture']) ?>"
                                                                alt="profile_picture">
                                                        <?php endif; ?>

                                                        <span class="l-regular-md">
                                                            <?= $post['user_id'] == $user_id ? "You" : $author_user_detail['full_name'] ?>
                                                        </span>
                                                        <img src="./asset/icons/dot.png" alt="dot">
                                                        <span
                                                            class="l-light-sm"><?= timeAgo($post['bookmarked_at']) ?></span>
                                                    </div>
                                                    <div class="my-3">
                                                        <?php $encryptedId = encryptId($post['post_id']); ?>
                                                        <a href="/Cakwe/detail-post?id=<?= urlencode($encryptedId) ?>">
                                                            <h1 class="l-medium-lg"><?= $post['title'] ?></h1>
                                                        </a>
                                                        <p class="l-paragraph"><?= $post['description'] ?></p>
                                                    </div>
                                                </div>

                                                <?php if ($post['post_image'] != null): ?>
                                                    <div class="l-post-image-container">
                                                        <a href="">
                                                            <img class="l-post-image"
                                                                src="data:image/jpeg;base64,<?= base64_encode($post['post_image']) ?>"
                                                                alt="post_image">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($post['link'] != null): ?>
                                                    <?php $embedUrl = getYouTubeEmbedUrl($post['link']); ?>
                                                    <div class="l-post-image-container">
                                                        <iframe class="l-post-url" src=<?= $embedUrl ?> frameborder="0"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                <?php endif; ?>


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
                                                        <?php if ($user_id != null): ?>
                                                            <div class="dropdown">
                                                                <img src="./asset/icons/more.svg" alt="more"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                <ul class="dropdown-menu p-2">
                                                                    <li>
                                                                        <a
                                                                            href="/Cakwe/process/post/controllers/bookmark-post.php?post_id=<?= $post['post_id'] ?>">
                                                                            <div
                                                                                class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                                <?php if (isBookmarked($post['post_id'], $user_id)): ?>
                                                                                    <img src="./asset/icons/bookmark-filled.svg"
                                                                                        alt="bookmark">
                                                                                    <p class="l-regular-md">Unbookmark post</p>
                                                                                <?php else: ?>
                                                                                    <img src="./asset/icons/bookmark.svg"
                                                                                        alt="bookmark">
                                                                                    <p class="l-regular-md">Bookmark post</p>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <?php if (checkOwnership($post['post_id'], $user_id)): ?>
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#deleteModal"
                                                                                onclick="setDeleteUrl('/Cakwe/process/post/controllers/delete-post.php?post_id=<?= $post['post_id'] ?>')">
                                                                                <div
                                                                                    class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                                    <img src="./asset/icons/trash.svg" alt="delete">
                                                                                    <p class="l-regular-md">Delete post</p>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- UPVOTE -->
                        <div class="tab-content" data-content='4'>

                        </div>

                        <!-- DOWNVOTE -->
                        <div class="tab-content" data-content='5'>

                        </div>
                    </form>

                </div>

            </div>

        </div>


        <!-- Sidebar Kanan -->
        <div class="l-sidebar-right d-none d-lg-block">

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
                                    <a class="btn l-btn-secondary ms-auto align-self-end"
                                        href="/Cakwe/edit-profile">Edit</a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <?php include 'views/components/delete-confirm-modal_component.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="./asset/jqueries/tabs.js"></script>

    <!-- Include SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- ALERT HELPER -->
    <?php include './helper/alert-helper.php' ?>
</body>

</html>