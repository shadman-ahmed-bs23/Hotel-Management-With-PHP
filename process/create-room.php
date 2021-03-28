<?php

    include "./../includes/controller-autoload.inc.php";

    $room = new RoomController();
    if (isset($_POST['submit'])) {
        $room->add();
    }
?>

<script>
alert("Room Added Successfully");
window.location.href = "../admin/views/addRoom.php";
</script>