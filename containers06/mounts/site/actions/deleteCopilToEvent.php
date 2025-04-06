<?php
include '../connect.php';
$eventId = $_POST['event'];
$query = "SELECT * FROM id_filiala_data_ora WHERE id_eveniment='$eventId'";
$result = mysqli_fetch_array(mysqli_query($connection, $query));
$query = "DELETE inscriere_eveniment FROM inscriere_eveniment LEFT JOIN filiala_data_ora ON inscriere_eveniment.id_filiala_data_ora=filiala_data_ora.id_filiala_data_ora WHERE id_copil=" . $_POST['copilAlege'] . " AND id_eveniment=" . $_POST['event'];
echo $query;
mysqli_query($connection, $query);

$result = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM eveniment WHERE id_eveniment='$eventId'"));

$nr = $result['nr_loc_disponibil'] + 1;
$queryUpdateLocuri = "UPDATE `eveniment` SET `nr_loc_disponibil` = '" . $nr . "' WHERE `eveniment`.`id_eveniment` = $eventId";
mysqli_query($connection, $queryUpdateLocuri);

mysqli_close($connection);
header("Location: http://localhost/Lab11/event.php?eventId=$eventId");
