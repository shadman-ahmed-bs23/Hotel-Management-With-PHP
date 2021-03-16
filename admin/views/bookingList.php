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

    //fetching room type
    $booking = new Booking();
    $data = $booking->getBookings();

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

                <!-- TODO: Refactoring Required -->
                <?php
                    echo "<td scope='col'>" . ($booking['confirmed'] ?
                            "<form action='bookingList.php' method='post'>
                        <button type='submit'
                            onClick=
                            \"javascript:return confirm('Are you sure about confirmation?');\"
                            name='confirmBtn'
                            class='btn btn-sm btn-warning'
                            value='{$ids}'
                        >
                            Checkout
                        </button>
                        <span class='me-2'><span>
                        <span class='ms-2'><span>
                        Confirmed
                    </form>" :

                            "<form action='bookingList.php' method='post'>
                        <button type='submit'
                            onClick=
                            \"javascript:return confirm('Are you sure about confirmation?');\"
                            name='confirmBtn'
                            class='btn btn-sm btn-warning'
                            value='{$ids}'
                        >
                            Checkout
                        </button>
                        <span class='me-3'><span>
                        <span class='ms-3'><span>
                        <button type='submit'
                            onClick=
                            \"javascript:return confirm('Are you sure about confirmation?');\"
                            name='confirmBtn'
                            class='btn btn-sm btn-primary'
                            value='{$ids}'
                        >
                            Confirm
                        </button>
                    </form>") .
                            "</td>";
                    ?>
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