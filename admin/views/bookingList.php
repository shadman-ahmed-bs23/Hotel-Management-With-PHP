<?php

    session_start();

    if (!isset($_SESSION['user'])) {
        header("location: index.php");
    }

?>
<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./templates/sidenav.php";
    require_once "../includes/class-autoload.inc.php";

    //fetching all bookings
    $booking = new Booking();
    $data = $booking->getBookings();

    function createOption($room_number, $room_type, $bedding, $price)
    {
        return
            "Room Number: " . $room_number . " -- " .
            $room_type . "(" . $bedding . ")" . " - " .
            $price . "$";
    }

?>

<div class="main animate__animated animate__fadeInLeft">
    <hr>
    <h3>All Bookings</h3>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Room Number</th>
                <th scope="col">Floor</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
                <th scope="col">Options</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $booking) {
                    $booking_id = (string) $booking['booking_id'];
                    $room_id = (string) $booking['room_id'];
                    $ids = $booking_id . "+" . $room_id;
                ?>
            <tr>
                <td scope='col'><?php echo $booking['booking_id'] ?></td>
                <td scope='col'><?php echo $booking['room_number'] ?></td>
                <td scope='col'><?php echo $booking['floor'] ?></td>
                <td scope='col'><?php echo $booking['name'] ?></td>
                <td scope='col'><?php echo $booking['email'] ?></td>
                <td scope='col'><?php echo $booking['phone'] ?></td>
                <td scope='col'><?php echo $booking['check_in'] ?></td>
                <td scope='col'><?php echo $booking['check_out'] ?></td>

                <?php if ($booking['confirmed']): ?>
                <!-- Nested if else -->
                <?php if ($booking['checked_out']): ?>
                <td scope='col'>
                    <form action='./showBill.php' method='get'>
                        <button type='submit' name='showBillBtn'
                            class='btn btn-sm btn-success' value="<?=$ids?>">
                            Show Bill
                        </button>
                    </form>
                </td>
                <?php else: ?>
                <td scope='col'>
                    <form action="./../../controllers/checkout-booking.php"
                        method='get'>
                        <button type='submit'
                            onClick="return confirm('Are you sure?');"
                            name='checkoutBtn' class='btn btn-sm btn-warning'
                            value="<?=$ids?>">
                            Checkout
                        </button>
                    </form>
                    <!-- <a href="./../../controllers/create-booking.php?booking_id="
                        class='btn btn-danger mt-3'>Delete</a> -->
                </td>
                <?php endif;?>
                <?php else: ?>
                <td scope='col'>
                    <form action='bookingList.php' method='post'>

                        <button type='submit'
                            onClick="return confirm('Are you sure?');"
                            name='confirmBtn' class='btn btn-sm btn-primary '
                            value="<?=$ids?>">
                            Confirm
                        </button>
                    </form>
                </td>
                <?php endif;?>
            </tr>
            <?php }?>

        </tbody>
    </table>

</div>

<?php
    //include "./includes/class-autoload.inc.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['confirmBtn'])) {
        confirmBooking();
    }
    function confirmBooking()
    {
        if (isset($_POST['confirmBtn'])) {

            $ids = $_POST['confirmBtn'];

            $str_arr = explode("+", $ids);
            $booking_id = (int) $str_arr[0];
            $room_id = (int) $str_arr[1];

            $booking = new Booking();
            $booking->updateBooking($booking_id);

            $room = new Room();
            $room->updateRoom($room_id);

            echo '<script>
            alert("Booking confirmed!");
            window.location.href="bookingList.php";
            </script>';
        }
    }

?>

<?php

    require_once "./templates/footer.php";

?>