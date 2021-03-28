<?php
    include "./../includes/controller-autoload.inc.php";

    $booking = new BookingController();
    if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['checkoutBtn'])) {
        $booking->checkout();
    }

?>

<script>
window.location.href = "../admin/views/bookingList.php";
</script>