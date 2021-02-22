<?php 
include("header.php");
include("../controllers/db.php")
?>
<form class="form-signin" action="../controllers/login_script.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
    <label for="login" class="sr-only">Email</label>
    <input type="mail" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">
    <div class="checkbox mb-3">

    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>
<?php
include("footer.php");
?>

