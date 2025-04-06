<?php
include 'connect.php';
$query = "SELECT * FROM copil ";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
