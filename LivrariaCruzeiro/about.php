<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sobre Nós</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="assets/css/style.css">

   <!-- icone -->
   <link rel="shortcut icon" href="assets/images/sobre.png" />

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Sobre nós</h3>
   <p> <a href="home.php">home</a> / sobre </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="assets/images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>Porque nos escolher?</h3>
         <p>Somos referência desde 2004</p>
         <p>Trazendo sempre os melhores livros da atualidade e antepassados!</p>
         <a href="contact.php" class="btn">Entre em contato</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Opiniões de clientes</h1>

   <div class="box-container">

      <div class="box">
         <img src="assets/images/pic-1.png" alt="">
         <p>Muito bom, adorei todo o sistema!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Bruno Junior</h3>
      </div>

      <div class="box">
         <img src="assets/images/pic-2.png" alt="">
         <p>Perfeito, adorei todo o sistema!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Amanda Souza</h3>
      </div>

      <div class="box">
         <img src="assets/images/pic-3.png" alt="">
         <p>Muito bom, adorei todo o sistema!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Daniel Saraiva</h3>
      </div>

      <div class="box">
         <img src="assets/images/pic-4.png" alt="">
         <p>Perfeito, adorei todo o sistema!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Helena Oliveira</h3>
      </div>

      <div class="box">
         <img src="assets/images/pic-5.png" alt="">
         <p>Perfeito, adorei todo o sistema!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lucas Matos</h3>
      </div>

      <div class="box">
         <img src="assets/images/pic-6.png" alt="">
         <p>Muito bom, adorei todo o sistema!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Gabriela Alves</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">Grandes Autores</h1>

   <div class="box-container">

      <div class="box">
         <img src="assets/images/author-1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Ivan Martins</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Karine Oliveira</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Mateus Bastos</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-4.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Suzana Almeida</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-5.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>David Santos</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-6.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Camylly Semene</h3>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<!-- js  -->
<script src="assets/js/script.js"></script>

</body>
</html>