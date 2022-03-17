<?php
    include("ForgotPassword.php");
?>

<!-- login modal start -->

<div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Login to your account</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="register-inputs me-0 ms-0">
                    <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=login_user">
                        <div class="input-group">
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <div class="checkbox-content">
                            <div>
                                <input type="checkbox" class="checkbox" id="remember-me" name="remember-me">
                            </div>
                            <div>
                                <label for="remember-me"> Remember me</label><br>
                            </div>
                        </div>
                        <button name="submit" class="btn-login">Login</button>
                    </form>
                </div>
                <div class="modal-footer-text">
                    <div>
                        <p><span><a href="" class="text-color style-none" data-bs-toggle="modal" data-bs-target="#forgotpassword_modal" onclick="forgotpasswordmodal()">Forgot password?</a></span></p>
                        <p>Don't have an account?</p>
                        <p><span><a href="http://localhost/Helperland/CreateNewAccount.php" class="text-color style-none">Create an account</a><span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- login modal end -->