<?php
$actual_link = $_SERVER[HTTP_HOST];
$server = 'p:'.$actual_link;
$username = 'deportes';
$password = 'deportes20182';
$database = 'deportes';
$conn = mysqli_connect($server, $username, $password, $database) or die(mysqli_error($conn));
?>