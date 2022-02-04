<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>

    <?php
        include("header_2.php");
    ?>

    <section class="create-account" id="create-account">
        <div class="max-width mx-auto">
            <div>
                <div class="text-center position-relative mb-75">
                    <h1 class="star-title">Create an account</h1>
                </div>
            </div>
            <div class="new-account-details mx-auto">
                <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=insert_customer">
                    <div class="row">
                        <div class="col-md-6 space-bottom">
                            <input type="text" class="input form-control" id="fname" name="fname" placeholder="First name" required>
                        </div>
                        <div class="col-md-6 space-bottom">
                            <input type="text" class="input form-control" id="lname" name="lname" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 space-bottom">
                            <input type="email" class="input form-control" id="email" name="email" placeholder="Email address" required>
                        </div>
                        <div class="col-md-6 space-bottom">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+49</span>
                                <input type="text" class="form-control" id="number" name="mobile" placeholder="Mobile number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 space-bottom">
                            <input type="password" class="input form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-6 space-bottom">
                            <input type="password" class="input form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="checkbox-content space-bottom">
                            <div>
                                <input type="checkbox" class="checkbox" id="terms-conditions" name="terms-conditions" required>
                            </div>
                            <div>
                                <label for="terms-conditions"> I have read the <span class="text-color"> privacy policy. </span> </label><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button name="submit" class="submit space-bottom mx-auto"><b>Register</b></button>
                    </div>
                    <div class="row">
                        <p class="space-bottom">Already registered? <span><a href="" class="text-color style-none" data-bs-toggle="modal" data-bs-target="#login_modal" data-bs-dismiss="modal">Login now</span> </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
    include("footer_2.php");
?>