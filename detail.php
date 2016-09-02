<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];
	if (isset($_GET['approve'])){
$app=$_GET['approve'];
mysqli_query($con,"UPDATE registration SET status=1 WHERE id = '$app'");
}
else if (isset($_GET['delete'])){
$del2=$_GET['delete'];
mysqli_query($con,"DELETE FROM `registration` WHERE id= $del2");

}
else if (isset($_GET['cancel'])){
$app1=$_GET['cancel'];
mysqli_query($con,"UPDATE registration SET status=0 WHERE id = '$app1'");

}
else{};

$id=$_GET['id'];
$sponsor="";
$daftar_Peserta="actives";
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
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Hapus Akun</h4>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin untuk menghapus ?</p>
	  </div>
      <div class="modal-footer">
							<form action="dashboard.php" method="get">
							  <input type="text" name="delete" hidden="hidden"/>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							  <button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php

include('layout/nav_1.php');

?>

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            
                    <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Daftar Peserta</h2>
          <hr class="star-primary">
		<a href="dashboard.php" class="btn btn-primary">Back</a>
		  
		  <br>
		  <br>
     <table class="table table-bordered" style="width: 1250px;style=;margin-left: -90px;" >
              <thead>
                <tr style="font-size:9px">
                  <th>No</th>
                 
                  <th>Email Ketua Tim</th>
                  <th>TTL Ketua Tim</th>
                  <th>Nama Anggota 1</th>
                  <th>Nama Anggota 2</th>
                  
                  <th>Alamat Sekolah</th>
                  <th>Asal Sekolah</th>
                 
                  <th>Nama Guru Pebimbing</th>
                  <th>No Telp Guru Pebimbing</th>
                 
               
				  
                </tr>
              </thead>
              <tbody>
					<?php
$no=1;
$result = mysqli_query($con,"SELECT * FROM registration where id=$id ORDER BY id desc") 
or die(mysqli_error());  


// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
  
?>
                <tr style="font-size:9px">
				  <td><?php echo $no++;?></td>
                 
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['ttl'];?></td>
                  <td><?php echo $row['nama_anggota_1'];?></td>
                  <td><?php echo $row['nama_anggota_2'];?></td>
                  
                  <td><?php echo $row['alamat_sekolah'];?></td>
                  <td><?php echo $row['asal_sekolah'];?></td>
				  
                  <td><?php echo $row['nama_guru_pebimbing'];?></td>
                  <td><?php echo $row['no_telp_pebimbing'];?></td>
                 
                </tr>
               <?php } ?>
              </tbody>
            </table>
         
   

	</div>
	    
 </section>
 <!-- Portfolio Grid Section -->
  
  
 </div>
    
   

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