<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("location: index.php");
    }

    require_once "./templates/header.php";
    require_once "../../process/bill-process.php";
?>

<div class="container">
    <div class="bill-container">
        <h3 class="text-center bill-heading">Bill Information</h3>

        <p class="ids">Booking ID: #<b><?=$booking_id?></b></p>
        <p class="ids">Bill ID: #<b><?=$bill_id?></b></p>
        <div class="info">
            <fieldset>
                <legend>Personal Information</legend>
                <h6>Name: <?=$name?></h6>
                <h6>Email: <?=$email?></h6>
                <h6>Phone: <?=$phone?></h6>
            </fieldset>
            <fieldset>
                <legend>Booking Information</legend>
                <h6>Check In: <?=$check_in?></h6>
                <h6>Check Out: <?=$check_out?></h6>
                <h6>Room: #<?=$room_number?> - <?=$room_type?>
                </h6>
            </fieldset>
        </div>

        <fieldset>
            <legend>Billing Info</legend>

            <table class="table bill-table">
                <thead>
                    <tr>
                        <th scope="col">Cost Per Day</th>
                        <th scope="col">Days</th>
                        <th scope="col">Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col"><?=$cost_per_day?> $</td>
                        <td scope="col"><?=$days_num?></td>
                        <td scope="col"><b><?=$total_cost?> $</b></td>
                    </tr>
                </tbody>
            </table>

        </fieldset>
    </div>
</div>