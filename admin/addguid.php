
<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_guid'])){

    $guidImage = $_FILES['guidImage']['name'];
    $guidImage = filter_var($guidImage, FILTER_SANITIZE_STRING);
    $guidImage_size = $_FILES['guidImage']['size'];
    $guidImage_tmp_name = $_FILES['guidImage']['tmp_name'];
    $guidImage_folder = '../uploaded_img/'.$guidImage;

    $languages = $_POST['languages'];
    $languages = filter_var($languages, FILTER_SANITIZE_STRING);
  
 
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
   
 
    $cNumber = $_POST['cNumber'];
    $cNumber = filter_var($cNumber, FILTER_SANITIZE_STRING);

 
    $Age = $_POST['Age'];
    $Age = filter_var($Age, FILTER_SANITIZE_STRING);
 
 
    $Sex = $_POST['Sex'];
    $Sex = filter_var($Sex, FILTER_SANITIZE_STRING);
  
        
    $experiences = $_POST['experiences'];
    $experiences = filter_var($experiences, FILTER_SANITIZE_STRING);

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

 
     
    $select_guid = $conn->prepare("SELECT * FROM `guid` WHERE cNumber = ?");
    $select_guid->execute([$cNumber]);

    if($select_guid->rowCount() > 0){
        $message[] = 'guider name already exists!';
     }

     else{
        
        move_uploaded_file($guidImage_tmp_name, $guidImage_folder);

        $insert_guiders = $conn->prepare("INSERT INTO `guid`(guidImage,languages,name,cNumber,Age,Sex,experiences,price) VALUES (?,?,?,?,?,?,?,?)");
        $insert_guiders->execute([$guidImage,$languages, $name,$cNumber,$Age,$Sex,$experiences,$price]);

        $message[] = 'new guider added!';
     }

  


}


if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_guid_image = $conn->prepare("SELECT * FROM `guid` WHERE id = ?");
    $delete_guid_image->execute([$delete_id]);
    $fetch_delete_image = $delete_guid_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/'.$fetch_delete_image['guidImage']);
    $delete_guid = $conn->prepare("DELETE FROM `guid` WHERE id = ?");
    $delete_guid->execute([$delete_id]);
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE gid = ?");
    $delete_cart->execute([$delete_id]);
    header('location:addguid.php');
 
 }
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
<link rel="stylesheet" href="../css/admin_style.css">
<link rel="stylesheet" href="../css/1.css">
</head>
<style>

.add-guider form{
   margin:0 auto;
   max-width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   text-align: center;
}

.add-guider form h3{
   margin-bottom: 1rem;
   font-size: 2.5rem;
   color:var(--black);
   text-transform: capitalize;
}

.add-guider form .box{
   background-color: var(--light-bg);
   border:var(--border);
   width: 100%;
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   border-radius: .5rem;
   margin: 1rem 0;
}
/* ########################################################################### */

.show-guid .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.show-guid .box-container .box{
   background-color: white;
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:1.5rem;
}

.show-guid .box-container .box img{
   width: 100%;
   height: 20rem;
   object-fit: contain;
   margin-bottom: 1rem;
}

/* .show-guid .box-container .box .flex{
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
}

.show-guid .box-container .box .flex .category{
   font-size: 1.8rem;
   color:var(--main-color);
}

.show-guid .box-container .box .flex .price{
   font-size: 2rem;
   color:var(--black);
   margin:.5rem 0;
} */

.show-guid .box-container .box .flex .price span{
   font-size: 1.5rem;
}

</style>
<body>
<?php include '../components/admin_header.php' ?>
<section class="add-guider">

<form  action="" method="POST" enctype="multipart/form-data">
        <h3>add guider</h3>
            <input type="file" name="guidImage" class="box" accept="guidImage/jpg, guidImage/jpeg, guidImage/png, guidImage/webp," required>
            <input type="text" required placeholder="Enter languages "      name="languages" maxlength="100" class="box">
            <input type="text" required placeholder="Enter name"            name="name" maxlength="100" class="box">
            <input type="text" required placeholder="Enter contact Number"  name="cNumber" maxlength="100" class="box">
            <input type="text" required placeholder="Enter age"             name="Age" maxlength="100" class="box">
            <input type="text" required placeholder="Enter male/female"     name="Sex" maxlength="100" class="box">
            <input type="text" required placeholder="Enter experiences"     name="experiences" maxlength="100" class="box">
            <input type="number" min="0" max="9999999999" required placeholder="Enter Package price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box">
            <input type="submit" value="add guid"                           name="add_guid" class="btn">


</form>

</section>


<!-- ######################################################################################################### -->


<section class="show-guid" id="guid">

    <h1 class="heading">Added guiders</h1>

    <div class="box-container">
        
    <?php
      $show_guid = $conn->prepare("SELECT * FROM `guid`");
      $show_guid->execute();
      if($show_guid->rowCount() > 0){
         while($fetch_guid = $show_guid->fetch(PDO::FETCH_ASSOC)){  
   ?>   

        <div class="box">
            <div class="guidImage">
            <img src="../uploaded_img/<?= $fetch_guid['guidImage']; ?>" alt="">
            </div>
            <div class="content">
               
                <p><?= $fetch_guid['languages']; ?></p>
                <p><?= $fetch_guid['name']; ?></p>
                <p><?= $fetch_guid['cNumber']; ?></p>
                <p><?= $fetch_guid['Age']; ?></p>
                <p><?= $fetch_guid['Sex']; ?></p>
                <p><?= $fetch_guid['experiences']; ?></p>
                <div class="price"><span>$</span><?= $fetch_guid['price']; ?><span>/-</span></div>
                <!-- <p><?= $fetch_guid['name']; ?></p> -->
                <a href="addguid.php?delete=<?= $fetch_guid['id']; ?>" class="btn" onclick="return confirm('delete this guider?');">delete</a>
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
    
</body>
</html>