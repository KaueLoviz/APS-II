<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Já adicionado ao carrinho!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Produto adicionado ao carrinho!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css  -->
   <link rel="stylesheet" href="assets/css/style.css">

   <!-- icone -->
   <link rel="shortcut icon" href="assets/images/home.png" />

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Livro selecionado à sua escolha</h3>
      <p>Livros em perfeito estado.</p>
      <a href="about.php" class="white-btn">descobrir mais</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Produtos mais recentes</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="Adicionar" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Não existe produtos adicionados ainda!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">carregue mais</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="assets/images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>Sobre nós</h3>
         <p>Somos uma livraria no mercado a mais de 20 anos, proporcionando aos nossos clientes uma experiência incrivel.</p>
         <a href="about.php" class="btn">ler mais</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>Possui alguma dúvida?</h3>
      <p>Entre em contato com nosso suporte, ficaremos felizes em atender você!</p>
      <a href="contact.php" class="white-btn">Entre em contato</a>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- js  -->
<script src="assets/js/script.js"></script>

</body>
</html>