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
    ?>
    <h1>Events</h1>
    <form id="allEvents" action="event.php" method="GET">
        <?php
        include 'actions/loadEvents.php';

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <button class="events" type="submit" name="eventId" value="<?php echo $row['id_eveniment'] ?>">
                <h2><?php echo $row['denumire_eveniment'] ?></h2>
                <p>Responsabil: <?php echo $row['responsabil_eveniment'] ?></p>
                <p>Locuri disponibile: <?php echo $row['nr_loc_disponibil'] ?>/12</p>
                <p><?php echo $row['ora'] ?></p>
                <p>Costul: <?php echo $row['cost_eveniment'] ?>$</p>
            </button>
        <?php
        } ?>
    </form>
    <form id="addEvent" action="addEvent.php" method="POST">
        <?php
        // var_dump($_SESSION);
        if ($_SESSION['access'] == 'manager') { ?> <button class="events" type="submit" name="eventId" value="<?php echo $row['id_eveniment'] ?>">
                <h2>Adauga eveniment</h2>
            </button>
        <?php
        }
        ?>
    </form>
</body>

</html>