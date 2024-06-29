<?php
$con = mysqli_connect("localhost", "root", "", "tokoonline");


if (mysqli_connect_error()){
    echo "failed to connect to MYSQL: " . mysqli_connect_error();
    exit();
}
?>