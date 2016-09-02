<?php
include 'koneksi.php';
	session_start();
	if((empty($_SESSION['id']))||($_SESSION['id']!='lctip2015')) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];



$sponsor="";
$daftar_Peserta="";
$rank="actives";
	?>
	
	

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCTIPIPB</title>

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

<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');" onload="window.print();">
	<!-- Modal -->

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            
                    <h4 class="text-center" style="margin-top: -100px;margin-bottom: 30px;">Daftar Peserta Lolos</h4>
      
     <table class="table table-bordered" style="width: 700px;style=;margin-left: -30px;margin-top:70px" >
              <thead>
                <tr style="font-size:12px">
                  <th>No</th>
                
                  <th>Username</th>
                  <th>Asal Sekolah</th>
                  
                 
                  <th>Jawaban Benar</th>
                  <th>Jawaban Salah</th>
                  <th>Jawaban kosong</th>
                  <th>Nilai</th>
				  
				  
                </tr>
              </thead>
              <tbody>
					<?php
$no=1;
$result = mysqli_query($con,"SELECT * FROM `peserta_score` JOIN `registration` WHERE `peserta_score`.username=`registration`.user ORDER BY score DESC,jumlah_benar DESC LIMIT 100") 
or die(mysqli_error());  


// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
$user=$row['username'];
?>
                <tr style="font-size:12px">
				  <td><?php echo $no++;?></td>
                 <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['asal_sekolah'];?></td>
                  
                 
			<td>
<?php
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$user';");
while($row1211 = mysqli_fetch_array($result1211)) {
if ($row1211){
echo "<h2>".$row1211['jumlah_benar']."</h2>";
}
else{?>
<?php
	}
		}			  
?>
				  </td>
				     <td>
<?php
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$user';");
while($row1211 = mysqli_fetch_array($result1211)) {
if ($row1211){
echo "<h2>".$row1211['jumlah_salah']."</h2>";
}
else{?>
<?php
	}
		}			  
?>
				  </td>
				     <td>
<?php
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$user';");
while($row1211 = mysqli_fetch_array($result1211)) {
if ($row1211){
echo "<h2>".$row1211['jumlah_seri']."</h2>";
}
else{?>
<?php
	}
		}			  
?>
				  </td>
				     <td>
<?php
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$user';");
while($row1211 = mysqli_fetch_array($result1211)) {
if ($row1211){
echo "<h2 style='color: #3498DB;'>".$row1211['score']."</h2>";
}
else{?>
<?php
	}
		}			  
?>
				  </td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
         
   

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