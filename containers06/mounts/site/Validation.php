<?php
$numeErr = $prenumeErr  = $emailErr = $passwordErr = $telefonErr = "";
$nume = $prenume = $email = $password = $telefon = "";

function verificare($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nume"])) {
        $numeErr = "Completeaza acest camp!";
    } else {
        $nume = verificare($_POST["nume"]);
        if (!preg_match("/^[A-Z][a-z]{1,14}$/", $nume)) {
            $numeErr = "Introdu doar litere - prima mare si minim una mica!";
        }
    }
    if (empty($_POST["prenume"])) {
        $prenumeErr = "Completeaza acest camp!";
    } else {
        $prenume = verificare($_POST["prenume"]);
        if (!preg_match("/^[A-Z][a-z]{1,14}$/", $prenume)) {
            $prenumeErr = "Introdu doar litere - prima mare si minim una mica!";
        }
    }
    if (empty($_POST["telefon"])) {
        $telefonErr = "Completeaza acest camp!";
    } else {
        $telefon = verificare($_POST["telefon"]);
        if (!preg_match("/^\d{5,14}$/", $telefon)) {
            $telefonErr = "Introdu doar cifre de la 5 la 14!";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Completeaza acest camp!";
    } else {
        $email = verificare($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Adresa de e-mail nevalida!";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Completeaza acest camp";
    } else {
        $password = verificare($_POST["password"]);
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,10}$/", $password)) {
            $passwordErr = "Parola trebuie sa contina cel putin 4 caractere si maxim 10, cel putin o litera si o cifra!";
        }
    }
    // var_dump($_POST);
    // echo "register:" . $_POST['register'];
    if ($_POST['register']) {
        include 'connect.php';
        $password = md5($password);
        $query = "INSERT INTO parinte(prenume_parinte,nr_telefon_parinte,email, parola) VALUES ('$prenume','$telefon','$email', '$password')";
        // echo $query;
        mysqli_query($connection, $query);
        mysqli_close($connection);
        header("Location: http://localhost/labs/Lab11/index.php");
    }
}
