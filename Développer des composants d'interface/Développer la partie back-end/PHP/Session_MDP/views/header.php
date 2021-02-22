<?php 
session_start();

if (isset($_SESSION["auth"])) {
  echo "Bonjour ".$_SESSION["auth"]."<br>"; ?>
  <form id="deconnexion" action="../controllers/disconnect_script.php" method="post">
  <button type="submit" class="btn btn-danger">Deconnexion</button>
  </form>
<?php }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
    <body class="text-center">