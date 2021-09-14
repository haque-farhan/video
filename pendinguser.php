<?php 
require_once 'inc-files.php';
 require_once "header.php";
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
                     <h4 class="text-center" style="background: #e9534f;padding: 7px;color: #fff;font-size: 25px;"><b>Pending User List<b></h4>
                     <hr>
                     <thead>
                      <tr>
                        <th>SL.</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Apply date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     foreach ($main->pendinguser() as $value){

                      ?>
                      <tr>
                      <td><?php echo $value->uid; ?></td>
                        <td><?php echo $value->fname; ?></td>
                        <td><?php echo $value->lname; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->joint_date; ?></td>
                        <td>
                          <button class="btn btn-round btn-primary">Approved</button>
                          <button class="btn btn-round btn-danger">Cancel</button>
                        </td>
                        <?php } ?>  

                      </tr>     
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
