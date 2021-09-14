   <?php 
   require_once "header.php";
   require_once 'inc-files.php';


   $main=new main();

   ?>
   <body>

    <?php
    require_once "top.php";
    require_once "side.php";

    ?>
    <section id="container" >
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
         <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
               <h4 class="text-center" style="background: #e9534f;padding: 7px;color: #fff;font-size: 25px;"><b>Pending Video List<b></h4> 
               <hr>
               <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Title</th>
                  <th>Upload Time</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
               foreach ($main->pendingvideo() as $value){

                ?>
                <tr>
                  <td><?php echo $value->vid; ?></td>
                  <td><?php echo $value->vname; ?></td>
                  <td><?php echo $value->up_time; ?></td>
                  <td><?php echo $value->category; ?></td>
                  <td>
                    <button class="btn btn-round btn-success">Approved</button>
                    <button class="btn btn-round btn-danger">Not Approved</button>
                  </td>
                </tr>  
                <?php } ?>      
              </tbody>
            </table>
          </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
      </div><!-- /row -->

    </section>
  </section><!-- /MAIN CONTENT -->

  <?php require_once "footer.php";  ?>
</body>
</html>
