<?php
include 'connect.php';
$query = "SELECT * FROM eveniment";

$result = mysqli_query($connection, $query);
mysqli_close($connection);
