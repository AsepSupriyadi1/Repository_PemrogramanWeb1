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

    <!-- Main Content -->
    <div class="l-main">
        <!-- Sidebar Kiri -->
        <?php include 'views/components/sidebar_component.php' ?>

        <!-- Container Content Tengah (Scroll) -->
        <div class="l-content">
            <!-- CONTAINER POST ITEM -->
            <div class="p-4">
                <h1 class="l-semibold-xl">Create post</h1>


                <div id="tab">
                    <nav class="d-flex column-gap-3 my-4">
                        <span class="l-regular-lg active l-cursor-pointer" data-id='1'>Text</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='2'>Images</span>
                        <span href="#" class="l-regular-lg l-cursor-pointer" data-id='3'>Link</span>
                    </nav>

                    <form action="">

                        <!-- TEXT INPUT -->
                        <div class="tab-content active" data-content='1'>
                            <div class="d-flex flex-column row-gap-3">
                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="title">Title<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                        type="text" name="title" id="title" placeholder="Enter post title..." required>
                                </div>

                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="desc">Description <span
                                            class="text-secondary" class="text-danger">(optional)</span></label>
                                    <textarea class="form-control l-regular-md-input-text l-p-input-md  rounded-2"
                                        name="desc" id="desc" placeholder="Enter description..." rows="10"
                                        required></textarea>

                                </div>
                                <button type="button" class="btn l-btn-primary ms-auto align-self-end">Submit</button>
                            </div>
                        </div>

                        <!-- IMAGES INPUT -->
                        <div class="tab-content" data-content='2'>
                            <div class="d-flex flex-column row-gap-3">
                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="title">Title<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                        type="text" name="title" id="title" placeholder="Enter post title..." required>
                                </div>

                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="desc">Image <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control l-regular-md-input-text l-p-input-md rounded-2"
                                        type="file">
                                </div>
                                <button type="button" class="btn l-btn-primary ms-auto align-self-end">Submit</button>
                            </div>
                        </div>

                        <!-- URL INPUT -->
                        <div class="tab-content" data-content='3'>
                            <div class="d-flex flex-column row-gap-3">
                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="title">Title<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                        type="text" name="title" id="title" placeholder="Enter post title..." required>
                                </div>
                                <div>
                                    <label class="l-regular-md-input-text mb-2" for="url">Link / URL<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                        type="text" name="url" id="url" placeholder="Enter URL..." required>
                                </div>

                                <button type="button" class="btn l-btn-primary ms-auto align-self-end">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="mt-5">

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
</body>

</html>