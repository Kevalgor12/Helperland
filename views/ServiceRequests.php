<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>
    
    <?php
        include("header_4.php");
    ?>

    <section class="admin" id="admin">
        <div class="max-width">
            <div class="sidebar-table">
                <div class="sidebar" id="sidebar">
                    <a class="menu" href="#service-management">Service Management</a>
                    <a class="menu" href="#role-management">Role Management</a>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Coupon Code Management
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="subnav">
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#Coupon-codes">Coupon Codes</a>
                                        </li>
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#usage-history">Usage History</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="menu" href="#escalation-management">Escalation Management</a>
                    <a class="menu active" href="#service-requests">Service Requests</a>
                    <a class="menu" href="#service-providers">Service Providers</a>
                    <a class="menu" href="#user-management">User Management</a>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Finance Module
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="subnav">
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#Coupon-codes">All Transactions</a>
                                        </li>
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#usage-history">Generate Payment</a>
                                        </li>
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#Coupon-codes">Customer Invoices</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="menu" href="#zip-code-management">Zip Code Management </a>
                    <a class="menu" href="#rating-management">Rating Management</a>
                    <a class="menu" href="#inquiry-management">Inquiry Management</a>
                    <a class="menu" href="#newsletter-management">Newsletter Management</a>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Content Management
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="subnav">
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#Coupon-codes">Blog</a>
                                        </li>
                                        <li class="subnav-content">
                                            <a class="sabmenu" href="#usage-history">FAQs</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customer-table">
                    <div class="row">
                        <div class="col-md-6 admin-text"><b>Service Requests</b></div>
                        <div class="col-md-6 addnew-btn-text"><button class="button-addnew"><img src="http://localhost/Helperland/assets/images/add.png" alt=""> Add New User</button></div>
                    </div>
                    <div class="row user-inputs">
                        <ul class="nav">
                            <li class="nav-item">
                                <input type="text" id="serviceid" name="serviceid" placeholder="Service ID">
                            </li>
                            <li class="nav-item">
                                <select name="admin-customer" id="admin-customer">
                                    <option disabled selected hidden value="">Customer</option>
                                    <option value="David Bough">David Bough</option>
                                    <option value="David Bough">David Bough</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="sprovider" id="sprovider">
                                    <option disabled selected hidden value="">Service Provider</option>
                                    <option value="Lyum watson">Lyum watson</option>
                                    <option value="John Smith">John Smith</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="admin-status" id="admin-status">
                                    <option disabled selected hidden value="volvo">Status</option>
                                    <option value="new">New</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><img src="http://localhost/Helperland/assets/images/admin-calendar-blue.png" alt=""></span>
                                    <input type="text" id="fromdate" name="fromdate" data placeholder="From Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><img src="http://localhost/Helperland/assets/images/admin-calendar-blue.png" alt=""></span>
                                    <input type="text" id="todate" name="todate" data placeholder="To Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div>
                                    <button class="btn-search">Search</button>
                                    <button class="btn-clear">Clear</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <table id="tableservicerequests" class="table display">
                        <thead>
                            <tr>
                                <th>Service ID <img class="sort-img" alt=""></th>
                                <th>Service date <img class="sort-img" alt=""></th>
                                <th>Customer details <img class="sort-img" alt=""></th>
                                <th>Service Provider <img class="sort-img" alt=""></th>
                                <th>Status <img class="sort-img" alt=""></th>
                                <th>Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <button class="btn-new">New</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <button class="btn-new">New</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-pending">Pending</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-pending">Pending</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-new">New</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-pending">Pending</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            <li><a class="dropdown-item" href="#">Change SP</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>323436</td>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> 09/04/2018 <br>
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> 12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        David Bough <br>
                                        <img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home"> Musterstrabe 5,12345 Bonn
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-9">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Escalate</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="rights-content">
                        <span class="rights">©2018 Helperland. All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="http://localhost/Helperland/assets/js/main.js"></script>
    <script src="http://localhost/Helperland/assets/js/datatable.js"></script>
</body>
</html>