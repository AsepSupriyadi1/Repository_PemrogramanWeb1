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
        <div class="l-detail-content mx-auto pb-5">
            <div class="text-center p-5">
                <h1 class="l-semibold-xl">Cakwe Content Policy</h1>
            </div>

            <div class="d-flex flex-column row-gap-3">
                <div>
                    <h2 class="l-medium-lg">Introduction</h2>
                    <p class="l-paragraph"><strong>Cakwe</strong> is committed to fostering a safe and respectful
                        environment for all users.
                        This content policy outlines the rules and guidelines for acceptable content on our platform.
                    </p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Prohibited Content</h2>
                    <ul>
                        <li>Content that promotes hate, violence, or discrimination of any kind.</li>
                        <li>Harassment, threats, or abusive behavior towards individuals or groups.</li>
                        <li>Explicit or sexually explicit content.</li>
                        <li>Spam, misleading information, or malicious links.</li>
                    </ul>

                </div>


                <div>
                    <h2 class="l-medium-lg">User Responsibilities</h2>
                    <p class="l-paragraph">Users are responsible for the content they share on <strong>Cakwe</strong>.
                        By using our
                        platform,
                        you agree to:</p>
                    <ul>
                        <li>Respect the rights and privacy of others.</li>
                        <li>Refrain from sharing any content that violates applicable laws or regulations.</li>
                        <li>Report inappropriate content to <strong>Cakwe</strong> moderators.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="l-medium-lg">Enforcement</h2>
                    <p class="l-paragraph"><strong>Cakwe</strong> reserves the right to remove content that violates
                        this policy and to
                        suspend
                        or terminate accounts involved in severe or repeated violations.</p>

                    <h2 class="l-medium-lg">Policy Updates</h2>
                    <p class="l-paragraph">We may update this content policy from time to time. Users are encouraged to
                        review this policy
                        periodically to stay informed about any changes. Continued use of <strong>Cakwe</strong>
                        constitutes
                        acceptance of any updates.</p>
                </div>

            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>