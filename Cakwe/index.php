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
                <?php foreach (getPosts() as $post): ?>

                    <?php $user_detail = getDetailUser($post['user_id']) ?>
                    <section class="d-flex border border-1 rounded l-post-item">
                        <div class="border-end">
                            <div class="p-3 text-center d-flex flex-column align-items-center gap-2">
                                <img src="./asset/icons/arrow-up_default.svg" alt="arrow-down_default"></img>
                                <span class="l-regular-md">500</span>
                                <img src="./asset/icons/arrow-down_default.svg" alt="arrow-down_default"></img>
                            </div>
                        </div>
                        <div class="l-w-full">
                            <div class="py-3">
                                <div class="px-3">
                                    <div class="d-flex align-items-center column-gap-1">
                                        <?php if ($user_detail['profile_picture'] == null): ?>
                                            <img class="l-profile-picture-sm"
                                                src="./asset/images/avatar_default.png"
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
                                        <iframe class="l-post-url"
                                            src="<?= $embedUrl ?>" frameborder="0" allowfullscreen></iframe>
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
                                        <?php if (isset($_SESSION['user_id'])):
                                        ?>
                                            <div class="dropdown">
                                                <img src="./asset/icons/more.svg" alt="more" data-bs-toggle="dropdown" aria-expanded="false">
                                                <ul class="dropdown-menu p-2">
                                                    <li>
                                                        <a href="/Cakwe/process/post/controllers/bookmark-post.php?post_id=<?= $post['post_id'] ?>">
                                                            <div class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                <img src="./asset/icons/bookmark.svg" alt="bookmark">
                                                                <p>Bookmark post</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php if ($post['user_id'] == $user_id):
                                                    ?>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                onclick="setDeleteUrl('/Cakwe/process/delete-post/controllers.php?post_id=<?= $post['post_id'] ?>')">
                                                                <div class="d-flex align-items-center dropdown-item p-2 column-gap-2">
                                                                    <img src="./asset/icons/trash.svg" alt="delete">
                                                                    <p>Delete post</p>
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

        <!-- Modal Delete Post -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="#" id="confirmDeleteButton" class="btn btn-danger p-2">Delete</a>
                    </div>
                </div>
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

    <!-- Script Delete Post -->
    <script>
        function setDeleteUrl(url) {
            const deleteButton = document.getElementById('confirmDeleteButton');
            deleteButton.href = url;
        }
    </script>

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