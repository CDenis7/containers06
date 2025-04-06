<?php
include 'connect.php';
$query = "SELECT DISTINCT denumire_eveniment, responsabil_eveniment,nr_loc_disponibil,adresa_filiala,nr_telefon_filiala,ora,cost_eveniment FROM eveniment INNER JOIN filiala_data_ora ON eveniment.id_eveniment =filiala_data_ora.id_eveniment INNER JOIN filiala_crafti ON filiala_data_ora.id_filiala=filiala_crafti.id_filiala WHERE eveniment.id_eveniment='$eventId'";
//INNER JOIN inscriere_eveniment ON inscriere_eveniment.id_filiala_data_ora=filiala_data_ora.id_filiala_data_ora 
$result = mysqli_query($connection, $query);
mysqli_close($connection);
