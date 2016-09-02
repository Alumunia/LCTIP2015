<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];

$sponsor="";
$soal="actives";
$daftar_Peserta="";


if (isset($_POST['submit'])){




}
else{

}


?>


<!DOCTYPE html>
<html lang="en">

<head>


    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

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
<script type="text/javascript" src="assets/dist/tinymce/js/tinymce/tinymce.min.js"></script>
	
<script type="text/javascript">

tinymce.init({
selector: "textarea",
// ===========================================
// INCLUDE THE PLUGIN
// ===========================================
plugins: [
"advlist autolink lists link charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],
// ===========================================
// PUT PLUGIN'S BUTTON on the toolbar
// ===========================================
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false
});

</script>
<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');">

<?php

include('layout/nav_1.php');

?>

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            
                    <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Add Quiz</h2>
          <hr class="star-primary">
            <div class="row">
	  <form method="post"  action="dashboard_soal_add_form.php"  >
      
                            <div class="form-group controls">
                                <label>Question</label>
                               
								<textarea type="text"  rows="9" name="question" required class="form-control" placeholder="Question"> Your Text Here...</textarea>

                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Answer</label>
								<textarea type="text"  rows="9" placeholder="answer" name="answer" required > Your Text Here...</textarea>
                               
                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Wrong Choice 1</label>
								<textarea type="text"  rows="9" placeholder="Wrong_choice_1" name="wrong_choice_1" required> Your Text Here...</textarea>
                               
                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Wrong Choice 2</label>
								<textarea type="text"  rows="9"  placeholder="Wrong_choice_2" name="wrong_choice_2" required > Your Text Here...</textarea>
                             
                                <p class="help-block text-danger"></p>
                            </div>  
							<div class="form-group controls">
                                <label>Wrong Choice 3</label>
								<textarea type="text"  rows="9"  placeholder="Wrong_choice_3" name="wrong_choice_3" required  > Your Text Here...</textarea>
                               
                                <p class="help-block text-danger"></p>
                            </div>  
							<div class="form-group controls">
                                <label>Wrong Choice 4</label>
									<textarea type="text"  rows="9"  placeholder="Wrong_choice_4" name="wrong_choice_4" required  > Your Text Here...</textarea>
                               
                              
                                <p class="help-block text-danger"></p>
                            </div>
						
							
                      
                        <div class="row">
                            <div class="form-group ">
                               <button style="border-radius: 0px; background-color: rgb(42, 202, 226); border-color: rgb(42, 202, 226);WIDTH:100%" value="submit" name="submit" type="submit" class="btn btn-info pull-right">SUBMIT</button>
                            </div>
                        </div>
                    </form>
	

			</div>
 </section>
 </div>
    <!-- Portfolio Grid Section -->
    
  
   

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