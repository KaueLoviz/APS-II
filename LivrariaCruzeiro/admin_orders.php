<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'Status do pagamento atualizado!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
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
   <link rel="stylesheet" href="assets/css/admin_style.css">

   <!-- icone -->
   <link rel="shortcut icon" href="assets/images/admin.png" />

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="orders">

   <h1 class="title">Pedidos realizados</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> Id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> Pedido em : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> Nome : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Número : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> E-mail : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Endereço : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Produtos totais : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Preço total : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> Método de pagamento : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="pendente">pendente</option>
               <option value="completo">completo</option>
            </select>
            <input type="submit" value="atualizar" name="update_order" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Deseja deletar esse pedido?');" class="delete-btn">deletar</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Não existe ainda pedidos!</p>';
      }
      ?>
   </div>

</section>

<!-- js -->
<script src="assets/js/admin_script.js"></script>

</body>
</html>