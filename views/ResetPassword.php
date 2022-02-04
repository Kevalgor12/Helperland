<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>

    <?php
        include("header_2.php");
    ?>

    <section class="reset-password" id="reset-password">
        <div class="max-width mx-auto">
            <div>
                <div class="text-center position-relative mb-75">
                    <h1 class="star-title">Reset Password</h1>
                </div>
            </div>
            <div class="reset-password-details mx-auto">
                <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=reset_password">
                    <div class="row">
                        <label for="password">New Password</label>
                        <input type="password" class="input form-control" id="password" name="password" placeholder="Password">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="input form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                    </div>
                    <div class="row">
                        <button name="submit" class="submit space-bottom mx-auto"><b>Save</b></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
    include("footer_2.php");
?>