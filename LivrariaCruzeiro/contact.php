<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Mensagem enviada!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Mensagem enviada com sucesso!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contato</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="assets/css/style.css">
   
   <!-- icone -->
   <link rel="shortcut icon" href="assets/images/contato.png" />

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Entre em contato</h3>
   <p> <a href="home.php">home</a> / contato </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>Deixe um comentátio</h3>
      <input type="text" name="name" required placeholder="Nome" class="box">
      <input type="email" name="email" required placeholder="E-mail" class="box">
      <input type="number" name="number" required placeholder="Numero" class="box">
      <textarea name="message" class="box" placeholder="Mensagem" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Enviar" name="send" class="btn">
   </form>

</section>

<?php include 'footer.php'; ?>

<!-- js  -->
<script src="assets/js/script.js"></script>

</body>
</html>