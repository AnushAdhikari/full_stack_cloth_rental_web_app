<?php include('adminnavbar.php');
   include('connection.php');
    ?>
<div class="container adminhomepage">
   <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
         <div class="container-fluid adminhome-wrap">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <section style="width: 100%; ">
                  <div class="jumbotron jumbotron-fluid">
                     <div class="container admin--wrap">
                        <h1 class="display-4 welcome-wrap">Welcome <span class="admincolor"> <?php 
                           echo $_SESSION['adminloginId'];
                           ?></span></h1>
                        <p class="lead">Here your can <span class="catadd">add categories</span>, <span class="prodadd">add products</span>, <span class="ed&dlt">edit and delete both categories and products</span>.</p>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
      <div class="card text-white bg-success mb-3 total_users_wrapper" style="max-width: 18rem;">
         <div class="card-header total_users">Total Number of Users</div> 
         <div class="card-body">
            <p class="card-text">
                <?php

               $query = "SELECT id from users ORDER BY id";
               $query_run = mysqli_query ($con, $query);
               
               $row = mysqli_num_rows($query_run);
               
               echo '<h1> '.$row.' </h1>'
               
               ?>
                   
               </p>
         </div>
      </div>
   </div>
</div>
