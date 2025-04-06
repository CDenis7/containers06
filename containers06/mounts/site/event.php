<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab11</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include 'Menu.php';
    $eventId = $_GET['eventId'];
    // echo $eventId;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'actions/getEvent.php';
        $row = mysqli_fetch_array($result)
        // var_dump($row);
    ?>
        <div class="eventMain">
            <h2><?php echo $row['denumire_eveniment'] ?></h2>
            <p><u>Responsabil:</u> <?php echo $row['responsabil_eveniment'] ?></p>
            <p><u>Locuri disponibile:</u> <?php echo $row['nr_loc_disponibil'] ?>/12</p>
            <p><u>Adresa:</u> <?php echo $row['adresa_filiala'] ?></p>
            <p><u>Nr de contact:</u> <?php echo $row['nr_telefon_filiala'] ?></p>
            <p><u>Timpul: </u><?php echo $row['ora'] ?></p>
            <p><u>Costul:</u> <?php echo $row['cost_eveniment'] ?>$</p>


        </div>
    <?php
    } ?>
    <form action="actions/addCopilToEvent.php" method="POST">
        <label for="copilAlege">Adauga un copil </label>
        <select name="copilAlege" id="copilAlege">
            <?php
            include 'actions/getCopii.php';
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id_copil'] . "' " . ">" . $row['prenume_copil'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="event" value="<?php echo $eventId ?>">Adauga copil</button>
    </form> <?php
            // }
            ?>

    <?php

    if ($_SESSION['access'] == 'manager') {
    ?>
        <table>
            <tr>
                <th>Prenume</th>
                <th>Anul Nasterii</th>
                <th>Data inscrierii</th>
            </tr>
            <?php
            $eventId = $_GET['eventId'];
            include 'actions/getCopiiInEvent.php';
            while ($row = mysqli_fetch_array($result)) {
                // var_dump($row);
                echo "<tr>";
                echo "<td>" . $row['prenume_copil'] . "</td>";
                echo "<td>" . $row['an_nastere_copil'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                echo "</tr>";
            }

            ?>
            <form action="actions/deleteCopilToEvent.php" method="POST">
                <label for="copilAlege">Sterge copil de la eveniment:</label>
                <select name="copilAlege" id="copilAlege">
                    <?php
                    $eventId = $_GET['eventId'];
                    include 'actions/getCopiiInEvent.php';
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['id_copil'] . "' " . ">" . $row['prenume_copil'] . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="event" value="<?php echo $eventId ?>">Sterge copil</button>
            </form>
        <?php }
        ?>
        </table>
</body>

</html>