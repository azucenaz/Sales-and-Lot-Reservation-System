<?php
session_start();
include 'connection.php';
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Karmanta - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Karmanta, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sales And Lot Monitoring System</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
  selector: "#tinymce",
  theme : "modern",
  width: 530,
  height: 300,
  relative_urls:false,
  document_base_url:"http://localhost/simple_cms",
  menubar: "edit view insert format table tools",
  plugins: [
         "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons template paste textcolor"
   ],
  
   toolbar: "styleselect | bold italic | forecolor backcolor emoticons | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo |  link image | print media preview fullpage ", 
   file_browser_callback: RoxyFileBrowser 
  });
 
 function RoxyFileBrowser(field_name, url, type, win) {
  var roxyFileman = 'http://localhost/allan/fileman/index.html';
  if (roxyFileman.indexOf("?") < 0) {     
    roxyFileman += "?type=" + type;   
  }
  else {
    roxyFileman += "&type=" + type;
  }
  roxyFileman += '&input=' + field_name + '&value=' + document.getElementById(field_name).value;
  if(tinyMCE.activeEditor.settings.language){
    roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
  }
  tinyMCE.activeEditor.windowManager.open({
     file: roxyFileman,
     title: 'File Manager',
     width: 1200, 
     height: 800,
     resizable: "yes",
     plugins: "media",
     inline: "yes",
     close_previous: "no"  
  }, {     window: win,     input: field_name    });
  return false; 
} 
  
