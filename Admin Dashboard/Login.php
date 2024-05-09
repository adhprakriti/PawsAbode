<?php
//Start session
session_start();

$error_message = '';

if($_POST){
  include('../database/connection.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = 'SELECT * FROM admins WHERE admins.Email="'. $email .'" AND admins.Password="'. $password .'"';
  $stmt = $conn->prepare($query);
  $stmt->execute();

  if($stmt->rowCount() > 0){
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll()[0];
    $_SESSION['user'] = $user;
    
    header('Location: dashboard.php');

  } else $error_message = 'Please make sure that email and password are correct.';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Adoption Center</title>
  <link rel="stylesheet" href="Login.css">
</head>
<body>
  
  <?php if(!empty($error_message)) { ?>
    <div id="errorMessage">
      <strong>ERROR:</strong><p> <?= $error_message?> </p>
    </div>
  <?php }?>
  <div class="container">
    <div class="background-image">
      <img src="../Collab/dog3.jpg" alt="Pet Adoption Image">
      <div class="overlay"></div>
    </div>
    <div class="login-form">
      <h2>Login</h2>
      <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
