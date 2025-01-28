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
<?php include 'process/social/functions.php' ?>
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
    <title>Cakwe | detail post</title>

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
    <link rel="stylesheet" href="./asset/styles/_global.css">
    <link rel="stylesheet" href="./asset/styles/_main.css">
    <link rel="stylesheet" href="./asset/styles/_bootstrap.css">
</head>

<body>
    <?php include 'views/components/navbar_component.php' ?>
    <?php $user_post_detail = getDetailUser($post_detail['user_id']) ?>
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
                                <?php if ($user_post_detail['profile_picture'] == null): ?>
                                    <img class="l-profile-picture-sm" src="./asset/images/avatar_default.png"
                                        alt="profile_picture">
                                <?php else: ?>
                                    <img class="l-profile-picture-sm"
                                        src="data:image/jpeg;base64,<?= base64_encode($user_post_detail['profile_picture']) ?>"
                                        alt="profile_picture">
                                <?php endif; ?>

                                <span class="l-regular-md">
                                    <?= $post_detail['user_id'] == $user_id ? "You" : $user_post_detail['full_name'] ?>
                                </span>
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
                                            <?php if (checkOwnership($post_detail['post_id'], $user_id)): ?>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        onclick="setDeleteUrl('/Cakwe/process/post/controllers/delete-post.php?post_id=<?= $post_detail['post_id'] ?>')">
                                                        <div class="d-flex align-items-center dropdown-item p-2 column-gap-2">
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

                        <div class="mt-3">
                            <form method="POST" action="/Cakwe/process/social/controllers/add-comment.php">
                                <input class="form-control l-p-input-md l-regular-md-input-text  rounded-5" type="text"
                                    name="message" id="message" placeholder="Enter your comment..." required>
                                <input type="text" name="post_id" value="<?= $decrypted_id ?>" hidden>
                                <input type="text" name="user_id" value="<?= $user_id ?>" hidden>
                                <input type="submit" hidden>
                            </form>

                        </div>
                        <div>
                            <div class="comment-thread">
                                <!-- Comment 1 start -->
                                <?php foreach (getCommentsByPostId($post_detail['post_id']) as $comment): ?>

                                    <?php $comment_user_detail = getDetailUser($comment['user_id']) ?>

                                    <details open class="comment" id="comment-1">
                                        <a href="#comment-1" class="comment-border-link">
                                            <span class="sr-only">Jump to comment-1</span>
                                        </a>
                                        <summary>
                                            <div class="comment-heading">
                                                <div class="comment-info">
                                                    <div class="d-flex align-items-center column-gap-1">
                                                        <?php if ($comment_user_detail['profile_picture'] == null): ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="./asset/images/avatar_default.png" alt="profile_picture">
                                                        <?php else: ?>
                                                            <img class="l-profile-picture-sm"
                                                                src="data:image/jpeg;base64,<?= base64_encode($comment_user_detail['profile_picture']) ?>"
                                                                alt="profile_picture">
                                                        <?php endif; ?>

                                                        <span class="l-regular-md">
                                                            <?= $comment['user_id'] == $user_id ? "You" : $comment_user_detail['full_name'] ?>
                                                        </span>
                                                        <img src="./asset/icons/dot.png" alt="dot">
                                                        <span class="l-light-sm">
                                                            <?= timeAgo($comment['created_at']) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </summary>

                                        <div class="comment-body">
                                            <p class="l-paragraph">
                                                <?= $comment['message'] ?>
                                            </p>

                                            <div class="d-flex column-gap-2">
                                                <button type="button" data-toggle="reply-form"
                                                    data-target="comment-1-reply-form<?= $comment['comment_id'] ?>"
                                                    class="l-btn mt-3">
                                                    <img src="./asset/icons/Speech Bubble.svg" alt="">
                                                    Reply
                                                </button>
                                                <?php if ($comment['user_id'] == $user_id): ?>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        onclick="setDeleteUrl('/Cakwe/process/social/controllers/delete-comment.php?comment_id=<?= $comment['comment_id'] ?>&post_id=<?= $decrypted_id ?>')"
                                                        class="l-btn mt-3">
                                                        <img src="./asset/icons/trash.svg" alt="delete">
                                                    </button>
                                                <?php endif; ?>
                                            </div>


                                            <!-- Reply form start -->
                                            <form method="POST" action="/Cakwe/process/social/controllers/add-reply.php"
                                                class="reply-form d-none"
                                                id="comment-1-reply-form<?= $comment['comment_id'] ?>"
                                                action="/Cakwe/process/social/controllers/add-comment.php">
                                                <div class="d-flex flex-column row-gap-3 my-2">
                                                    <textarea
                                                        class="form-control l-regular-md-input-text l-p-input-md  rounded-2"
                                                        name="message" id="message" placeholder="Enter your message..."
                                                        rows="3"></textarea>
                                                    <input type="text" name="user_id" value="<?= $user_id ?>" hidden>
                                                    <input type="text" name="comment_id" value=<?= $comment['comment_id'] ?>
                                                        hidden>
                                                    <input type="text" name="post_id" value="<?= $decrypted_id ?>" hidden>

                                                    <div class="align-self-end">
                                                        <button type="button" class="btn l-btn-secondary-no-radius"
                                                            data-toggle="reply-form"
                                                            data-target="comment-1-reply-form">Cancel</button>
                                                        <button type="submit"
                                                            class="btn l-btn-primary-no-radius">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Reply form end -->
                                        </div>

                                        <?php if (count(getRepliesByCommentId($comment['comment_id'])) > 0): ?>
                                            <?php foreach (getRepliesByCommentId($comment['comment_id']) as $reply): ?>

                                                <?php $reply_user_detail = getDetailUser($reply['user_id']) ?>

                                                <div class="replies">
                                                    <!-- Comment 2 start -->
                                                    <details open class="comment" id="comment-2">
                                                        <a href="#comment-2" class="comment-border-link">
                                                            <span class="sr-only">Jump to comment-2</span>
                                                        </a>
                                                        <summary>
                                                            <div class="comment-heading">
                                                                <div class="comment-info">
                                                                    <div class="d-flex align-items-center column-gap-1">
                                                                        <?php if ($reply_user_detail['profile_picture'] == null): ?>
                                                                            <img class="l-profile-picture-sm"
                                                                                src="./asset/images/avatar_default.png"
                                                                                alt="profile_picture">
                                                                        <?php else: ?>
                                                                            <img class="l-profile-picture-sm"
                                                                                src="data:image/jpeg;base64,<?= base64_encode($reply_user_detail['profile_picture']) ?>"
                                                                                alt="profile_picture">
                                                                        <?php endif; ?>

                                                                        <span class="l-regular-md">
                                                                            <?= $reply['user_id'] == $user_id ? "You" : $reply_user_detail['full_name'] ?>
                                                                        </span>
                                                                        <img src="./asset/icons/dot.png" alt="dot">
                                                                        <span class="l-light-sm">
                                                                            <?= timeAgo($reply['created_at']) ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </summary>

                                                        <div class="comment-body">
                                                            <?php if ($reply['reply_to_id'] != null): ?>
                                                                <?php $reply_to_detail = getReplyById($reply['reply_to_id']) ?>
                                                                <?php if ($reply_to_detail != null)
                                                                    $reply_to_user_detail = getDetailUser($reply_to_detail['user_id']) ?>

                                                                <?php if ($reply_to_detail == null): ?>
                                                                    <div class="mb-3 p-4 bg-light rounded">
                                                                        <p class="l-paragraph mt-1">
                                                                            <i>Reply has been deleted by the author</i>
                                                                        </p>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="mb-3 p-4 bg-light rounded">
                                                                        <div class="d-flex align-items-center column-gap-1">
                                                                            <?php if ($reply_to_user_detail['profile_picture'] == null): ?>
                                                                                <img class="l-profile-picture-sm"
                                                                                    src="./asset/images/avatar_default.png"
                                                                                    alt="profile_picture">
                                                                            <?php else: ?>
                                                                                <img class="l-profile-picture-sm"
                                                                                    src="data:image/jpeg;base64,<?= base64_encode($reply_to_user_detail['profile_picture']) ?>"
                                                                                    alt="profile_picture">
                                                                            <?php endif; ?>
                                                                            <span class="l-regular-md">
                                                                                <?= $reply_to_detail['user_id'] == $user_id ? "You" : $reply_to_user_detail['full_name'] ?>
                                                                            </span>
                                                                            <img src="./asset/icons/dot.png" alt="dot">
                                                                            <span class="l-light-sm">
                                                                                <?= timeAgo($reply_to_detail['created_at']) ?>
                                                                        </div>
                                                                        <p class="l-paragraph mt-1">
                                                                            <?= $reply_to_detail['message'] ?>
                                                                        </p>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>


                                                            <p class="l-paragraph">
                                                                <?= $reply['message'] ?>
                                                            </p>

                                                            <div class="d-flex column-gap-2">
                                                                <button type="button" data-toggle="reply-form"
                                                                    data-target="comment-2-reply-form<?= $reply['reply_id'] ?>"
                                                                    class="l-btn mt-3">
                                                                    <img src="./asset/icons/Speech Bubble.svg" alt="">
                                                                    Reply
                                                                </button>
                                                                <?php if ($reply['user_id'] == $user_id): ?>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                        onclick="setDeleteUrl('/Cakwe/process/social/controllers/delete-reply.php?reply_id=<?= $reply['reply_id'] ?>&post_id=<?= $decrypted_id ?>')"
                                                                        class="l-btn mt-3">
                                                                        <img src="./asset/icons/trash.svg" alt="delete">
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>

                                                            <!-- Reply form start -->
                                                            <form method="POST" method="POST"
                                                                action="/Cakwe/process/social/controllers/add-reply.php"
                                                                class="reply-form d-none"
                                                                id="comment-2-reply-form<?= $reply['reply_id'] ?>">
                                                                <div class="d-flex flex-column row-gap-3 my-2">
                                                                    <textarea
                                                                        class="form-control l-regular-md-input-text l-p-input-md  rounded-2"
                                                                        name="message" id="message"
                                                                        placeholder="Enter your message..." rows="3"></textarea>
                                                                    <input type="text" name="user_id" value="<?= $user_id ?>"
                                                                        hidden>
                                                                    <input type="text" name="comment_id"
                                                                        value=<?= $comment['comment_id'] ?> hidden>
                                                                    <input type="text" name="post_id" value="<?= $decrypted_id ?>"
                                                                        hidden>
                                                                    <input type="text" name="reply_to_id"
                                                                        value=<?= $reply['reply_id'] ?> hidden>

                                                                    <div class="align-self-end">
                                                                        <button type="button" class="btn l-btn-secondary-no-radius"
                                                                            data-toggle="reply-form"
                                                                            data-target="comment-1-reply-form">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn l-btn-primary-no-radius">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- Reply form end -->
                                                        </div>
                                                    </details>
                                                    <!-- Comment 2 end -->

                                                    <!-- <div class="ps-2">
                                                        <a href="#load-more">
                                                            <p class="l-paragraph text-primary text-decoration-underline">
                                                                Load more replies...
                                                            </p>
                                                        </a>
                                                    </div> -->
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </details>


                                    <!-- <a href="#load-more">
                                            <p class="l-paragraph text-primary text-decoration-underline">
                                                Load more comments...
                                            </p>
                                        </a> -->

                                <?php endforeach; ?>

                                <!-- Comment 1 end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="l-sidebar-right py-2 px-3">
            <div class="d-flex flex-column py-3">
                <?php include 'views/components/recent-post_component.php' ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        document.addEventListener(
            "click",
            function (event) {
                var target = event.target;
                var replyForm;
                if (target.matches("[data-toggle='reply-form']")) {
                    replyForm = document.getElementById(target.getAttribute("data-target"));
                    replyForm.classList.toggle("d-none");
                }
            },
            false
        );
    </script>


    <?php include 'views/components/delete-confirm-modal_component.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>