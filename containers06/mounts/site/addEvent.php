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
    <?php include 'Menu.php'; ?>
    <h1>Crearea Eveniment Nou</h1>
    <form action="actions/createNewEvent.php" method="POST" class="formsAdd">
        <label for="numeEvent">Numele evenimentului:</label>
        <input type="text" name="numeEvent" id="numeEvent" value="<?php echo ($numeEventErr) ? "" : $email ?>">
        <span class="eroare"><?php echo ($numeEventErr) ? $numeEventErr : "" ?></span>
        <label for="reponsabil">Reponsabil de eveniment:</label>
        <input type="text" name="reponsabil" id="reponsabil">
        <span class="eroare"><?php echo ($responsabilErr) ? $responsabilErr : "" ?></span>

        <label for="cost">Cost eveniment:</label>
        <input type="number" name="cost" id="cost">
        <span class="eroare"><?php echo ($costErr) ? $costErr : "" ?></span>

        <label for="filialaAlege">Alegeti filiala </label>
        <select name="filialaAlege" id="filialaAlege">
            <?php
            include 'actions/getFiliale.php';
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id_filiala'] . "' " . ">" . $row['adresa_filiala'] . "</option>";
            }
            ?>
        </select>
        <span></span>

        <label for="data">Alegeti data:</label>
        <input type="date" name="data" id="data">
        <span></span>

        <label for="ora">Alegeti ora :</label>
        <input type="text" name="ora" id="ora">
        <span></span>

        <button type="submit" name="submitted">Submit</button>

    </form>
</body>

</html>