<?php
include ('../koneksi.php');

session_start();
date_default_timezone_set('Asia/Jakarta');
if(empty($_SESSION['id'])){
}
else{
$id=$_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCT</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');">

 <?php
 
 include('layout/nav.php');

 
 
 ?>

    <!-- Header -->
	

   

    <!-- Contact Section -->
    <section id="contact" style="padding-top:130px">
        <div class="container">
		<?php if (isset($_GET['success'])){?>
		<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thanks For Registration  </strong> Now you have to wait untill our team validate your registration form :)
		</div>
		<?php } else if (isset($_GET['error'])){?>
		<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Sorry </strong> But your account is not validate yet
		</div>
		
		<?php } else if (isset($_GET['error'])){?>
		<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Ooopss</strong> You not registration yet
		</div>
		
		<?php }?>
            <div class="row">
                <div class="col-lg-8 text-center">
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/Lt0WP9ZBNiY" frameborder="0" allowfullscreen></iframe>
                </div>
				
				 <div class="col-lg-4 text-center">
                  <div class="col-lg-8 col-lg-offset-2" style="BACKGROUND-COLOR: WHITE";>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form role="form" method="post" enctype="multipart/form-data" action="process/form_input_1.php" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Username</label>
                                <input type="text" class="form-control" required placeholder="Username" name="user" required data-validation-required-message="silahkan masukkan username"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>password</label>
                                <input type="text" class="form-control" placeholder="Password" name="pass" required data-validation-required-message="silahkan masukkan login">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                      
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
			   
          
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-2">
                        <h3>Location</h3>
                        
                    </div>
                    <div class="footer-col col-md-2">
                         <h3>Location</h3>
                      
                    </div>
                    <div class="footer-col col-md-2">
             <h3>Location</h3>
                      
				   </div>
				     <div class="footer-col col-md-2">
             <h3>Location</h3>
                          
				   </div>
				     <div class="footer-col col-md-2">
             <h3>Location</h3>
                           
				   </div>
				     <div class="footer-col col-md-2">
             <h3>Location</h3>
                          
				   </div>
                </div>
            </div>
        </div>
     
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
 <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
