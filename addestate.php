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
   
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
      <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
  selector: "#tinymce",
  theme : "modern",
  width: 700,
  height: 100,
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
              <!-- Form validations -->              
              <h1 style="font-family:Verdana;">Add Estate</h1>
                <?php 
              echo isset($_SESSION['message']) ? $_SESSION['message'] : ' ' ;
              unset($_SESSION['message']);?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Add Lot
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="query/executelotno.php">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Lot No <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <input class=" form-control"  name="lotno" type="text" required/>

                                          </div>
                                          <div class="col-lg-5">
                                              <input name="submit" class="btn btn-primary" type="submit" value="ADD LOT NO">
                                              
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>

              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Add Block
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal "  method="post" action="query/executeblockno.php">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Block No <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              
                                              <select class="form-control" name="lotno" required>
                                                <option value="">Choose Lot</option>
                                                <?php
                                                $getlot = $dbConn->query("SELECT * FROM lot");
                                                while($dislot = $getlot->fetch(PDO::FETCH_ASSOC))
                                                {

                                                ?>
                                                <option value="<?php echo $dislot['lot_no'];?>"><?php echo $dislot['lot_no'];?></option>
                                                <?php }?>
                                              </select>

                                          </div>
                                          <div class="col-lg-3">
                                              
                                             <input type="text" class="form-control" name="blockno" required placeholder="Input Block No">
                                          </div>

                                       <!--    <div class="col-lg-4">
                                              <input name="submit" class="btn btn-primary" type="submit" value="ADD BLOCK NO">
                                              
                                          </div> -->

                                      </div>
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Pricing <span class="required">*</span></label>
                                          <div class="col-lg-3">
                                              
                                             <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="12000.00" required >

                                          </div>
                                          <div class="col-lg-3">
                                              
                                             <input type="number" step="0.01" class="form-control" id="downpayment" name="downpayment" required placeholder="Input Downpayment">
                                          </div>
                                          
                                      

                                      </div>
                                      <div class="form-group ">
                                        <label for="fullname" class="control-label col-lg-2">Description <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                               <textarea id="tinymce" name="details"></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                            <div class="col-lg-offset-5 col-lg-5 ">
                                              <input name="submit" class="btn btn-primary" type="submit" value="ADD BLOCK NO">
                                              
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
    <script>
    $(document).ready(function()
    {

      $("#price").change( function()
      {
       $("#downpayment").val("");
      });

       $("#downpayment").change( function()
      {
        var price = $("#price").val();
        var downpayment = $(this).val();
        if (parseFloat(price) < parseFloat(downpayment)) 
          {
            alert("Downpayment is greather than price");
            $(this).val("");
            $(this).focus();
          };
      });

     


    });
    </script>

  </body>
</html>
