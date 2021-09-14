 <?php 
require_once "header.php";
 require_once 'inc-files.php';


 $main=new main();
 $users=$main->alluser();

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
                <div id="sign"></div>
                <h4 class="text-center" style="background: #853b8a;padding: 8px;color: #fff;font-size: 25px;"><b>Total User List<b></h4>
                <hr>
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>                 
                    <th>Joining Date</th>
                    <th>Status</th>
                    <th>Update Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 foreach ($users as $value){

                //for active /inactive
                  if ($value->status > 0) {
                    $class = 'btn-success';
                    $msg = 'active';
                    $a = 'btn-danger';
                    $b = 'Not activate';
                  }else{
                    $class = 'btn-danger';
                    $msg = 'Not activate';
                    $a = 'btn-success';
                    $b = 'active';
                  }



                  ?>
                  <tr>
                    <td><?php echo $value->uid; ?></td>
                    <td><?php echo $value->fname; ?></td>
                    <td><?php echo $value->lname; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->joint_date; ?></td>
                    <td>
                      <button  class='btn <?php echo $class; ?>'><?php echo $msg; ?></button>
                    </td>
                    <td>
                      <button class='btn <?php echo $a; ?>'><?php echo $b; ?></button>
                    </td>
                    <td>
                     <?php 
                   //update userlist
                     echo "<a class='btn btn-primary' href='updateuser.php?uid=".$value->uid."'>Edit </a>";
                     ?>
                        <button id="<?php echo $value->uid;?>" class="btn btn-danger remove">Delete</button>
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

   <script type="text/javascript">
     $('button.remove').click(function(e) {
      e.preventDefault();
      var id=this.id;

      var tr     = $(this).closest('tr');
      var parent = $(this).parent();
      var msg='Are you sure you want to delete this user?';
      var sure=confirm(msg);
      if(!sure){
        return false;
      }
      $.ajax({
        type: 'post',
        url: 'ajax/ajax-deleteuser.php',
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
