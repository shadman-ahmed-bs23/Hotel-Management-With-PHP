<?php
    include "./../includes/controller-autoload.inc.php";

    $booking = new BookingController();
    if (isset($_POST['submit'])) {
        $booking->add();
    }
?>

<script>
alert("Booking Added Successfully");
window.location.href = "../admin/views/bookingList.php";
</script>;