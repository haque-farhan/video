<?php
require_once 'inc-files.php';
require_once 'header.php';
require_once 'side.php';
require_once 'top.php';
$main= new main();




?>

<section id="main-content">
  <section class="wrapper">
  <h4 class="text-center" style="background: #e9534f;padding: 7px;color: #fff;font-size: 25px;"><b>Update Category List<b></h4>
   <div id="res"></div>

   <!-- BASIC FORM ELELEMNTS -->
   <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <?php
        $category_id=(int)$_GET['category_id'];
        $result= $main->readbycatname($category_id);


        ?>
        <form id="update">
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">CategoryName</label>
            <div class="col-sm-10">
              <input type="hidden" name="category_id" value="<?php echo $result->category_id; ?>" required="1"/>
              <input type="text" class="form-control" placeholder="" name="category_name" id="category_name" value="<?php echo $result->category_name; ?>" />
            </div>
          </div>
          <label class="col-sm-2 col-sm-2 control-label"><a href="category.php">Back</a></label>
          <button type="submit" class="btn btn-primary btn-block">update</button>
        </form>
      </div>
    </div><!-- col-lg-12-->      	
  </div><!-- /row -->


</section>      </section><!-- /MAIN CONTENT -->
<?php

require_once "footer.php";
?>
<script type="text/javascript">
  $(document).on('submit', '#update', function()
  {
    var data = $(this).serialize();
    $.ajax({

      type : 'POST',
      url  : 'ajax/ajax-updatecat.php',
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
