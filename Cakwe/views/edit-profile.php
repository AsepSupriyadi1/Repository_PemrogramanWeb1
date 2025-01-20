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

                    <div class="d-flex align-items-center column-gap-2 my-4">
                        <img class="l-profile-picture" src="./asset/images/image.png" alt="photo_profile">
                        <div>
                            <button href="" class="btn l-btn-secondary ms-auto align-self-end">Change Avatar</button>
                        </div>
                    </div>

                    <h2 class="l-medium-lg my-4">General</h2>

                    <div class="tab-content active" data-content='1'>
                            <div class="d-flex flex-column row-gap-3">
                                <div>
                                    <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                        type="text" name="title" id="title" placeholder="Enter name.." value="Shinmarin" 
                                        required>
                                </div>

                                <div>
                                    <textarea class="form-control l-regular-md-input-text l-p-input-md  rounded-2"
                                        name="desc" id="desc" placeholder="Enter description..." rows="10"
                                        required>Seggs</textarea>

                                </div>
                                <button type="button" class="btn l-btn-primary ms-auto align-self-end">Submit</button>
                            </div>
                        </div>
                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>