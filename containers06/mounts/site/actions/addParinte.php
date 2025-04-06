<?php
include '../connect.php';
$query = "INSERT INTO parinte(prenume_parinte,nr_telefon_parinte,email, parola) VALUES ('$prenume','$telefon','$email', '$password')";

mysqli_query($connection, $query);
mysqli_close($connection);
