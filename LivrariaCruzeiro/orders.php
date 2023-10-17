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
   <title>Pedidos</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="assets/css/style.css">
   
   <!-- icone -->
   <link rel="shortcut icon" href="assets/images/pedido.png" />

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Seus pedidos</h3>
   <p> <a href="home.php">home</a> / pedidos </p>
</div>

<section class="placed-orders">

   <h1 class="title">Pedidos realizados</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> Pedido em : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> Nome : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Número : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> E-mail : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Endereço : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Método de pagamento : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> Seus pedidos : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Preço total : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> Status do pagamento : <span style="color:<?php if($fetch_orders['payment_status'] == 'pendente'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">Nenhum pedido realizado ainda!</p>';
      }
      ?>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- js -->
<script src="assets/js/script.js"></script>

</body>
</html>