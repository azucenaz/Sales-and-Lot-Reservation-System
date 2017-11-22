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
  width: 1120,
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
               <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="payments.php">
                          <i class="icon-usd"></i>
                          <span>Payments</span>
                      </a>
                  </li>
                   <li>
                      <a class="" href="inquire.php">
                          <i class="icon-signin"></i>
                          <span>Inquire</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>Clients</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addclient.php">Add Client</a></li>
                          <li><a class="" href="listclient.php">List of Clients</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-user"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addusers.php">Add Users</a></li>
                          <li><a class="" href="listusers.php">List of Users</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_house_alt"></i>
                          <span>Estate</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addestate.php">Add Estate</a></li>
                          <li><a class="" href="listestate.php">List of Estate</a></li>
                      </ul>
                  </li>
                  
                 <li>
                      <a class="" href="transactions.php">
                          <i class="icon-list-alt"></i>
                          <span>Transactions</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="settings.php">
                          <i class="icon-wrench"></i>
                          <span>Settings</span>
                      </a>
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
           <section class="wrapper">
           <?php

           $getaccount = $dbConn->query("SELECT * FROM clients where client_id = '".$_GET['id']."' ");
           $disaccount = $getaccount->fetch(PDO::FETCH_ASSOC);

           ?>
              <!-- Form validations -->              
              <h1 style="font-family:Verdana;">Edit Client</h1>
              <?php 
              echo isset($_SESSION['message']) ? $_SESSION['message'] : ' ' ;
              unset($_SESSION['message']);?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Edit Clients
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="query/updateclients.php">
                                  <input  type="hidden" value="<?php echo $_GET['id'];?>" name="client_id">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">First name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control"  name="firstname" type="text" required value="<?php echo $disaccount['firstname']?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Middle Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="fullname" name="middlename" type="text" required value="<?php echo $disaccount['middlename']?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="lastname" name="lastname" type="text" required value="<?php echo $disaccount['lastname']?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="address" name="address" type="text" required value="<?php echo $disaccount['address']?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Contact <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="contact" name="contact" type="text" required value="<?php echo $disaccount['contact']?>"/>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <div class="col-lg-12">
                                               <textarea id="tinymce" name="details"><?php echo $disaccount['details']?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-3 col-lg-7">
                                              <input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="UPDATE">
                                              
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>

                
              </div>
                
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    
 

  </body>
</html>
