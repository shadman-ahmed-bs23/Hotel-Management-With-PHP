<?php
    require_once "./templates/header.php";
    require_once "./templates/navigation.php";
    require_once "./includes/class-autoload.inc.php";
?>

<div class="container">
    <h3 class="text-center mt-5">Room Rates</h3>
    <hr>
    <div class="row">

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Deluxe Room</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Luxury Room</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Guest House</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Economic Room</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="./views/bookRoom.php" class="btn btn-lg btn-primary">Book
                any Room</a>
        </div>

        <div class="text-center mt-5">
            <a href="./views/roomStatus.php" class="btn btn-lg btn-primary">Room
                Status</a>
        </div>





    </div>

</div>

<?php

    require_once "./templates/footer.php";

?>