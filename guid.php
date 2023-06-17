
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guid</title>

       <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="packages" id="packages">

    <h1 class="heading">guid list</h1>

    <div class="box-container">
    <?php
        $select_products = $conn->prepare("SELECT * FROM `guid`");
        $select_products->execute();
        if($select_products->rowCount() > 0){
        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
           
          
        ?>
         <form action="" method="post" class="">
        <div class="box">
            <div class="image">
            <input type="hidden" name="guidImage" value="<?php $fetch_products['guidImage']; ?>">
            <img src="uploaded_img/<?= $fetch_products['guidImage']; ?>" alt="">
            </div>
            <div class="content">
<form>
            <!-- <input type="hidden" name="gid" value="<?= $fetch_products['id']; ?>">
            <input type="hidden" name="languages" value="<?= $fetch_products['languages']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
            <input type="hidden" name="cNumber" value="<?= $fetch_products['cNumber']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">

                <p><h2>languages</h2> <?php  $fetch_products['languages']; ?></p>
                <p><h2>name</h2><?= $fetch_products['name']; ?></p>
                <p><h2>Contact Number</h2><?= $fetch_products['cNumber']; ?></p>
                <p><h2>Age</h2><?= $fetch_products['Age']; ?></p>
                <p><h2>Gender</h2><?= $fetch_products['Sex']; ?></p>
                <p><h2>Experiences</h2><?= $fetch_products['experiences']; ?></p> -->
                <div class="flex">
                <div class="price">Price  <span>$</span><?= $fetch_products['price']; ?></div>
                </div>
                <button type="submit" name="add_to_cart_guid" class="book-btn">Book Now</button>
                
            </div>
</form>
        </div>
        
            <?php
         }
        }else{
            echo '<p class="empty">no guiders added yet!</p>';
        }
        ?>
        

    </div>
    
</section>



</body>
</html>