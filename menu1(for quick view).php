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
    <title>menu</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css"> -->
    <style>
.btnbook {
  margin-top: 1rem;
  display: inline-block;
  border: 0.2rem solid #10221b;
  color: white;
  cursor: pointer;
  background: #10221b;
  font-size: 2rem;
  padding: 1rem 3rem;
}

.btnbook:hover {
  background: #10221b;
  color: #fff;
  text-transform: capitalize;
   transition: .2s linear;
}

</style>

</head>
<body>
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->
<div class="heading">
    <h3>our menu</h3>
    <p><a href="home.php">home</a> <span> / menu</span></p>
</div>
<!-- menu section starts  -->
<section class="products">
    <h1 class="title">latest dishes</h1>
    <div class="box-container">

    <?php
      $pid = $_GET['pid'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$pid]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                    <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                    <input type="hidden" name="details" value="<?= $fetch_products['details']; ?>">
                    <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                    <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">

                    <div class="image">
                    <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                    </div>

                    <div class="content">
                        <h3><?= $fetch_products['category']; ?></h3>
                        <p><?= $fetch_products['name']; ?></p>
                        <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                        <div >
                       <h4>Number of Memebrs </h4> <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2"> 
                        </div>
                        <button type="submit" formaction="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="btnbook" name="add_to_cart">Book Now </button>
                    </div>

                </form>
                <?php
            }
        }else{
            echo '<p class="empty">no Packages added yet!</p>';
        }
        ?>

    </div>

</section>


<!-- menu section ends -->





<!-- menu section starts  -->



















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->








<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="script1.js"></script>

</body>
</html>