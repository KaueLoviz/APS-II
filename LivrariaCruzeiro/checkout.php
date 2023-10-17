<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'O seu carrinho está vazio!';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Pedido já realizado!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Pedido realizado com sucesso!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Finalizar</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Finalizar</h3>
   <p> <a href="home.php">home</a> / finalizar </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">O seu carrinho está vazio!</p>';
   }
   ?>
   <div class="grand-total"> Total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Faça seu pedido</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Nome :</span>
            <input type="text" name="name" required placeholder="Nome">
         </div>
         <div class="inputBox">
            <span>Celular :</span>
            <input type="number" name="number" required placeholder="Número">
         </div>
         <div class="inputBox">
            <span>E=mail :</span>
            <input type="email" name="email" required placeholder="E-mail">
         </div>
         <div class="inputBox">
            <span>Método de pagamento :</span>
            <select name="method">
               <option value="Dinheiro">Dinheiro</option>
               <option value="Cartão de crédito">Cartão de crédito</option>
               <option value="Cartão de débito">Cartão de débito</option>
               <option value="Pix">Pix</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Endereço - n°:</span>
            <input type="number" name="flat" required placeholder="Número da rua">
         </div>
         <div class="inputBox">
            <span>Rua :</span>
            <input type="text" name="street" required placeholder="Rua">
         </div>
         <div class="inputBox">
            <span>Cidade :</span>
            <input type="text" name="city" required placeholder="Cidade">
         </div>
         <div class="inputBox">
            <span>Estado :</span>
            <input type="text" name="state" required placeholder="Estado">
         </div>
         <div class="inputBox">
            <span>País :</span>
            <input type="text" name="country" required placeholder="País">
         </div>
         <div class="inputBox">
            <span>CEP :</span>
            <input type="number" min="0" name="pin_code" required placeholder="CEP">
         </div>
      </div>
      <input type="submit" value="Concluir" class="btn" name="order_btn">
   </form>

</section>

<?php include 'footer.php'; ?>

<!-- js  -->
<script src="assets/js/script.js"></script>

</body>
</html>