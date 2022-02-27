<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>

    <?php
        include("header_3.php");
    ?>

    <section class="service-history" id="service-history">
        <div class="max-width">
            <div class="service-history-content">
                <div class="user-name">
                    <span>Welcome, <b></b></span>
                </div>
            </div>
            <div class="sidebar-table">
                <div class="sidebar">
                    <a href="#dashboard">Dashboard</a>
                    <a class="active" href="#service-requests">Service History</a>
                    <a href="#service-schedule">Service Schedule</a>
                    <a href="#service-history">Favourite Pros</a>
                    <a href="#my-ratings">Invoices</a>
                    <a href="#block-customer">Notifications</a>
                </div>
                <div class="customer-table">
                    <div class="row">
                        <div class="col-8 service-history-text"><b>Service History</b></div>
                        <div class="col-4 export-btn-text"><button class="button-export">Export</button></div>
                    </div>
                    <table id="tableservice" class="table display dataTable">
                        <thead>
                            <tr>
                                <th>Service Details <img class="sort-img" alt=""></th>
                                <th>Service Provider <img class="sort-img" alt=""></th>
                                <th>Payment <img class="sort-img" alt=""></th>
                                <th>Status <img class="sort-img" alt=""></th>
                                <th>Rate SP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>31/03/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div>
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="ps-2">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>15/03/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>10/03/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>28/02/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>15/02/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>11/02/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>31/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>19/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>05/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>01/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>01/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <img src="http://localhost/Helperland/assets/images/calendar.png" alt="calendar"> <b>01/01/2018</b> <br>
                                        12:00 - 18:00
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="col-md-10">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp">Rate SP</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php
    include("footer_3.php");
?>