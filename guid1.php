
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
      $gid = $_GET['gid'];
      $select_guiders = $conn->prepare("SELECT * FROM `guid` WHERE id = ?");
      $select_guiders->execute([$gid]);
      if($select_guiders->rowCount() > 0){
         while($fetch_guiders = $select_guiders->fetch(PDO::FETCH_ASSOC)){
   ?>
        <div class="box">
            <div class="image">
            <input type="hidden" name="guidImage" value="<?= $fetch_guiders['guidImage']; ?>">
            <img src="uploaded_img/<?= $fetch_guiders['guidImage']; ?>" alt="">
            </div>
            <div class="content">
<form>
            <input type="hidden" name="gid" value="<?= $fetch_guiders['id']; ?>">
            <input type="hidden" name="languages" value="<?= $fetch_guiders['languages']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_guiders['name']; ?>">
            <input type="hidden" name="cNumber" value="<?= $fetch_guiders['cNumber']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_guiders['price']; ?>">

                <p><h2>languages</h2> <?= $fetch_guiders['languages']; ?></p>
                <p><h2>name</h2><?= $fetch_guiders['name']; ?></p>
                <p><h2>Contact Number</h2><?= $fetch_guiders['cNumber']; ?></p>
                <p><h2>Age</h2><?= $fetch_guiders['Age']; ?></p>
                <p><h2>Gender</h2><?= $fetch_guiders['Sex']; ?></p>
                <p><h2>Experiences</h2><?= $fetch_guiders['experiences']; ?></p>
                <div class="flex">
                <div class="price">Price  <span>$</span><?= $fetch_guiders['price']; ?></div>
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