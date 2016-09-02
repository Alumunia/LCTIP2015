<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];
	if (isset($_GET['approve'])){
$app=$_GET['approve'];
mysqli_query($con,"UPDATE registration SET status=1 WHERE id = $app");
}
else if (isset($_GET['delete'])){
$del2=$_GET['delete'];
mysqli_query($con,"DELETE FROM `registration` WHERE id= $del2");

}

else{};

$sponsor="actives";
$daftar_Peserta="";
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

<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');">
<?php

include('layout/nav_1.php');

?>

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            
                    <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Daftar Sponsor</h2>
          <hr class="star-primary">
   <div class="row">
   
			<?php
			
$no=1;
$value=1;
$number=1;
$result = mysqli_query($con,"SELECT * FROM sponsor") 
or die(mysqli_error());  


// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
  
?>
           
   <!---IKLAN 1---->
         <div class="col-md-2">
		 <h3>Sponsor <?php echo $no;?></h3>
         <form action="process/saveimage_process.php" enctype="multipart/form-data" method="post">
		 	<label >Link</label>
			
			<input type="text" name="link"   class="form-control" placeholder="<?php echo  substr($row['link'],8);?>" required>
			<br>
			<input type="hidden" name="number" value="<?php echo $value++?>"   class="form-control" placeholder="Link">
			<?php
			$query=mysqli_query($con,"SELECT * FROM sponsor WHERE number=$no")
			or die(mysqli_error());
			while($row = mysqli_fetch_assoc($query)){
			?>
			<div class="form-group">
			<img width="200px" src="process/<?php echo $row['images_path'];?>" alt="..." height="150px" width="80px" class="img-rounded">
		
			<?php } ?>                     
					<input type="file" required name="uploadedimage" id="exampleInputFile">
                  
					<input class="btn btn-primary" name="Upload Now" type="submit" value="Upload Image">
					</div>
					</form>
					</div>
	<!--------THE END OF IKLAN 1---->
<?php $no++;}  ?>

	

	
					</div>
	<!-- Modal -->

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
<script>
	$('#myModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var recipient = button.data('whatever')
	  var recipient12 = button.data('whatever12')
	  var modal = $(this)
	  modal.find('.modal-body p strong').text(recipient)
	  modal.find('.modal-footer form input').val(recipient12)
	})    
	</script>
</body>

</html>