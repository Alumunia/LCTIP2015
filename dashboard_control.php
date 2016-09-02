<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];

$sponsor="";
$soal="";
$daftar_Peserta="";
$control="actives";

########################################################################PENGUMUMAN#######################################################

if (isset($_GET['dorm12345'])){
mysqli_query($con,"INSERT INTO announcement VALUES('','1')");


?>

<script>
		alert('Announcement Success');
        document.location.href='dashboard_control.php';
</script>



<?php
}



########################################################################FETCH FUNGSI#######################################################

$fungsi=mysqli_query($con,"SELECT * FROM fungsi ORDER BY id DESC LIMIT 1");

$fungsi = mysqli_fetch_array($fungsi);
$fungsi_1=$fungsi['allowing'];
###############################################
$temp=mysqli_query($con,"SELECT * FROM temp ORDER BY id DESC LIMIT 1");

$temp = mysqli_fetch_array($temp);
$temp_1=$temp['temp'];




###########################################################quiz access#####################################################
if (isset($_GET['dorm12'])){
mysqli_query($con,"INSERT INTO temp VALUES('','0')");
mysqli_query($con,"update registration set quiz_ticket=0 WHERE status=1");

?>

<script>
		alert('Open Quiz Access Success');
        document.location.href='dashboard_control.php';
</script>



<?php
}
else if (isset($_GET['room12'])){
mysqli_query($con,"INSERT INTO temp VALUES('','1')");
mysqli_query($con,"update registration set quiz_ticket=1");

?>
<script>
		alert('Closed Quiz Access Success');
        document.location.href='dashboard_control.php';
</script>
<?php


}

###########################################################Daily access#####################################################
if (isset($_GET['dorm123'])){


mysqli_query($con,"INSERT INTO fungsi VALUES('','0')");
?>

<script>
		alert('Success');
        document.location.href='dashboard_control.php';
</script>



<?php
}
else if (isset($_GET['room123'])){

mysqli_query($con,"INSERT INTO fungsi VALUES('','1')");

?>
<script>
		alert('Success');
        document.location.href='dashboard_control.php';
</script>
<?php


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
"advlist autolink lists link image charmap print preview anchor",
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
<style>
.center {
    margin: auto;
    width: 60%;
 
    padding: 10px;
}
</style>
<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');">

<?php

include('layout/nav_1.php');

?>

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            
                    <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Control Room</h2>
          <hr class="star-primary">

<div class="row">
<div class="col-md-4 ">
<h4 class="center">Quiz Access</h4>
<br>
<br>
 <div class="col-md-6">
   <form>
   <input type="submit" class="btn btn-info" name="dorm12" value="START" />
   </form>
</div>
 <div class="col-md-6 ">
    <form>
   <input type="submit" class="btn btn-danger" name="room12" value="STOP" />
   </form>
</div>
<div style="padding-top:90px;">
   <h2 >status:<?php if ($temp_1==0){echo "OPEN";}else{echo "CLOSED";}?></h2>
</div>
</div>
<div class="col-md-4"></div>
<div class="col-md-4 ">
<h4 class="center">daily Access</h4>
<br>
<br>
 <div class="col-md-6 ">
   <form>
   <input type="submit" class="btn btn-info" name="dorm123" value="BEGIN" />
   </form>
</div>
 <div class="col-md-6">
    <form>
   <input type="submit" class="btn btn-danger" name="room123" value="END" />
   </form>
</div>
<div style="padding-top:90px;">
   <h2 >status:<?php if ($fungsi_1==0){echo "OPEN";}else{echo "CLOSED";}?></h2>
</div>
</div>

</div><br>
<div class="col-md-5"></div>
<div class="col-md-7">
<h4 style="margin-left:-50px">Announcement Control</h4>
<br>
   <form>
   <input type="submit" class="btn btn-success btn-lg" name="dorm12345" value="Announce!" />
   </form>

</div>

</div>

 </section>
 </div>
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