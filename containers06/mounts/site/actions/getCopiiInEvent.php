<?php
include 'connect.php';
$query = "SELECT DISTINCT copil.id_copil,prenume_copil,an_nastere_copil,data FROM copil INNER JOIN inscriere_eveniment ON inscriere_eveniment.id_copil=copil.id_copil INNER JOIN filiala_data_ora ON inscriere_eveniment.id_filiala_data_ora=filiala_data_ora.id_filiala_data_ora WHERE filiala_data_ora.id_eveniment='$eventId'";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
