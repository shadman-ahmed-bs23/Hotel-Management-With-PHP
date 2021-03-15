<?php
session_start();
unset($_SESSION["user"]);
header("location: ./../admin/views/index.php");