
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
    <title>Document</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css"> 

</head>
<style>
.one{

   margin-bottom: 3px;
}
.description{
   padding-left: 100px; 
   border:var(--border);
   padding:1rem 3rem;
  
}
/* .one form{
   
   
    border: 2px solid black;
    margin-top: 5px;
    margin-right: 100px;
   
} */

/* .qq{

   border: 2px solid black;
   
}  */

.package_box{
   display: grid;
 width: 50px;
 gap: 60px;
 padding-left: 5%;
 grid-template-columns: 300px 300px ;
 align-items: start;
 justify-content: space-between;
}

.package_box img{
   border:var(--border);
   height: 20rem;
   width: 70%;
   margin-right: 30px;
   object-fit: contain;
}

.package_box:first-child {
   align-self: center;
}
.book_box{
   border: 5000px; 
   margin-top: 5px;
   margin-left: 350px;
   max-width: 40rem;
   padding-left: 500px;
   margin-right: 100px;
   font-size: medium;
   position: fixed;
}
.one.book_box_image img{

   border: 5000px;
   height: 20rem;
   width: 10000px;
   margin-right: 30px;
   object-fit: contain;

}
.book{

    font-size: 20px;
   color:lawngreen;

}
.book:hover{
   color:black;
   text-decoration: underline;
}
.book_name{
   font-size: 2rem;
   margin:.5rem 0;
}
.book_flex{
   display: flex;
   justify-content: space-between;
   align-items: center;
   gap:5px;
   margin:1rem 0;
}
.book_flex.book_price{
   font-size: 2.5rem;
   color:var(--black);
}
.book_flex.book_price span{

    font-size: 2rem;
   color:black;
}
.book_flex.qty{
   border:var(--border);
   padding:1rem;
   font-size: 1.8rem;
   color:var(--black);
}
.book-btn{
   width: 100%;
   padding:1rem 3rem;
   text-align: center;
   border:var(--border);
   font-size: 2rem;
   color:var(--black);
   cursor: pointer;
   text-transform: capitalize;
   background: none;
   margin-top: 1rem;
}

.book-btn:hover{
   background-color: var(--black);
   color:var(--white);
} 


</style>
<body>

<?php include 'components/user_header.php'; ?>

<section class="one">

<h1 class="title">quick view</h1>

<?php
      $pid = $_GET['pid'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$pid]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
<div class="description">

        <form action="" method="post" class="box">
            <div class="desi"><?= $fetch_products['details']; ?></div>  
        </form>

</div>

<div class="package_box"> 
   <div class="space">
        <form  action="" method="post" class="qq">
            <h3>day 1</h3>
            <div class="ww"><?= $fetch_products['day_1']; ?></div>
                <input class="rr" type="hidden" name="day1image" value="<?= $fetch_products['day1image']; ?>">
                <img src="uploaded_img/<?= $fetch_products['day1image']; ?>" alt="">
    </div>        
        </form>


        <form action="" method="post" class="">
            <h3>day 2</h3>
            <div class=""><?= $fetch_products['day_2']; ?></div> 
                <input class="" type="hidden" name="day2image" value="<?= $fetch_products['day2image']; ?>">
                <img src="uploaded_img/<?= $fetch_products['day2image']; ?>" alt=""> 
        </form>

        <form action="" method="post" class="">
             <h3>day 3</h3>
             <div class=""><?= $fetch_products['day_3']; ?></div> 
                 <input class="" type="hidden" name="day3image" value="<?= $fetch_products['day3image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day3image']; ?>" alt="">   
        </form>

        <form action="" method="post" class="">
             <h3>day 4</h3>
              <div class=""><?= $fetch_products['day_4']; ?></div> 
                 <input class="" type="hidden" name="day4image" value="<?= $fetch_products['day4image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day4image']; ?>" alt=""> 
        </form>

        <form action="" method="post" class="">
             <h3>day 5</h3>
             <div class=""><?= $fetch_products['day_5']; ?></div> 
                 <input class="" type="hidden" name="day5image" value="<?= $fetch_products['day5image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day5image']; ?>" alt=""> 
         </form>

        <form action="" method="post" class="">
              <h3>day 6</h3>
              <div class=""><?= $fetch_products['day_6']; ?></div> 
                 <input class="" type="hidden" name="day6image" value="<?= $fetch_products['day6image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day6image']; ?>" alt=""> 
         </form>

        <form action="" method="post" class="">
              <h3>day 7</h3>
              <div class=""><?= $fetch_products['day_7']; ?></div> 
                 <input class="" type="hidden" name="day7image" value="<?= $fetch_products['day7image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day7image']; ?>" alt="">    
         </form>

        <form action="" method="post" class="">
              <h3>day 8</h3>
              <div class=""><?= $fetch_products['day_8']; ?></div> 
                 <input class="" type="hidden" name="day8image" value="<?= $fetch_products['day8image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day8image']; ?>" alt=""> 
        </form>

         <form action="" method="post" class="">
              <h3>day 9</h3>
              <div class=""><?= $fetch_products['day_9']; ?></div> 
                 <input class="" type="hidden" name="day9image" value="<?= $fetch_products['day9image']; ?>">
                 <img src="uploaded_img/<?= $fetch_products['day9image']; ?>" alt=""> 
         </form>

          <form action="" method="post" class="">
                 <h3>day 10</h3>
                 <div class=""><?= $fetch_products['day_10']; ?></div> 
                     <input class="" type="hidden" name="day10image" value="<?= $fetch_products['day10image']; ?>">
                     <img src="uploaded_img/<?= $fetch_products['day10image']; ?>" alt=""> 
           </form>

     <div class="book_box">
            <form action="" method="post" class="box">
            
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                    
                <div class="book_box_image">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                            <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                </div>    
                           <a href="category.php?category=<?= $fetch_products['category']; ?>" class="book"><?= $fetch_products['category']; ?></a>
                                <div class="book_name"><?= $fetch_products['name']; ?></div>
            
            <div class="book_flex">
                <div class="book_price">Price  <span>$</span><?= $fetch_products['price']; ?></div>
            </div>
            
            <div class="book_flex">
                Number of Memebrs <input type="number" name="qty" class="qty" min="5" max="99" value="1" maxlength="2"> 
            </div>

                    <button type="submit" name="add_to_cart" class="book-btn">Book Now</button>
            </form>
     </div>       
        <?php
                }
            }else{
                echo '<p class="empty">no Packages added yet!</p>';
            }
        ?>

</div>
    
         
</section>
<div>




<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</div>
    
</body>
</html>