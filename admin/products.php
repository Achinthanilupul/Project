<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $day_1 = $_POST['day_1'];
   $day_1 = filter_var($day_1, FILTER_SANITIZE_STRING);

   $day_2 = $_POST['day_2'];
   $day_2 = filter_var($day_2, FILTER_SANITIZE_STRING);

   $day_3 = $_POST['day_3'];
   $day_3 = filter_var($day_3, FILTER_SANITIZE_STRING);

   $day_4 = $_POST['day_4'];
   $day_4 = filter_var($day_4, FILTER_SANITIZE_STRING);

   $day_5 = $_POST['day_5'];
   $day_5 = filter_var($day_5, FILTER_SANITIZE_STRING);

   $day_6 = $_POST['day_6'];
   $day_6 = filter_var($day_6, FILTER_SANITIZE_STRING);

   $day_7 = $_POST['day_7'];
   $day_7 = filter_var($day_7, FILTER_SANITIZE_STRING);

   $day_8 = $_POST['day_8'];
   $day_8 = filter_var($day_8, FILTER_SANITIZE_STRING);

   $day_9 = $_POST['day_9'];
   $day_9 = filter_var($day_9, FILTER_SANITIZE_STRING);

   $day_10 = $_POST['day_10'];
   $day_10 = filter_var($day_10, FILTER_SANITIZE_STRING);


   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $day1image = $_FILES['day1image']['name'];
   $day1image = filter_var($day1image, FILTER_SANITIZE_STRING);
   $day1image_size = $_FILES['day1image']['size'];
   $day1image_tmp_name = $_FILES['day1image']['tmp_name'];
   $day1image_folder = '../uploaded_img/'.$day1image;

   
   $day2image = $_FILES['day2image']['name'];
   $day2image = filter_var($day2image, FILTER_SANITIZE_STRING);
   $day2image_size = $_FILES['day2image']['size'];
   $day2image_tmp_name = $_FILES['day2image']['tmp_name'];
   $day2image_folder = '../uploaded_img/'.$day2image;

   
   $day3image = $_FILES['day3image']['name'];
   $day3image = filter_var($day3image, FILTER_SANITIZE_STRING);
   $day3image_size = $_FILES['day3image']['size'];
   $day3image_tmp_name = $_FILES['day3image']['tmp_name'];
   $day3image_folder = '../uploaded_img/'.$day3image;

   
   $day4image = $_FILES['day4image']['name'];
   $day4image = filter_var($day4image, FILTER_SANITIZE_STRING);
   $day4image_size = $_FILES['day4image']['size'];
   $day4image_tmp_name = $_FILES['day4image']['tmp_name'];
   $day4image_folder = '../uploaded_img/'.$day4image;

   
   $day5image = $_FILES['day5image']['name'];
   $day5image = filter_var($day5image, FILTER_SANITIZE_STRING);
   $day5image_size = $_FILES['day5image']['size'];
   $day5image_tmp_name = $_FILES['day5image']['tmp_name'];
   $day5image_folder = '../uploaded_img/'.$day5image;

   
   $day6image = $_FILES['day6image']['name'];
   $day6image = filter_var($day6image, FILTER_SANITIZE_STRING);
   $day6image_size = $_FILES['day6image']['size'];
   $day6image_tmp_name = $_FILES['day6image']['tmp_name'];
   $day6image_folder = '../uploaded_img/'.$day6image;

   
   $day7image = $_FILES['day7image']['name'];
   $day7image = filter_var($day7image, FILTER_SANITIZE_STRING);
   $day7image_size = $_FILES['day7image']['size'];
   $day7image_tmp_name = $_FILES['day7image']['tmp_name'];
   $day7image_folder = '../uploaded_img/'.$day7image;

   
   $day8image = $_FILES['day8image']['name'];
   $day8image = filter_var($day8image, FILTER_SANITIZE_STRING);
   $day8image_size = $_FILES['day8image']['size'];
   $day8image_tmp_name = $_FILES['day8image']['tmp_name'];
   $day8image_folder = '../uploaded_img/'.$day8image;

   
   $day9image = $_FILES['day9image']['name'];
   $day9image = filter_var($day9image, FILTER_SANITIZE_STRING);
   $day9image_size = $_FILES['day9image']['size'];
   $day9image_tmp_name = $_FILES['day9image']['tmp_name'];
   $day9image_folder = '../uploaded_img/'.$day9image;

   
   $day10image = $_FILES['day10image']['name'];
   $day10image = filter_var($day10image, FILTER_SANITIZE_STRING);
   $day10image_size = $_FILES['day10image']['size'];
   $day10image_tmp_name = $_FILES['day10image']['tmp_name'];
   $day10image_folder = '../uploaded_img/'.$day10image;

   

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exists!';
   }
      
   else{
      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }
      
      elseif($day1image_size > 2000000){
         $message[] = 'image size is too large';
      
      }
      elseif($day2image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day3image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day4image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day5image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day6image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day7image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day8image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day9image_size > 2000000){
         $message[] = 'image size is too large';
      
      }elseif($day10image_size > 2000000){
         $message[] = 'image size is too large';
      
      }
      
      else{
         move_uploaded_file($image_tmp_name, $image_folder);
         move_uploaded_file($day1image_tmp_name, $day1image_folder);
         move_uploaded_file($day2image_tmp_name, $day2image_folder);
         move_uploaded_file($day3image_tmp_name, $day3image_folder);
         move_uploaded_file($day4image_tmp_name, $day4image_folder);
         move_uploaded_file($day5image_tmp_name, $day5image_folder);
         move_uploaded_file($day6image_tmp_name, $day6image_folder);
         move_uploaded_file($day7image_tmp_name, $day7image_folder);
         move_uploaded_file($day8image_tmp_name, $day8image_folder);
         move_uploaded_file($day9image_tmp_name, $day9image_folder);
         move_uploaded_file($day10image_tmp_name, $day10image_folder);
         

         $insert_product = $conn->prepare("INSERT INTO `products`(name, details, category, price, image, day_1, day_2, day_3, day_4, day_5, day_6, day_7, day_8, day_9, day_10, day1image, day2image, day3image, day4image, day5image, day6image, day7image, day8image, day9image, day10image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $insert_product->execute([$name, $details, $category, $price, $image, $day_1, $day_2, $day_3, $day_4, $day_5, $day_6, $day_7, $day_8, $day_9, $day_10, $day1image, $day2image,$day3image,$day4image, $day5image, $day6image, $day7image, $day8image, $day9image, $day10image]);

         $message[] = 'new product added!';
      }

   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/1.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" required placeholder="Enter Package name" name="name" maxlength="100" class="box">
      <textarea name="details" class="box" required placeholder="Enter Package Details" maxlength="500" cols="30" rows="10"></textarea>

      <h3>day 1</h3>
      <textarea name="day_1" class="box" required placeholder="Enter day 1 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day1image" class="box" accept="day1image/jpg, day1image/jpeg, day1image/png, day1image/webp," required>

      <h3>day 2</h3>
      <textarea name="day_2" class="box" required placeholder="Enter day 2 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day2image" class="box" accept="day2image/jpg, day2image/jpeg, day2image/png, day2image/webp" required>

      <h3>day 3</h3>
      <textarea name="day_3" class="box" required placeholder="Enter day 3 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day3image" class="box" accept="day3image/jpg, day3image/jpeg, day3image/png, day3image/webp" required>

      <h3>day 4</h3>
      <textarea name="day_4" class="box" required placeholder="Enter day 4 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day4image" class="box" accept="day4image/jpg, day4image/jpeg, day4image/png, day4image/webp" required>

      <h3>day 5</h3>
      <textarea name="day_5" class="box" required placeholder="Enter day 5 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day5image" class="box" accept="day5image/jpg, day5image/jpeg, day5image/png, day5image/webp" required>

      <h3>day 6</h3>
      <textarea name="day_6" class="box" required placeholder="Enter day 6 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day6image" class="box" accept="day6image/jpg, day6image/jpeg, day6image/png, day6image/webp" required>

      <h3>day 7</h3>
      <textarea name="day_7" class="box" required placeholder="Enter day 7 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day7image" class="box" accept="day7image/jpg, day7image/jpeg, day7image/png, day7image/webp" required>

      <h3>day 8</h3>
      <textarea name="day_8" class="box" required placeholder="Enter day 8 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day8image" class="box" accept="day8image/jpg, day8image/jpeg, day8image/png, day8image/webp" required>

      <h3>day 9</h3>
      <textarea name="day_9" class="box" required placeholder="Enter day 9 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day9image" class="box" accept="day9image/jpg, day9image/jpeg, day9image/png, day9image/webp" required>

      <h3>day 10</h3>
      <textarea name="day_10" class="box" required placeholder="Enter day 10 details" maxlength="500" cols="30" rows="10"></textarea>
      <input type="file" name="day10image" class="box" accept="day10image/jpg, day10image/jpeg, day10image/png, day10image/webp" required>

      
   

      <input type="number" min="0" max="9999999999" required placeholder="Enter Package price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
      <select name="category" class="box" required>
         <option value="" disabled selected>select category --</option>
         <option value="Family Tours">Family Tours</option>
         <option value="Religious Tours">Religious Tours</option>
         <option value="Adventure Tours">Adventure Tours</option>
         <option value="Special Event Tours">Special Event Tours</option>
         <option value="National Parks">National Parks</option>
         <option value="Themed Vacations">Themed Vacations</option>
         <option value="Special Event Tours">Special Event Tours</option>
      </select>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<!-- add products section ends -->


<section class="packages" id="packages">

    <h1 class="heading">Added packages</h1>

    <div class="box-container">
        
    <?php
      $show_products = $conn->prepare("SELECT * FROM `products`");
      $show_products->execute();
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
   ?>   

        <div class="box">
            <div class="image">
            <img src="../uploaded_img/<?= $fetch_products['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?= $fetch_products['category']; ?></h3>
                <p><?= $fetch_products['name']; ?></p>
                <div class="price"><span>$</span><?= $fetch_products['price']; ?><span>/-</span></div>
                <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="btn">update</a>
                <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="btn" onclick="return confirm('delete this product?');">delete</a>
            </div>
        </div>

          
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

    </div>

</section>

<!-- packages section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
<script src="script1.js"></script>

</body>
</html>