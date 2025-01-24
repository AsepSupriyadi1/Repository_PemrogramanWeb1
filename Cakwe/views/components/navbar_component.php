<?php
include 'process/account/functions/get-detail-user.php';
$isLoggedIn = isset($_SESSION['user_id']);
$user_detail = null;

if ($isLoggedIn) {
    $user_detail = getDetailUser($_SESSION['user_id']);
}
?>

<nav class="navbar navbar-expand-lg l-bg-primary border l-navbar">
    <div class="container-fluid px-3 d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="./asset/images/logo.png" alt="">
        </a>

        <!-- <form class="d-flex mx-auto w-50" role="search">
            <input class="form-control l-bg-input l-p-input-sm l-regular-md-input-text text-center rounded-5"
                type="search" placeholder="Search Cakwe" aria-label="Search">
        </form> -->

        <?php if (!$isLoggedIn): ?>
            <button type="button" class="btn l-btn-primary ms-auto" data-bs-toggle="modal"
                data-bs-target="#loginModal">Login</button>
        <?php elseif ($isLoggedIn): ?>
            <div class="d-flex align-items-center column-gap-3">
                <div>
                    <a href="/Cakwe/add-post" class="d-flex align-items-center column-gap-2"> <img src="./asset/icons/add.svg" alt=""> Create</a>
                </div>

                <div class="btn-group dropstart px-3">
                    <img class="l-profile-picture-md dropdown-toggle" 
                    src="data:image/jpeg;base64,<?= base64_encode($user_detail['profile_picture']) ?>" 
                    alt="photo_profile" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu p-2">
                        <li><a class="dropdown-item p-2" href="/Cakwe/profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="/Cakwe/process/account/controllers/logout.php" class="dropdown-item p-2">Logout</a></li>
                    </ul>
                </div>
            </div>
            
        <?php endif; ?>

       

    </div>
</nav>

<!-- LOGIN MODAL -->
<?php include 'views/components/login-modal_component.php' ?>

<!-- REGISTRATION MODAL -->
<?php include 'views/components/register-modal_component.php' ?>