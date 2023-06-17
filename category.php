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
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style1.css">
   


</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<!-- menu section ends 

fOR HOME WITHOUT QUANTITY AND QUICK VIEW

ONLY FOR HOME


-->






<section class="packages" id="packages">
    
    <h1 class="heading">popular packages</h1>

    <div class="box-container">
        
        <?php
        $select_products = $conn->prepare("SELECT * FROM `products`");
        $select_products->execute();
        if($select_products->rowCount() > 0){
        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="box">
            <div class="image">
            <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?= $fetch_products['category']; ?></h3>
                <p><?= $fetch_products['name']; ?></p>
                <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="btn">Quick View</a>
;  
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






















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>