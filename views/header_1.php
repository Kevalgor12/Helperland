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
        <a class="navbar-brand" href="http://localhost/Helperland/">
            <img class="img-fluid" src="http://localhost/Helperland/assets/images/logo-large.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link rounded-link-transparent" href="http://localhost/Helperland/?controller=Helperland&function=gotobookservicepage">Book a Cleaner</a>
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
                    <a class="nav-link rounded-link-transparent" data-bs-toggle="modal" data-bs-target="#login_modal" onclick="loginmodal()">Login</a>
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