<?php
$recent_posts = getRecentPosts();
?>

<?php if (count($recent_posts) > 0): ?>

    <!-- CONTAINER -->
    <div class="p-3 border rounded">
        <div class="d-flex justify-content-between align-items-top mb-3">
            <h3 class="l-uppercase-light-text-md">recent post</h3>
            <a href="/Cakwe/process/recent-post/controllers.php" class="l-light-md text-primary">clear</a>
        </div>


        <div class="d-flex flex-column row-gap-3 l-recent-post-container">

            <?php foreach (getRecentPosts() as $post): ?>
                <?php $user_detail = getDetailUser($post['author_id']) ?>
                <!-- ITERABLE ITEMS -->
                <div class="d-flex column-gap-2 align-items-center py-2 ">
                    <div class="d-flex flex-column row-gap-2">
                        <div class="d-flex align-items-center column-gap-2">
                            <?php if ($user_detail['profile_picture'] == null): ?>
                                <img class="l-profile-picture-sm" src="./asset/images/avatar_default.png" alt="profile_picture">
                            <?php else: ?>
                                <img class="l-profile-picture-sm"
                                    src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>"
                                    alt="profile_picture">
                            <?php endif; ?>

                            <span class="l-regular-md">
                                <?= $post['user_id'] == $user_id ? "You" : $user_detail['full_name'] ?>
                            </span>
                            <img src="./asset/icons/dot.png" alt="dot">
                            <span class="l-light-sm">Viewed |  <?= timeAgo($post['created_at']) ?></span>
                        </div>
                        <?php $encryptedId = encryptId($post['post_id']); ?>
                        <a href="/Cakwe/detail-post?id=<?= urlencode($encryptedId) ?>">
                            <h3 class="l-medium-md"><?= $post['title'] ?></h3>
                        </a>
                        <!-- <div>
                    <span class="l-light-sm">370 funs</span>
                    <img src="./asset/icons/dot.png" alt="dot">
                    <span class="l-light-sm">200 comments</span>
                </div> -->
                    </div>
                </div>
                <!-- END OF ITERABLE ITEMS -->
            <?php endforeach; ?>
        </div>


    </div>

<?php endif; ?>