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
    <?php include 'Validation.php' ?>
    <h1>Inregistrare</h1>
    <form action="register.php" method="POST" class="forms">
        <label for="prenume">Prenume:</label>
        <input type="text" name="prenume" id="prenume" value="<?php echo ($prenumeErr) ? "" : $prenume ?>">
        <span class="eroare"><?php echo ($prenumeErr) ? $prenumeErr : "" ?></span>
        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon" id="telefon" value="<?php echo ($telefonErr) ? "" : $telefonErr ?>">
        <span class="eroare"><?php echo ($telefonErr) ? $telefonErr : "" ?></span>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo ($emailErr) ? "" : $email ?>">
        <span class="eroare"><?php echo ($emailErr) ? $emailErr : "" ?></span>
        <label for="password">Parola:</label>
        <input type="password" name="password" id="password">
        <span class="eroare"><?php echo ($passwordErr) ? $passwordErr : "" ?></span>
        <button type="submit" name="register" value="1">Submit</button>
        <a href="index.php">Autentificare</a>
    </form>
</body>

</html>