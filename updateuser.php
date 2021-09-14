<?php
require_once 'inc-files.php';
require_once 'header.php';
require_once 'side.php';
require_once 'top.php';
$main= new main();



?> 
<body>  
  <section id="main-content">
    <section class="wrapper">
     <h4 class="text-center" style="background: #e9534f;padding: 7px;margin-bottom: 20px;color: #fff;font-size: 25px;font-weight: 700;"><b>Update User List<b></h4>
     <div id="res"></div>

     <!-- BASIC FORM ELELEMNTS -->
     <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <?php
          $uid=(int)$_GET['uid'];
          $result= $main->readbyuserid($uid);
          ?>
          <form id="update">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">First Name</label>
              <div class="col-sm-10">
                <input type="hidden" name="uid" value="<?php echo $result->uid; ?>" required="1"/>
                <input type="text" class="form-control" placeholder="firstName" name="firstName" id="firstName" value="<?php echo $result->fname; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="lastName" name="lastName" id="lastName" value="<?php echo $result->lname; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Email address" name="email" id="email" value="<?php echo $result->email; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">join date</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="join date" name="jointdate" id="jointdate" value="<?php echo $result->joint_date; ?>" />
              </div>
            </div>
            <label class="col-sm-2 col-sm-2 control-label"><a href="totaluser.php">Back</a></label>


            <button type="submit" class="btn btn-primary btn-block">Update</button>
          </form>
        </div>
      </div><!-- col-lg-12-->      	
    </div><!-- /row -->

  <?php
  require_once "footer.php";
  ?>
  <script type="text/javascript">
    $(document).on('submit', '#update', function()
    {
      var data = $(this).serialize();
      $.ajax({

        type : 'POST',
        url  : 'ajax/ajax-updateInfo.php',
        data : data,

        success :  function(data)
        {           
          $("#res").html(data).fadeIn('slow');
          setTimeout(function() { $("#res").hide(); }, 2000);



        },

        error:function(){
                    // failed request; give feedback to user
                    alert("Something Went Wrong");
                  }    
                });
      return false;
    });
  </script>


</body>
</html>
