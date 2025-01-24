<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="mx-auto modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 px-4 pt-4">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pt-3 pb-5">
                <div>
                    <h1 class="l-semibold-xl">Sign Up</h1>
                    <p class="l-regular-md mt-2">
                        By continuing, you acknowledge that you understand the <a href="/Cakwe/privacy-policy"
                            class="text-decoration-underline l-medium-md">Privacy Policy.</a>
                    </p>
                </div>
                <div>
                    <form id="registerForm" method="POST" action="/Cakwe/process/account/controllers/registration.php">
                        <div class="my-3 d-flex flex-column row-gap-3">
                            <div>
                                <label class="l-regular-md-input-text mb-2" for="email">Email<span
                                        class="text-danger">*</span></label>
                                <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2" type="email"
                                    name="email" id="email" placeholder="Enter your email..." required>
                            </div>
                            <div>
                                <label class="l-regular-md-input-text mb-2" for="reqPassword">Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control l-p-input-md l-regular-md-input-text rounded-2"
                                    type="password" name="reqPassword" id="reqPassword"
                                    placeholder="Enter your password..." required>
                            </div>
                            <div>
                                <label class="l-regular-md-input-text mb-2" for="confirmPassword">Confirm Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                    type="password" name="confirmPassword" id="confirmPassword"
                                    placeholder="Confirm your password..." required>
                            </div>
                        </div>

                        <div>
                            <div class="alert alert-danger" role="alert" id="alert_password">
                                Password does not match!
                            </div>
                            <p class="l-regular-md mb-3">Already have an account
                                <span class="text-decoration-underline text-primary l-cursor-pointer"
                                    data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</span>
                            </p>
                            <button type="submit" class="l-w-full btn l-btn-primary ms-auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#alert_password').hide();

        $('#registerForm').on('submit', function (event) {
            event.preventDefault();
            let reqPassword = $('#reqPassword').val();
            let confirmPassword = $('#confirmPassword').val();

            console.log("req password: ", reqPassword);
            console.log("c password: ", confirmPassword);

            if (reqPassword !== confirmPassword) {
                $('#alert_password').show();
                return false;
            } else {
                $('#alert_password').hide();
                this.submit(); // Allow form submission
            }
        });
    });
</script>