<!-- forgotpassword modal start -->

<div class="modal fade" id="forgotpassword_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Forgot password</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="register-inputs me-0 ms-0">
                    <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=forgot_password">
                        <div class="input-group">
                            <input type="email" class="form-control" id="email1" name="email" placeholder="Email Address" required>
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <button name="submit" class="btn-login">Send</button>
                    </form>
                </div>
                <div class="modal-footer-text">
                    <div>
                        <p><span><a href="" class="text-color style-none" data-bs-toggle="modal" data-bs-target="#login_modal">Login now</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- forgotpassword modal end -->