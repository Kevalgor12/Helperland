<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['title']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/Helperland/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
</head>
<body>

    <?php
        include("Login.php");
    ?>

    <div class="scroll-up-btn top-arrow">
        <i class="fas fa-chevron-up"></i>
    </div>

    <div class="scroll-up-btn message-box">
        <img src="http://localhost/Helperland/assets/images/layer-598.png" alt="message" class="img-fluid">
    </div>

    <nav class="homepage navbar fixed-top navbar-expand-xl navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="http://localhost/Helperland/assets/images/logo-large.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link rounded-link-transparent" href="BookService.php">Book a Cleaner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="Prices.php">Prices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="#">Our Guarantee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link" href="Contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link-transparent" data-bs-toggle="modal" data-bs-target="#login_modal" href="">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-link-transparent" href="ServiceProvider.php">Become a Helper</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="http://localhost/Helperland/assets/images/ic-flag.png" alt="flag">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="http://localhost/Helperland/assets/images/ic-flag.png" alt="flag">
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="http://localhost/Helperland/assets/images/ic-flag.png" alt="flag">
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>