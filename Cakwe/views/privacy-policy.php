<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
// else{
//     header('Location: /Cakwe/home');
// }
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

    <!-- Main Content -->
    <div class="l-main">
        <!-- Sidebar Kiri -->
        <?php include 'views/components/sidebar_component.php' ?>

        <!-- Container Content Tengah (Scroll) -->
        <div class="l-detail-content mx-auto pb-5">
            <div class="text-center p-5">
                <h1 class="l-semibold-xl">Cakwe Privacy Policy</h1>
            </div>


            <div class="d-flex flex-column row-gap-3">
                <div>
                    <h2 class="l-medium-lg">Introduction</h2>
                    <p class="l-paragraph"><strong>Cakwe</strong> takes the private nature of your personal information
                        very seriously. This
                        privacy policy, which we adapted from a policy originally provided by Automattic
                        (WordPress.com),
                        describes how we treat the information we collect when you visit and use our websites. Please
                        read
                        this notice very carefully.</p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Website Visitors</h2>
                    <p class="l-paragraph">Like most website operators, <strong>Cakwe</strong> collects
                        non-personally-identifying information
                        of the sort that web browsers and servers typically make available, such as the browser type,
                        language preference, referring site, and the date and time of each visitor request.
                        <strong>Cakwe</strong> purpose in collecting non-personally identifying information is to better
                        understand how <strong>Cakwe</strong> visitors use its website. From time to time,
                        <strong>Cakwe</strong> may release non-personally-identifying information in the aggregate,
                        e.g., by
                        publishing a report on trends in the usage of its website.
                    </p>
                    <p class="l-paragraph"><strong>Cakwe</strong> also collects potentially personally-identifying
                        information like Internet
                        Protocol (IP) addresses. <strong>Cakwe</strong> does not use such information to identify its
                        visitors, and does not disclose such information, other than under the same circumstances that
                        it
                        uses and discloses personally-identifying information, as described below.</p>
                </div>


                <div>
                    <h2 class="l-medium-lg">Gathering of Personally-Identifying Information</h2>
                    <p class="l-paragraph">Certain visitors to <strong>Cakwe</strong> websites choose to interact with
                        <strong>Cakwe</strong> in
                        ways that require <strong>Cakwe</strong> to gather personally-identifying information. The
                        amount
                        and type of information that <strong>Cakwe</strong> gathers depends on the nature of the
                        interaction. For example, we ask visitors who sign up for <strong>Cakwe</strong>.com to provide
                        a
                        username and email address. In each case, <strong>Cakwe</strong> collects such information only
                        insofar as is necessary or appropriate to fulfill the purpose of the visitor's interaction with
                        <strong>Cakwe</strong>. <strong>Cakwe</strong> does not disclose personally-identifying
                        information
                        other than as described below. And visitors can always refuse to supply personally-identifying
                        information, with the caveat that it may prevent them from engaging in certain website-related
                        activities.
                    </p>
                </div>

                <div>
                    <h3>Data Deletion</h3>
                    <p class="l-paragraph">If you wish to delete your data that you provided from Facebook/Google login,
                        you
                        can fill this Form.
                    </p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Aggregated Statistics</h2>
                    <p class="l-paragraph"><strong>Cakwe</strong> may collect statistics about the behavior of visitors
                        to
                        its websites. For
                        instance, <strong>Cakwe</strong> may monitor the most popular collections on
                        <strong>Cakwe</strong>.com. <strong>Cakwe</strong> may display this information publicly or
                        provide
                        it to others. However, <strong>Cakwe</strong> does not disclose personally-identifying
                        information
                        other than as described below.
                    </p>
                </div>


                <div>
                    <h2 class="l-medium-lg">Protection of Certain Personally-Identifying Information</h2>
                    <p class="l-paragraph"><strong>Cakwe</strong> discloses potentially personally-identifying and
                        personally-identifying
                        information only to those of its employees, contractors and affiliated organizations that (i)
                        need
                        to know that information in order to process it on <strong>Cakwe</strong>'s behalf or to provide
                        services available at <strong>Cakwe</strong>'s websites, and (ii) that have agreed not to
                        disclose
                        it to others. Some of those employees, contractors and affiliated organizations may be located
                        outside of your home country: by using <strong>Cakwe</strong>'s websites, you consent to the
                        transfer of such information to them. In addition, in some cases we may choose to buy or sell
                        assets. In these types of transactions, user information is typically one of the business assets
                        that is transferred. Moreover, if <strong>Cakwe</strong> or substantially all of its assets were
                        acquired, or in the unlikely event that <strong>Cakwe</strong> goes out of business or enters
                        bankruptcy, user information would be one of the assets that is transferred or acquired by a
                        third
                        party. You acknowledge that such transfers may occur, and that any acquirer of
                        <strong>Cakwe</strong> may continue to use your personal and non-personal information only as
                        set
                        forth in this policy. Otherwise, <strong>Cakwe</strong> will not rent or sell potentially
                        personally-identifying and personally-identifying information to anyone.
                    </p>
                </div>


                <div>
                    <h2 class="l-medium-lg">Cookies</h2>
                    <p class="l-paragraph">A cookie is a string of information that a website stores on a visitor's
                        computer, and that the
                        visitor's browser provides to the website each time the visitor returns. <strong>Cakwe</strong>
                        uses
                        cookies to help <strong>Cakwe</strong> identify and track visitors, their usage of
                        <strong>Cakwe</strong> websites, and their website access preferences. <strong>Cakwe</strong>
                        visitors who do not wish to have cookies placed on their computers should set their browsers to
                        refuse cookies before using <strong>Cakwe</strong>'s websites, with the drawback that certain
                        features of <strong>Cakwe</strong>'s websites may not function properly without the aid of
                        cookies.
                    </p>
                </div>


                <div>
                    <h2 class="l-medium-lg">Security</h2>
                    <p class="l-paragraph">All non-personally-identifying information, potentially
                        personally-identifying
                        and
                        personally-identifying information described above is stored on restricted database servers.</p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Choice/Opt-out</h2>
                    <p class="l-paragraph">If we ever send you information by email concerning new products, services or
                        information that you
                        did not expressly request, we will provide you with an email address by which you may request no
                        further notices.</p>

                </div>
                <div>
                    <h2 class="l-medium-lg">Address Book Data</h2>
                    <p class="l-paragraph">Any external address book data (email contacts, etc.) that a user voluntarily
                        gives
                        <strong>Cakwe</strong> access to will only be used for the described feature (looking up
                        friends,
                        etc.), and will not be stored or repurposed.
                    </p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Privacy Policy Changes</h2>
                    <p class="l-paragraph">Although most changes are likely to be minor, <strong>Cakwe</strong> may
                        change
                        its privacy policy
                        from time to time, and in <strong>Cakwe</strong>'s sole discretion. <strong>Cakwe</strong>
                        encourages visitors to frequently check this page for any changes to its privacy policy. Your
                        continued use of this site after any change in this privacy policy will constitute your
                        acceptance
                        of such change.</p>

                    <p class="l-paragraph">If you have any questions about this privacy policy or our sites in general,
                        please contact us.</p>
                </div>

                <div>
                    <h2 class="l-medium-lg">Privacy Policy Changes</h2>
                    <p class="l-paragraph">Although most changes are likely to be minor, <strong>Cakwe</strong> may
                        change
                        its privacy policy
                        from time to time, and in <strong>Cakwe</strong>'s sole discretion. <strong>Cakwe</strong>
                        encourages visitors to frequently check this page for any changes to its privacy policy. Your
                        continued use of this site after any change in this privacy policy will constitute your
                        acceptance
                        of such change.</p>

                    <p class="l-paragraph">If you have any questions about this privacy policy or our sites in general,
                        please contact us.</p>
                </div>


            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>