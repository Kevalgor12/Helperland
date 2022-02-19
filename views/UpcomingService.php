<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>
    
    <?php
        include("header_3.php");
    ?>

    <section class="upcoming-service" id="upcoming-service">
        <div class="max-width">
            <div class="upcoming-service-content">
                <div class="user-name">
                    <span>Welcome, <b></b></span>
                </div>
            </div>
            <div class="sidebar-table mx-auto">
                <div class="sidebar">
                    <a href="#dashboard">Dashboard</a>
                    <a href="#service-requests">New Service Requests</a>
                    <a class="active" href="#upcoming-services">Upcoming Services</a>
                    <a href="#service-schedule">Service Schedule</a>
                    <a href="#service-history">Service History</a>
                    <a href="#my-ratings">My Ratings</a>
                    <a href="#block-customer">Block Customer</a>
                </div>
                <div class="customer-table">
                    <table id="table" class="table display">
                        <thead>
                            <tr>
                                <th>Service ID <img class="sort-img" alt=""></th>
                                <th>Service date <img class="sort-img" alt=""></th>
                                <th>Customer details <img class="sort-img" alt=""></th>
                                <th>Distance <img class="sort-img" alt=""></th>
                                <th>Actions</th>
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
                                <td>15 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323437</td>
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
                                <td>10 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323438</td>
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
                                <td>15 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323439</td>
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
                                <td>15 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323440</td>
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
                                <td>10 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323441</td>
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
                                <td>25 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323442</td>
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
                                <td>15 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323443</td>
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
                                <td>05 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323444</td>
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
                                <td>15 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>323445</td>
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
                                <td>05 km</td>
                                <td>
                                    <button class="btn-cancel">Cancel</button>
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