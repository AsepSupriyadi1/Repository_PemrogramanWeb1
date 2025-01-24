<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="mx-auto modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 px-4 pt-4">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pt-3 pb-5">
                <div>
                    <h1 class="l-semibold-xl">Login</h1>
                    <p class="l-regular-md mt-2">
                        By continuing, you acknowledge that you understand the <a href="/Cakwe/privacy-policy"
                            class="text-decoration-underline l-medium-md">Privacy Policy.</a> 
                    </p>
                </div>
                <div>
                    <form id="loginForm" method="POST" action="/Cakwe/process/account/controllers/login.php">
                        <div class="my-3 d-flex flex-column row-gap-3">
                            <div>
                                <label class="l-regular-md-input-text mb-2" for="email">Email<span
                                        class="text-danger">*</span></label>
                                <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2" type="email"
                                    name="email" id="email" placeholder="Enter your email..." required>
                            </div>
                            <div>
                                <label class="l-regular-md-input-text mb-2" for="password">Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control l-p-input-md l-regular-md-input-text  rounded-2"
                                    type="password" name="password" id="password" placeholder="Enter your password..."
                                    required>
                            </div>
                        </div>
                        <div>
                            <p class="l-regular-md mb-3">New to Cakwe?
                                <span class="text-decoration-underline text-primary l-cursor-pointer"
                                    data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</span>
                            </p>
                            <button type="submit" class="l-w-full btn l-btn-primary ms-auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>