<?php

$server = 'estudiantes.is.escuelaing.edu.co';
$username = 'deportes';
$password = 'deportes20182';
$database = 'deportes';

$conn = mysqli_connect($server, $username, $password, $database) or die(mysqli_error($conn));

?>