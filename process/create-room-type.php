<?php
    include "./../includes/controller-autoload.inc.php";

    $roomType = new RoomTypeController();
    if (isset($_POST['submit'])) {
        $roomType->add();
    }

?>

<script type="text/javascript">
alert("Room Type Added Successfully");
window.location.href = "../admin/views/addRoomType.php";
</script>