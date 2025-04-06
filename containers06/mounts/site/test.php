<?php
$telefonErr= "";
$telefon  = "";
function verificare($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_REQUEST['submit'])) {
  

    if (empty($_POST["telefon"])) {
        $telefonErr = "Acest camp, trebuie obligatoriu completat !";
       
    } else {
        $telefon = verificare($_POST["telefon"]);

        if (!preg_match("/^044\d{6}$/", $telefon)) {
            $telefonErr = "Numarul de telefon trebuie sa fie format din primele 3 cifre -044, dupa care urmeaza oricare alte 6 cifre";
          
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<label for="telefon">Telefon:</label><br />
<input type="text" name="telefon" value="<?php echo $telefon; ?>"><br />
<span class="error">* <?php echo $telefonErr; ?></span><br /><br />


<input type="submit" value="Transmite" name="submit">
</form>
</body>
</html>