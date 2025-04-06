<?php
var_dump($_POST);
include '../connect.php';
$query = "INSERT INTO eveniment(denumire_eveniment, responsabil_eveniment, 	nr_loc_disponibil,cost_eveniment) VALUES ('" . $_POST['numeEvent'] . "','" . $_POST['reponsabil'] . "',12,'" . $_POST['cost'] . "')";

echo $query;
mysqli_query($connection, $query);
$query = "SELECT COUNT(id_eveniment) FROM eveniment";
$result = mysqli_fetch_array(mysqli_query($connection, $query));
$idEvent = $result[0];
$ora = $_POST['data'] . " " . $_POST['ora'] . ":00";
$query = "INSERT INTO filiala_data_ora(data, ora, id_filiala,id_eveniment) VALUES ('" . $_POST['data'] . "','" . $ora . "', '" . $_POST['filialaAlege'] . "',$idEvent)";
echo $query;
mysqli_query($connection, $query);
header("Location: http://localhost/Lab11/events.php");
