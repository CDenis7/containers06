<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include 'connect.php';

    $passwordHashed = md5($password);
    $query = "SELECT * FROM manager WHERE login='$email' AND parola='$passwordHashed'";
    $result = mysqli_query($connection, $query);
    if (mysqli_fetch_array($result)) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['access'] = 'manager';
        $_SESSION['dataUser'] = $result;
    } else {
        $query = "SELECT * FROM parinte WHERE email='$email' AND parola='$passwordHashed'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['access'] = 'parinte';
            $_SESSION['dataUser'] = $result;
        } else {
            echo "<p class='eroare'> Nu exista asa utilizator!</p>";
        }
    }
    // var_dump($_SESSION);
}
