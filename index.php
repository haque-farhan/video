<?php 
require_once 'inc-files.php';




$main = new main();
$userlist = $main->totaluser();  
$pendinglist = $main->totalpendingusers();
$pendinglist = $main->totalpendingusers();
$catNum = $main->catNum();
$videototal = $main->videototal();
$pendingvideo = $main->totalpendingvideo();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Admin Panel</title>
  <style type="text/css">
    .wid{padding-top: 42px;
      font-size: 65px;
      color: crimson;}

    </style>
    <!-- Header start -->
    <?php include "header.php"; ?>
    <!-- Header end -->


    <!--top-menu start-->
    <?php include "top.php"; ?>
    <!--top-menu end-->


    <!--sidebar start-->
    <?php include "side.php"; ?>
    <!--sidebar end-->
    <body>

      <section id="container" >      
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">

            <div class="row">
              <div class="col-lg-12 main-chart">

                <div class="row mt">
                  <!-- SERVER STATUS PANELS -->
                  <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn donut-chart">
                     <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
                       <h5>Total Users</h5>
                     </div>
                     <h1 class="text-center wid"><?php echo $userlist->totaluser; ?></h1>
                     <a href="totaluser.php">See All users</a>
                   </div>
                 </div>

                 <div class="col-md-4 col-sm-4 mb">
                  <div class="white-panel pn donut-chart">
                    <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
                     <h5>Pending User</h5>
                   </div>
                   <h1 class="text-center wid"><?php echo $pendinglist->totalpendingusers; ?></h1>
                   <a href="Pendinguser.php">See All Pending User</a>
                 </div>
               </div><!-- /col-md-4-->

               <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn donut-chart">
                  <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
                   <h5>No of Category</h5>
                 </div>
                 <h1 class="text-center wid"><?php echo $catNum->totalcat; ?></h1>
                 <a href="category.php">See All Category</a>
               </div>
             </div><!-- /col-md-4-->

             <div class="col-md-4 col-sm-4 mb">
              <div class="white-panel pn donut-chart">
                <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
                 <h5>Total Video</h5>
               </div>
               <h1 class="text-center wid"><?php echo $videototal->videototal; ?></h1>
               <a href="video.php">See All Video</a>
             </div>
           </div><!-- /col-md-4-->

           <div class="col-md-4 col-sm-4 mb">
            <div class="white-panel pn donut-chart">
              <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
               <h5>Pending Video</h5>
             </div>
             <h1 class="text-center wid"><?php echo $pendingvideo->pendingvideo; ?></h1>
             <a href="pending_video.php">See All Pending Video</a>
           </div>
         </div><!-- /col-md-4-->

         <div class="col-md-4 col-sm-4 mb">
          <div class="white-panel pn donut-chart">
            <div class="white-header w" style="background: #428bca;padding: 3px;margin-bottom: 15px;color: #fff;font-size: 29px;font-weight: 800;">
             <h5>No of Location</h5>
           </div>
           <h1 class="text-center wid">08</h1>
           <a href="index.php">See All users</a>
         </div>
       </div><!-- /col-md-4-->

     </div><!-- /row -->
   </div><!-- /col-lg-12 END SECTION MIDDLE -->
 </section>
</section>
</section>
<!--main content end-->

<!-- Footer start -->
<?php include "footer.php"; ?>
<!-- Footer end -->
