<?php
include 'connect.php';
$query = "SELECT * FROM Filiala_Crafti ";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