</script>
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">SALMS</a>
            <!--logo end-->

        <?php

            include 'header.php';

            ?>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
             <?php

             switch ($_SESSION['type']) 
             {
               case 'default':
                 include 'admin.php';
                 break;
               case 'admin':
                 include 'admin.php';
                break;
                case 'cashier':
                include 'cashier.php';
                break;
                case 'agent':
                  include 'agent.php';
                  break;
                 
               default:
                 include 'login.php';
                 break;
             }

             ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
           <section class="wrapper">
              <!-- page start-->
              <h1 style="font-family:Verdana;">List of Users</h1>

              <div class="row">
              <?php echo isset($_SESSION['message']) ? $_SESSION['message'] : '' ;
              unset($_SESSION['message']);
              ?>
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Users <button class="btn btn-success pull-right" data-toggle="modal" data-target="#addusers">ADD USERS</button>
                          </header>
                           <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addusers" class="modal fade">   
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                                              <h4 class="modal-title">Add Users</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="query/addusers.php" method="post">
                                              <input type="hidden" value="<?php echo $disclients['user_id'];?>" name="user_id">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Username</label>
                                                      <input type="text" name="username" class="form-control" id="exampleInputEmail3" >
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Firstname</label>
                                                      <input type="text" name="firstname" class="form-control" id="exampleInputEmail3" >
                                                  </div> <div class="form-group">
                                                      <label for="exampleInputEmail1">Middlename</label>
                                                      <input type="text" name="middlename" class="form-control" id="exampleInputEmail3" >
                                                  </div> <div class="form-group">
                                                      <label for="exampleInputEmail1">Lastname</label>
                                                      <input type="text" name="lastname" class="form-control" id="exampleInputEmail3" >
                                                  </div>
                                                 
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Password</label>
                                                      <input  type="password" class="form-control" name="password" id="exampleInputEmail3" >
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Re Password</label>
                                                      <input type="repassword" class="form-control" id="exampleInputEmail3" name="repassword">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Contact</label>
                                                      <input name="contact" type="text" class="form-control" id="exampleInputEmail3" >
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Address</label>
                                                      <input type="text" required class="form-control" id="exampleInputEmail3" name="address" >
                                                  </div>
                                                     <div class="form-group">
                                                      <label for="exampleInputEmail1">Account Type</label>
                                                      <select class="form-control" name="type">
                                                        <option value="">CHOOSE</option>
                                                        <option value="cashier">Cashier</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="agent">Agent</option>
                                                      </select>
                                                  </div>
                                                 
                                                  <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <table class="table table-striped border-top" id="sample_1">
  <thead>
    <tr>
      <th>Username</th>
      <th>Name</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Status</th>
      <th>Action(S)</th>
    </tr>
  </thead>
  <tbody>  
      <?php 
        $getclients = $dbConn->query("SELECT * FROM users where type != 'default'");
        while($disclients = $getclients->fetch(PDO::FETCH_ASSOC))
        {

      ?>
    <tr class="odd gradeX">
      <td><?php echo $disclients['username'];?></td>
      <td><?php echo $disclients['firstname'].' '.$disclients['middlename'].' '.$disclients['lastname'];?></td>
      <td><?php echo $disclients['contact'];?></td>
      <td><?php echo $disclients['address'];?></td>
      <td>
      <?php 

      if ($disclients['status'] == 'active' ) 
      {
        echo '<span class="label label-success">ACTIVE</span>';
      }
      else
      {
        echo '<span class="label label-danger">NOT ACTIVE</span>';
      }

      ?></td>
      <td><button class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $disclients['user_id'];?>"><label class="icon-pencil"></label></button></td>
    </tr>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="<?php echo $disclients['user_id'];?>" class="modal fade">   
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                                              <h4 class="modal-title">Edit Users</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="query/updateusers.php" method="post">
                                              <input type="hidden" value="<?php echo $disclients['user_id'];?>" name="user_id">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Username</label>
                                                      <input readonly type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disclients['username'];?>" name="username">
                                                  </div>
                                                     <div class="form-group">
                                                      <label for="exampleInputEmail1">Firstname</label>
                                                      <input  type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disclients['firstname'];?>" name="firstname">
                                                  </div>
                                                     <div class="form-group">
                                                      <label for="exampleInputEmail1">Middlename</label>
                                                      <input  type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disclients['middlename'];?>" name="middlename">
                                                  </div>   <div class="form-group">
                                                      <label for="exampleInputEmail1">Lastname</label>
                                                      <input  type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disclients['lastname'];?>" name="lastname">
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Password</label>
                                                      <input  type="password" class="form-control" name="password" id="exampleInputEmail3" value="<?php echo $disclients['password'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Re Password</label>
                                                      <input type="password" class="form-control" id="exampleInputEmail3" name="repassword" value="<?php echo $disclients['password'];?>">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Contact</label>
                                                      <input name="contact" type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disclients['contact']?>" name="contact">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Address</label>
                                                      <input type="text" required class="form-control" id="exampleInputEmail3" name="address" value="<?php echo $disclients['address']; ?>">
                                                  </div>

                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Type</label>
                                                      <select class="form-control" name="type">
                                                        <option value="">Please Choose</option>
                                                        <option value="admin" <?php if($disclients['type'] == 'admin'){ echo 'selected';} ?>>Admin</option>
                                                        <option value="cashier" <?php if($disclients['type'] == 'cashier'){ echo 'selected';} ?>>Cashier</option>
                                                        <option value="agent" <?php if($disclients['type'] == 'agent'){ echo 'selected';} ?>>Agent</option>
                                                      </select>
                                                  </div>

                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Status</label>
                                                      <select class="form-control" name="status">
                                                        <option value="">Please Choose</option>
                                                        <option value="active" <?php if($disclients['status'] == 'active'){ echo 'selected';};?>>Active</option>
                                                        <option value="not active" <?php if($disclients['status'] == 'not active'){ echo 'selected';};?>>Not Active</option>
                                                        
                                                      </select>
                                                  </div>
                                                  
                                                  
                                                 
                                                  <button type="submit" class="btn btn-success btn-block" name="submit">UPDATE</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
    <?php } ?>
    
  </tbody>
</table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
   <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <!-- data tables js -->
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <!-- dynamic table cuatom script for this page only-->
    <script src="js/dynamic-table.js"></script>
  
 

  </body>
</html>
