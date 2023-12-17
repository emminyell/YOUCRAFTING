<?php
    @include 'nav.php';
    @include 'Config.php';
 
    if(ISSET($_POST['submit'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $date_creation=date('y_m_d h:i:s');

    $objet= new Database();
    $objet->CreateUser($firstname,$lastname,$username,$email,$titre,$contenu, $date_creation);
        echo "<script>alert('Successfully inserted data!')</script>";
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>youcrafting</title>
</head>
<body>
<form method="POST" style="margin: 80px;">
  <div class="mb-3" >
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">First name</label>
    <input type="text" class="form-control" name="firstname" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lastname" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">user name</label>
    <input type="text" class="form-control" name="username" id="exampleInputPassword1">
  </div>
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">titre</label>
    <input type="text" class="form-control" name="titre" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">contenu</label>
    <input type="text" class="form-control" name="contenu" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

