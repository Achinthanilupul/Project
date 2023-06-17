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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
  
   --boxx-shadow:0 .5rem 1rem rgba(0, 0, 0, 1);
   --text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);
}

*{
  
   box-sizing: border-boxx;
  
}
.ft{background-color: #46044F;}


.footer{
   background-size: cover;
   background-position: center;
}

.footer .boxx-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
   gap: 3rem;
}

.footer .boxx-container .boxx h3{
   color:white;
   font-size: 2.5rem;
   padding-bottom: 2rem;
}

.footer .boxx-container .boxx a{
   color:#fff9;
   font-size: 1.5rem;
   padding-bottom: 1.5rem;
   display: block;
}

.footer .boxx-container .boxx a i{
   color:var(--main-color);
   padding-right: .5rem;
   transition: .2s linear;
}

.footer .boxx-container .boxx a:hover i{
   padding-right: 2rem;
}

.footer .credit{
   text-align: center;
   padding-top: 3rem;
   margin-top: 3rem;
   border-top: .1rem solid var(--light-white);
   font-size: 2rem;
   color:var(--white);
}

.footer .credit span{
   color:var(--main-color);
}
</style>
<body class>
   
<div class="ft">
<!-- footer section starts  -->

<section class="footer">

   <div class="boxx-container">

      <div class="boxx">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

      <div class="boxx">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="boxx">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 0777777777 </a>
         <a href="#"> <i class="fas fa-phone"></i> 0778888888 </a>
         <a href="#"> <i class="fas fa-envelope"></i> singhetravel@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> kandy </a>
      </div>

      <div class="boxx">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>ICBT 54 GROUP 2</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->
</div>
</body>
</html>
