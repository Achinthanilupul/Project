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
   <title>home</title>


   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   


</head>
<body>

<?php include 'components/user_header.php'; ?>


<!-- home section starts  -->

<section class="home">

   
   <div id="menu-btn" class="fas fa-bars"></div>
   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/home1.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>travel arround the world</h3>
               <a href="package.php" class="btna">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home2.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>discover the new places</h3>
               <a href="package.php" class="btna">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home3.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>make your tour worthwhile</h3>
               <a href="package.php" class="btna">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->




<!-- packages section starts  -->

<section class="packages" id="packages">

    <h1 class="heading"> Catagories</h1>

    <div class="box-container">



        <div class="box">
            <div class="image">
                <img src="images/img-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>Family Tours</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=Family Tours" class="btnp">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>Religious Tours</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=Religious Tours" class="btnp">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>Adventure Tours</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=Adventure Tours" class="btnp">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>Special Event Tours</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=Special Event Tours" class="btnp">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>National Parks</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=National Parks" class="btnp">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-6.jpg" alt="">
            </div>
            <div class="content">
                <h3>Themed Vacations</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, eos.</p>
                <div class="price">$250 - $450</div>
                <a href="category.php?category=Themed Vacations" class="btnp">explore now</a>
            </div>
        </div>

        

    </div>

</section>





<section class="packages" id="packages">

    <h1 class="heading">Latest packages</h1>

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
                <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="btnp">quick view </a>  
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


<!-- ##################################################################################### -->


<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="script1.js"></script>
<script src="js/travelwebsite.js"></script>



</script>

</body>
</html>