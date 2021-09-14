<?php 
require_once 'inc-files.php';
require_once "header.php";

$main = new main();
$catdetails = $main->allcategory();


?>
<body>
<?php
require_once "top.php";
require_once "side.php";

 ?>
   <section id="container" >
      <section id="main-content">
        <section class="wrapper">
          <h4 class="text-center" style="background: #e9534f;padding: 7px;color: #fff;font-size: 25px;"><b>   Category<b></h4>
        <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
                <h4>
                   Category Table <a data-toggle="modal" href="#addcat" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </h4>
                <section id="unseen">
                <div id="del"></div>
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                     <tr>
                      <th>Catagory id</th>
                      <th>Catagory name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($main->allcategory() as $value){

                      ?>
                      
                      <tr>
                        <td><?php echo $value->category_id; ?></td>
                        <td><?php echo $value->category_name; ?></td>
                      
                          <td>
                          <?php   echo "<a class='btn btn-primary' href='updatecat.php?category_id=".$value->category_id."'>Edit </a>";
                            ?>
                          </td>
                        <td>
                          <button id="<?php echo $value->category_id;?>" class="btn btn-danger remove"> Delete</button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </table>
              </section>

              <!-- Modal for insert new category -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addcat" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Add New Category</h4>
                    </div>

                    <form id="cat_input_form">
                      <div class="modal-body">
                        <input type="text" name="category_name" id="cat_input" placeholder="Category Name" class="form-control placeholder-no-fix">
                        <div id="sign"></div>
                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-theme"  type="submit">Submit</button>
                      </div>
                    </form>
                    <div id="signa"></div>
                  </div>
                </div>
              </div>
              <!-- modal -->
      <?php include "footer.php"; ?>

      <script>
    // Login script

    function s(){
      alert("ok");
      
    } 
    $(document).on('submit', '#cat_input_form', function()
    {       

      var data = $(this).serialize();
      $.ajax({

        type : 'POST',
        url  : 'ajax/ajax-cat-insert.php',
        data : data,

        success :  function(data)
        {            
          $("#sign").html(data).fadeIn('slow');
          $("#sign").show();
          setTimeout(function() { $("#sign").hide(); }, 2000);
          $("#sign").closest('form').find("input[type=text], textarea").val("");
        },
        error:function(){
                    // failed request; give feedback to user
                    alert("Something Went Wrong");
                  }    
                });
      return false;
    });
  </script>

  <script type="text/javascript">

     // block for removing video access
     $('button.remove').click(function(e) {
      e.preventDefault();
      var id=this.id;

      var tr     = $(this).closest('tr');
      var parent = $(this).parent();
      var msg='Are you sure you want to delete this category?';
      var sure=confirm(msg);
      if(!sure){
        return false;
      }
      $.ajax({
        type: 'post',
        url: 'ajax/ajax-delcategory.php',
        data: {
         ids:id
       },
       success: function(data) {
        $("#del").html(data).fadeIn('slow');
        $("#del").show();
        setTimeout(function() { $("#del").hide(); }, 2000);
       

        $('#div'+id).hide('slow',function(){
          $('#div'+id).remove();   
        });

        
        
      }
    });
    });
  </script>
  <script>
    $('#update').click(function(event){
      $.ajax({
        url:"";
        method:"POST",
        data:$('form').serialize(),
        datatype:'text',
        success:function(strMessage){
          $('#message').text(strMessage)
        }





      })




    })


  </script>



</body>
</html>