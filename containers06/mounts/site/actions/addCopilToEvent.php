<?php
$eventId = $_POST['event'];

include '../connect.php';
$query = "SELECT DISTINCT * FROM eveniment INNER JOIN filiala_data_ora ON eveniment.id_eveniment =filiala_data_ora.id_eveniment INNER JOIN filiala_crafti ON filiala_data_ora.id_filiala=filiala_crafti.id_filiala WHERE eveniment.id_eveniment='$eventId'";
$result = mysqli_query($connection, $query);
$result = mysqli_fetch_array($result);

$nr = $result['nr_loc_disponibil'] - 1;
$queryUpdateLocuri = "UPDATE `eveniment` SET `nr_loc_disponibil` = '" . $nr . "' WHERE `eveniment`.`id_eveniment` = $eventId";
mysqli_query($connection, $query);

$data = date("y-m-d h:i:s");
$query = "INSERT INTO inscriere_eveniment(data_inscriere,id_filiala_data_ora,id_copil) VALUES ('$data','" . $result['id_filiala_data_ora'] . "','" . $_POST['copilAlege'] . "')";
$result = mysqli_query($connection, $query);
echo $query;


echo $queryUpdateLocuri;
mysqli_query($connection, $queryUpdateLocuri);

mysqli_close($connection);
header("Location: http://localhost/Lab11/event.php?eventId=" . $eventId);
