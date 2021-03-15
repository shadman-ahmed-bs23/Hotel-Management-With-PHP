<?php

    include "./../includes/class-autoload.inc.php";

    $type = new RoomType();

    if (isset($_POST['submit'])) {
        $roomType = $_POST['roomType'];
        $bedding = $_POST['bedding'];
        $price = $_POST['price'];

        $type->addRoomType($roomType, $bedding, $price);
    }

?>

<script type="text/javascript">
alert("Room Type Added Successfully");
window.location.href = "../admin/views/addRoomType.php";
</script>