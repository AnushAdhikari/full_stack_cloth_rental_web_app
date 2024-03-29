<?php  session_start(); 
include 'mainheader.php' ?>





<!-- ======================================== START PRODUCTS SLIDE  ================================================-->

<div class="swiper-container mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div>
                <img src="images/101.jpg" alt=""/>
               <!--  <iframe width="560" height="315" src="https://www.youtube.com/embed/niqf-vutX5Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                
                <div class="slide-content-wrapper"> 
                    <h1 style="font-size: 30px">Rent The Cloth Of your Choice</h1>
                    <div class="button-wrapper">

            <button type="button" class="womenbtn" ><a href="formen.php" style="text-decoration:none; color:black; ">Men's</a></button>
            
            
            <button type="button" class="menbtn" ><a href="forwomen.php" style="text-decoration:none; color:black; ">Women's</a></button>
                
        </div>
        </div>
            </div>
        
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<!-- ======================================== END PRODUCTS SLIDE ============================= -->






<!--========================== START DESCRIPTION OF COLLECTION ======================-->
<div class="description_products">
<h1>COLLECTION</h1>
<p>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
</p>
<a href="index.php">
    Cloth Rental
</a>
</div>


<!-- ======================= START CATEGORIE ======================= -->
    <div class="images">
      <h2>Clothes For</h2>
      <div class="images-container container">
        <div class="images-type women">
          <div class="img-container">
            <img src="images/womenstreet.jpg" alt="" />

            <div class="img-content">
            
              <a
                href="forwomen.php"
                class="btn btn-primary"
                t
                >Women's
              </a>
              
            </div>
          </div>
        </div>
        <div class="images-type">
          <div class="img-container men">
            <a href="formen.php"><img src="images/menstreet.jpg" alt="" /></a>
            <div class="img-content">
              <a href="formen.php" class="btn btn-primary">Men's</a>
              </div>
          </div>
        </div>
      </div>
  </div>

 <!--========================== START sneaker ======================-->
    
    <div class="container sneaker">
        <div class="sneaker-image">
            <img src="images/sneakers.jpg" alt="" />
        </div>
        <div class="sneaker_text">
            <h1>
                Sneakers
            </h1>
            <p>
                Original And High Copy Sneakers available To be Rented in good conditions for both men and women
            </p>
            <div class="menandwomen_sneaker_wrap">
                <a href="category.php?tag=sneakers&product_type=men" class="men_sneaker_btn"><button>Rent Sneakers for men</button></a>
                <a href="category.php?tag=sneakers&product_type=women" class="women_sneaker_btn"><button>Rent Sneakers for Women</button></a>
            </div>

        </div>
    </div>

    <!--========================== END Sneaker ======================-->




<!-- =================================---------------------------------===================== -->



       <!-- =========================================================== -->
        <div class="container bridegroom">
            <div class="bridegroom-image">
                <img src="images/bridegroom.jpg" alt="" />
            </div>
            <div class="bridegroom_text">
                <h1>
                    Weeding Dress for Bride and Groom
                </h1>
                <p>
                    Weeding Dress for both Bride and Groom are available to be rented
                </p>
                <div class="bridegroom_btn">
                <a href="category.php?tag=weedingdress&product_type=women" class="bride_btn"><button>Rent clothes for Bride</button></a>
                <a href="category.php?tag=weedingdress&product_type=men" class="groom_btn"><button>Rent clothes for Groom</button></a>
                </div>
            </div>
        </div>

    
<!--========================== START FOOTER =================-->
<?php 
include 'footer.php';
?>
<!--========================== END FOOTER =================-->








    <!-- STATIC JS FILES --> 
<script src="scripts/navbar.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="scripts/swiper.js"></script>


</body>
</html>