<?php

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
      header('location:login.php');
   }else{



      
      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to package review!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'added to package review!';
         
      }

   }

}

?>
<?php

if(isset($_POST['add_to_cart_guid'])){

   if($user_id == ''){
      header('location:login.php');
   }else{



      
      $gid = $_POST['gid'];
      $gid = filter_var($gid, FILTER_SANITIZE_STRING);

      
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);

      $guidprice = $_POST['guidprice'];
      $guidprice = filter_var($guidprice, FILTER_SANITIZE_STRING);

      $guidImage = $_POST['guidImage'];
      $guidImage = filter_var($guidImage, FILTER_SANITIZE_STRING);
      

      $languages = $_POST['languages'];
      $languages = filter_var($languages, FILTER_SANITIZE_STRING);


      $cNumber = $_POST['cNumber'];
      $cNumber = filter_var($cNumber, FILTER_SANITIZE_STRING);

      





      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to package review!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, gid, name, guidprice, guidImage) VALUES(?,?,?,?,?,)");
         $insert_cart->execute([$user_id, $gid, $name, $guidprice, $guidImage]);
         $message[] = 'added to package review!';
         
      }

   }

}

?>