<?php
    include "./../includes/controller-autoload.inc.php";
    $booking = new BookingController();
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['confirmBtn'])) {
        $booking->confirm();
    }
?>
<script>
alert("Booking confirmed!");
window.location.href = "../admin/views/bookingList.php";
</script>;