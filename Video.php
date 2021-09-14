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
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row mt">
        <div class="col-md-12">
          <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
             <h4 class="text-center" style="background: #e9534f;padding: 7px;color: #fff;font-size: 25px;"><b>Total Video List<b></h4>               
             <hr>
             <div id="sign"></div>
             <thead>
              <tr>
                <th>vid</th>
                <th>Video name</th>
                <th>Video subscription</th>
                <th>views</th>
                <th>up_time</th>
                <th>Video type</th>
                <th>Category</th>
                <th>Current Status</th>
                <th>Change Status</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
             <?php
             foreach ($main->allvideo() as $value){
                //for active /inactive
              if ($value->status == 1) {
                $class = 'btn-success';
                $msg = 'active';
                $a='btn-danger';
                $b='Not activate';

              }

              else if ($value->status == 2) {
                $class = 'btn-danger';
                $msg = 'Not activate';
                $a='btn-success';
                $b='activate';
              }
              

              ?>

              <tr>
                <td><?php echo $value->vid; ?></td>
                <td><?php echo $value->vname; ?></td>
                <td><?php echo $value->vdescription; ?></td>
                <td><?php echo $value->views; ?></td>
                <td><?php echo $value->up_time; ?></td>
                <td><?php echo $value->vtype; ?></td>
                <td><?php echo $value->category; ?></td>
                <td><button class='btn <?php echo $class; ?>'><?php echo $msg; ?></button></td>
                <td><button class='btn <?php echo $a; ?>'><?php echo $b; ?></button></td>
                <td> <button id="<?php echo $value->vid;?>" class="btn btn-danger remove"> Delete</button></td>
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

<script type="text/javascript">

     // block for removing video access
     $('button.remove').click(function(e) {
      e.preventDefault();
      var id=this.id;

      var tr     = $(this).closest('tr');
      var parent = $(this).parent();
      var msg='Are you sure you want to delete this Video?';
      var sure=confirm(msg);
      if(!sure){
        return false;
      }
      $.ajax({
        type: 'post',
        url: 'ajax/ajax-delvideo.php',
        data: {
         ids:id
       },
       success: function(data) {
        $("#sign").html(data).fadeIn('slow');
        $("#sign").show();
        setTimeout(function() { $("#sign").hide(); }, 2000);
        $('#div'+id).hide('slow',function(){
          $('#div'+id).remove();   
        });    
      }
    });
    });
  </script>
</body>
</html>
