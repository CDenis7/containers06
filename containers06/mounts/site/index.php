<?php ?>
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
    include 'Validation.php';
    include 'LoginProcess.php';
    include 'Menu.php';
    // echo md5("manager1"); 
    ?>
    <h1>Autentificare</h1>
    <form action="index.php" method="POST" class="forms">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo ($emailErr) ? "" : $email ?>">
        <span class="eroare"><?php echo ($emailErr) ? $emailErr : "" ?></span>
        <label for="password">Parola:</label>
        <input type="password" name="password" id="password">
        <span class="eroare"><?php echo ($passwordErr) ? $passwordErr : "" ?></span>
        <button type="submit" name="submitted">Submit</button>
        <a href="register.php">Register</a>
    </form>
</body>

</html>