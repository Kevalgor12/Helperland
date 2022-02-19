<?php
    include("Login.php");
?>

<nav class="navbar navbar-expand-xl fixed-top navbar-light navbar-bg-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="http://localhost/Helperland/assets/images/logo-small.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link rounded-link-transparent" href="BookService.php">Book now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link" href="Prices.php">Prices & services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link" href="#">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link" href="Contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link-transparent" data-bs-toggle="modal" data-bs-target="#login_modal" href="">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-link-transparent" href="ServiceProvider.php">Become a Helper</a>
                </li>
            </ul>
        </div>
    </div>
</nav>