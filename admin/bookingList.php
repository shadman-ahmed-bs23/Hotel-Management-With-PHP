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
    require_once "./includes/class-autoload.inc.php";

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
            <?php
                $bookings = new Booking();
                if ($bookings->getBookings()) {
                    foreach ($bookings->getBookings() as $booking) {
                        echo '<tr>';
                        echo "<td scope='col'>" . $booking['booking_id'] .
                            "</td>";
                        echo "<td scope='col'>" . $booking['room_number'] .
                            "</td>";
                        echo "<td scope='col'>" . $booking['floor'] .
                            "</td>";
                        echo "<td scope='col'>" . $booking['name'] . "</td>";
                        echo "<td scope='col'>" . $booking['email'] . "</td>";
                        echo "<td scope='col'>" . $booking['phone'] . "</td>";
                        echo "<td scope='col'>" . $booking['check_in'] .
                            "</td>";
                        echo "<td scope='col'>" . $booking['check_out'] .
                            "</td>";
                        $booking_id = (string) $booking['booking_id'];
                        $room_id = (string) $booking['room_id'];
                        $ids = $booking_id . "+" . $room_id;
                        // echo "<td>" . $ids . "</td>";

                        echo "<td scope='col'>" . ($booking['confirmed'] ?
                            "Booking Confirmed" :

                            "<form action='bookingList.php' method='post'>
                                <button type='submit'
                                onClick=
                                \"javascript:return confirm('Are you sure about confirmation?');\"
                                name='confirmBtn'
                                class='btn btn-sm btn-primary'
                                value='{$ids}' >
                                    Confirm
                                </button>
                            </form>") .
                            "</td>";
                        // echo

                        //     "<td scope='col'>
                        //     <form action='bookingList.php' method='post'>
                        //         <button type='submit' name='confirmBtn' value='{$booking['booking_id']}' >
                        //             Confirm
                        //         </button>
                        //     </form>
                        // </td>";

                        echo '</tr>';
                    }
                }
            ?>

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

            // echo "
            //   <script>
            //   if (confirm('Are you sure you want to save this thing into the database?')) {
            //     // Save it!
            //     console.log('Thing was saved to the database.');
            //   } else {
            //     // Do nothing!
            //     console.log('Thing was not saved to the database.');
            //   }
            //   </script>";

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