<?php
include ('koneksi.php');

session_start();

###########announcement#################
$announcement=mysqli_query($con,"SELECT * FROM announcement ORDER BY id DESC LIMIT 1");

$announcement = mysqli_fetch_array($announcement);
$ann_1=$announcement['announcement'];
###########SELEKSI#################


$query9090 = "SELECT * FROM `peserta_score` JOIN `registration` WHERE `peserta_score`.username=`registration`.user ORDER BY score DESC,jumlah_benar DESC LIMIT 100";
$result9090 = mysql_query($query9090) or die ("no query");

$result_array = array();
while($row = mysql_fetch_assoc($result9090))
{
    $result_array[] = $row['username'];
}

#################################################################################
$ass=mysqli_query($con,"SELECT * FROM pengumuman ORDER BY id Desc LIMIT 1");
$ass = mysqli_fetch_array($ass);
$pengumuman1=$ass['pengumuman'];
date_default_timezone_set('Asia/Jakarta');
if(empty($_SESSION['id'])){
}
else{

$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");

$query = mysqli_fetch_array($query);
########################################################################FETCH FUNGSI#######################################################

$fungsi=mysqli_query($con,"SELECT * FROM fungsi ORDER BY id DESC LIMIT 1");

$fungsi = mysqli_fetch_array($fungsi);
$fungsi_1=$fungsi['allowing'];
if((($query['quiz_allowed'])==1)&&(($query['quiz_ticket'])==0)&&($fungsi_1==0)){
header("location:soal_1.php");

}
else{ 
$nama_ketua_tim=$query['nama_ketua_tim'];
$nama_anggota_1=$query['nama_anggota_1'];
$nama_anggota_2=$query['nama_anggota_2'];
$asal_sekolah=$query['asal_sekolah'];
$user=$query['user'];
$alamat_sekolah=$query['alamat_sekolah'];
$nama_guru_pebimbing=$query['nama_guru_pebimbing'];
$no_telp_pebimbing=$query['no_telp_pebimbing'];
$status=$query['status'];
$quiz_allowed=$query['quiz_allowed'];
$quiz_ticket=$query['quiz_ticket'];
}




}


if (isset($_POST['mulai'])){
date_default_timezone_set('Asia/Jakarta');
$timers = time() + (120*60);//Change the 25 to however many minutes you want to countdown
$dateFormat = "d F Y -- g:i a";
$targetDate = $timers;
$actualDate = time();

mysqli_query($con,"update registration set start_quiz= now(),quiz_target='$timers',quiz_allowed=1 where user='$id'");
header("location:soal_1.php");

}
else{}


$index="actives";
?>
<!DOCTYPE html>
<html lang="en">
<!---------CREATED BY RIZKI------->
<!---------G64120094-------------->
<!----------alumunia.com---------->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCTIPIPB</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/non-responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="css/non-responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');padding-bottom:0px;padding-top:26px;">

 <?php
 
 include('layout/nav.php');

 
 
 ?>

    <!-- Header -->
	

   

    <!-- Contact Section -->
    <?php if (isset($_SESSION['id'])) {?>
    <section id="contact" style="margin-top: -75px;padding-bottom:0px;">
	<?php } else {?>
	<section id="contact" style="padding-top:70px;padding-bottom:0px;margin-top:-70px">
	<?php } ?>
        <div class="container" style="width:1040px;">
		
		
		<?php if (isset($_GET['success'])){?>
		<img src="assets/images/logo.png" class="pull-left" style="position:absolute" height="90px">
		<div class="col-xs-4 col-xs-offset-2 pull-right" style="padding-top:30px;padding-bottom:0px;background-color: white; border: 0px;">
		<div id="alert_message"  class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Terima Kasih telah mendaftar  </strong>
		</div>
		</div>
		<?php } else if (isset($_GET['error'])){?>
		<img src="assets/images/logo.png" class="pull-left" style="position:absolute" height="90px">
		<div class="col-xs-4 col-xs-offset-2 pull-right" style="padding-top:30px;padding-bottom:0px;background-color: white; border: 0px;">
		<div id="alert_message"  class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Maaf </strong> Akun anda belum terverifikasi
		</div>
		</div>
		<?php } else if (isset($_GET['failed'])){?>
		<img src="assets/images/logo.png" class="pull-left" style="position:absolute" height="90px">
		<div class="col-xs-4 col-xs-offset-2 pull-right" style="padding-top:30px;padding-bottom:0px;background-color: white; border: 0px;">
		<div id="alert_message"  class="alert alert-danger alert-dismissable padding-top:150px;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Ooopss</strong> Akun tidak di temukan
		</div>
		</div>
		
		<?php } else{?>
		<img src="assets/images/logo.png" class="pull-left" style="position:absolute" height="90px">
		<?php } ?>
		
				<script>
				window.setTimeout(function() {
  $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
  });
}, 3000);
</script>
<style>
p {
    font-size:13px;
}


</style>
            <div class="row" style="padding-top: 80px;">

                <div class="col-xs-8">
				
				<?php if (isset($_SESSION['id'])) {?>
				<?php
				if ($ann_1==1){?>
				<div class="well well-lg" style="margin-top:20px;background-color:white;margin-bottom:-20px;padding:15px;padding-bottom:10px;" >
				
				<?php } else{?>
				<div class="well well-lg" style="margin-top:20px;margin-bottom:-20px;padding:15px;padding-bottom:10px;" >
				<h3 style="color: #2ACAE2;margin-bottom: -30px;margin-top:-10px;">Pengumuman! </h3>
				<?php } ?>
				
				
				<br>
				<p style="text-align:justify">
				
				<?php
				if ($ann_1==1){?>
				<div class="container">
				<?php if (in_array("$id",$result_array)) {?>
				<img class="img-rounded" src="lolos.png" width="600px" style="margin-top:-30px;" alt="http://W3Schools.com" >
				<?php } else{?>
				<img class="img-rounded" src="unlolos.png" width="600px" style="margin-top:-30px;" alt="http://W3Schools.com" >
				
				<?php } ?>
   <table class="table table-bordered" style="width: 400px;margin-bottom:0px;margin-left:80px;" >
              <thead>
                <tr style="font-size:12px">
                
                  <th>Jawaban Benar</th>
                  <th>Jawaban Salah</th>
                  <th>Jawaban kosong</th>
                  <th>Nilai</th>
				  
				  
                </tr>
              </thead>
              <tbody>
				
                <tr style="font-size:12px">
				
                 
			<td>
<?php
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$id';");
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
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$id';");
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
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$id';");
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
$result1211 = mysqli_query($con,"SELECT * FROM `peserta_score` WHERE username='$id';");
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
          
              </tbody>
            </table>
				<?php echo $pengumuman1;?>
				
				
				
				<?php }
				else{
				echo $pengumuman1;
				}
				?>
				</div>
		</p>
				
				<?php if (($quiz_ticket==0)&&($fungsi_1==0))  {?>
<div class="row">
<div class="col-md-3">
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal3">
 Click Before start the quiz
</button>
</div>
<Div class="col-md-2">
</div>
<div class="col-md-3">
<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal9">
 Start Quiz
</button>
				<form action="" method="POST">
				<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        Are You Sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input name="mulai" class="btn btn-info" type="submit" value="Yes"/>
      </div>
    </div>
  </div>
</div>
				
				</form>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Rules</h4>
      </div>
       <div class="modal-body">
        <ol>
		<li>Peserta hanya dapat mengakses soal Online Test menggunakan User ID dan Password yang diberikan oleh panitia setelah verifikasi data peserta LCTIP XXIII sesuai jadwal yang telah ditentukan.</li>
		<li>Online Test akan dibuka pada tanggal 17 Oktober 2015 pukul 08.00-21.00 WIB dan 18 Oktober 2015 pukul 08.00-21.00 WIB. Peserta diberikan waktu 120 menit untuk mengerjakan soal. Start pengerjaan soal paling lambat pukul 19.00 sebab laman soal akan ditutup dan tidak dapat diakses pada pukul 21.00 WIB.</li>
		<li>Soal penyisihan terdiri dari atas 80 soal pilihan ganda dalam 8 halaman, dengan masing-masing 15 soal Biologi, 15 soal Fisika, 15 soal Kimia, 15 soal Matematika, dan 20 soal Pangan.</li>
		<li>Waktu pengerjaan soal selama 120 menit terhitung sejak membuka halaman soal.</li>
		<li>Sistem skor sebagai berikut: bernilai +2 bila jawaban benar, -1 bila jawaban salah, dan 0 bila tidak menjawab.</li>
		<li>Pilihan “Kosongkan jawaban” dapat dipilih apabila peserta tidak ingin menjawab soal. Soal yang tidak sempat terjawab ketika waktu telah habis, akan terhitung tidak menjawab soal (skor 0).</li>
		<li>Peserta hanya dapat men-submit soal sebanyak 1 kali (sekali attempt saja).</li>
		<li>Peserta diperbolehkan membuka soal di lebih dari 1 komputer pada saat yang bersamaan. Perhitungan waktu dimulai pada komputer pertama yang membuka halaman soal. Perlu diperhatikan bahwa sistem akan otomatis menerima jawaban yang di-submit oleh komputer pertama dan me-logout akun yang bersangkutan.</li>
		<li>Jawaban yang telah diisi dalam suatu halaman akan otomatis tersimpan dalam sistem ketika peserta berpindah halaman. Putusnya koneksi internet pada saat pengerjaan soal tidak akan menghilangkan jawaban yang telah dipilih sebelumnya.</li>
		<li>Pastikan komputer terhubung dengan koneksi internet yang stabil saat pengerjaan soal. Perihal gangguan koneksi internet di luar tanggung jawab panitia.</li>
		<li>Seratus (100) regu dengan nilai tertinggi berhak lolos ke babak Preliminary.</li>
		<li>Apabila ada pertanyaan terkait pengerjaan Online Test, silahkan menghubungi Official Account Line@ LCTIP2015 (@txc7040l) atau Contact Person di bawah ini:</li>
		<ul>
		<li>Rizal 	(0856 4710 2443)</li>
		<li>Afi 		(0812 1955 2530)</li>
		<li>Indra 	(0817 0373 5899)</li>
		<li>Indah 	(0856 9221 5411)</li>
		<li>Zaid 	(0812 9001 5700)</li>
		
	    </ul>
		<li>Pelayanan SMS/Telp hanya dibuka pada pukul 08.00-17.00 WIB. Pertanyaan di luar jam tersebut dapat dilayani melalui akun Official Line@ kami. </li>
		
		</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
				
				<?php }else if ($quiz_allowed==1){?>
				<?php }
				else {?>
				
			
				<?php }

				?>
				
				</div>
               <?php } else{ ?>
			   
				 <iframe width="610" height="360" src="https://www.youtube.com/embed/d5LuMpGsFcs" frameborder="0" style="padding-top:25px;margin-bottom:5px;padding-left:7px" allowfullscreen></iframe>
				
				<?php } ?>
			   </div>
				
				 <div class="col-xs-4 text-center" style=" <!--background-image:url('assets/images/bg-1.png')-->;background-color:transparent; border: 0px;margin-top:-30px">
				 <?php if (isset($_SESSION['id'])) {?>
				<div class="col-xs-10 pull-right">
				 <div style="BACKGROUND-COLOR: WHITE";>
				  <h5 style="padding-top:0px">Profile</h5>
				  <div class="col-xs-12" style=" border-bottom: solid;border-color: #C9C6C6;margin-top: 0px;"></div>
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                   <div class="text-left">
				   <label style="font-size: 12px;">Nama Ketua Tim :</label><br><label><?php echo $nama_ketua_tim;?></label><br>
				   <label style="font-size: 12px;">Nama anggota 1: </label><br><label><?php echo $nama_anggota_1;?></label><br>
				   <label style="font-size: 12px;">Nama anggota 2 : </label><br><label><?php echo $nama_anggota_2;?></label><br>
				   <label style="font-size: 12px;">Asal Sekolah : </label><br><label><?php echo $asal_sekolah;?></label><br>
				   <label style="font-size: 12px;">Nama Pebimbing : </label><br><label><?php echo $nama_guru_pebimbing;?></label><br>
				   <label><?php if ($status ==1 ) {?>
				   <p class="text-center" style="padding:5px;color: white;background-color: #08B428;padding-left: 45px;padding-right: 65px;" > TERVERIFIKASI </p>
				   
				   <?php } ?></label><br>
				   </div>
                </div>
				</div>
				
				
               <?php } else{ ?>
                 <div class="col-xs-10 col-xs-offset-2" style="BACKGROUND-COLOR:white;/* padding-top:30px */margin-top: 35px;margin-left: 23px;" ;="">
				  <h4>Login</h4>
				  
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form role="form" method="post" enctype="multipart/form-data" action="process/form_input_1.php" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Username</label>
                                <input type="text" class="form-control" required placeholder="username" name="user" required data-validation-required-message="silahkan masukkan username" style="font-size:20px;width: 110%;margin-left: -15px;">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>password</label>
                                <input type="password" class="form-control" placeholder="password" name="pass" required data-validation-required-message="silahkan masukkan login"  style="font-size:20px;width: 110%;margin-left: -15px;">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                      
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-3">
                                <button type="submit" class="btn btn-info" style="background-color: rgb(42, 202, 226); border-radius: 0px; border-color: rgb(42, 202, 226);">Masuk</button>
                            </div>
							<div class="col-xs-9">
							<a class="text-left" href="registration.php"><strong style="margin-left:-20px">Daftar Baru?</strong></a><br>
							<a href="#" type="button" data-toggle="modal" data-target="#myModal"style="color: #E55656;"><strong style="padding-left:2px">Lupa Password?</strong></a><!-- Button trigger modal --><br>
	<a href="#" type="button" data-toggle="modal" data-target="#myModal1" style="color: #2ACAE2;"><strong style="padding-left:2px">Butuh Bantuan?</strong></a>
							
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width:500px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lupa Password?</h4>
      </div>
      <div class="modal-body">
	  <p>Harap menghubungi </p>
<li>Rizal (0856-4710-2442)</li>				
<li>Zaid (0812-9001-5700)</li>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width:500px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Butuh Bantuan?</h4>
      </div>
      <div class="modal-body">
	  <p>Harap menghubungi </p>
<li>Rizal (0856-4710-2442)</li>				
<li>Zaid (0812-9001-5700)</li>
<div class="text-left">
<p>Atau jika tidak bisa mendaftar,tulis email dengn format berikut BESERTA lampiran file nya, dan kirim ke alumunia@gmail.com</p>

<li>Nama Ketua Tim: </li>				
<li>No telp Ketua Tim:</li>	
<li>Email Ketua Tim: </li>
<li>TTL Ketua Tim:</li>
<li>Nama Anggota 1:</li>
<li>Nama Anggota 2:</li>
<li>Asal Sekolah:</li>
<li>Alamat Sekolah :</li>
<li>Nama Guru Pembimbing :</li>
<li>No Telp Guru Pembimbing :</li>
<li>Username: </li>
<li>password:</li>
</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
							
							
							</div>
                        </div>
                    </form>
                </div>
				<?php } ?>
                </div>
            </div>
			   
          

<div class="well well-lg" style="height:90px;border-radius: 0px;width: 990px;margin-left: 5px;margin-top:30px">
	 		 <h6 class="pull-left" style="margin-top: -20px; margin-bottom: 5px;">Supported By</h6>	
	 		 <h6  style="margin-top: -20px;padding-left:50%; margin-bottom: 5px;">Media Partner</h6>	
		 <div class="row">

					           
   <!---IKLAN 1---->
   
         <div class="col-xs-1">
		
       				
		<a href="http://www.hoteldutaberlian.com" target="_blank">	<img class="img-rounded" src="process/sponsor/01-08-2015-1438427685.png" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
           
   <!---IKLAN 1---->
     <div class="col-xs-1">
		
       	<a href="#" target="_blank">	<img class="img-rounded" src="process/sponsor/bukaka.gif" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
					
		
			                     
		
			
			</div>
        
	<!--------THE END OF IKLAN 1---->
           
   <!---IKLAN 1---->
         <div class="col-xs-1">
		
       				
		<a href="#" target="_blank">	<img class="img-rounded" src="process/sponsor/blst.png" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
	   <!---IKLAN 1---->
         <div class="col-xs-1">
		
       				
		<a href="http://www.duakelinci.co.id" target="_blank">	<img class="img-rounded" src="process/sponsor/25-09-2015-1443116868.png" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
	   <!---IKLAN 1---->
         <div class="col-xs-1">
		
       				
		<a href="#" target="_blank">	<img class="img-rounded" src="process/sponsor/ipbpress.jpg" alt="http://W3Schools.com" height="70px" width="85px" style="padding:10px"></a>
		
			                     
		
			
			</div>
			 <div class="col-xs-1">
		
			</div>
				 <div class="col-xs-1">
		
			</div>
	<!--------THE END OF IKLAN 1---->
	<div class="pull-right" style="margin-right:-30px"><!--------------BATAS MEDIA PARTNER-------->
	  <!---IKLAN 1---->
        
	<!--------THE END OF IKLAN 1---->
	   <!---IKLAN 1---->
         <div class="col-xs-2">
		
       				
		<a href="http://foodreview.co.id/" target="_blank">	<img class="img-rounded" src="process/sponsor/foodreview.jpg" alt="http://W3Schools.com" height="70px" width="85px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
	   <!---IKLAN 1---->
         <div class="col-xs-2">
		
       				
		<a href="http://www.seputarkampus.com" target="_blank">	<img class="img-rounded" src="process/sponsor/seputarkampus.png" alt="http://W3Schools.com" height="70px" width="85px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
	 <!---IKLAN 1---->
       <div class="col-xs-2">
		
       				
		<a href="http://www.kesekolah.com" target="_blank">	<img class="img-rounded" src="process/sponsor/18-08-2015-1439874901.png" alt="http://W3Schools.com" height="60px" width="85px" height="70px" width="70px" style="padding:10px"></a>
		
			                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
           

           
   <!---IKLAN 1---->
         <div class="col-xs-2">
	                    
		<a href="http://www.inspiratorfreak.com/" target="_blank"><img class="img-rounded" src="process/sponsor/inspiratorfreak.jpg" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
	<!---IKLAN 1---->
         <div class="col-xs-2">
	                    
		<a href="http://agrifmid.radio.net/" target="_blank"><img class="img-rounded" src="process/sponsor/agrifm.jpg" alt="http://W3Schools.com" height="70px" width="70px" style="padding:10px"></a>
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
				</div>
               
                </div>
</div>
</div>
	<style>
			#footer {
		
		
		
		height:60px;			/* Height of the footer */
		background:#2ACAE2;
                width: 100%;
                position: absolute;
                bottom: 0px;
	}
	/* other non-essential CSS */
	#header p,
	#header h1 {
		margin:0;
		
	}
	#footer p {
		margin:0;
		
			
			
			</style>
   <div id="footer">
		<!-- Footer start -->
<!-----THIS IS FOOTER----->
	<p style="padding:0px;padding-top:12px;padding-left:180px;color:white;font-size:14px">Copyright @2014 LCTIP IPB,All rights reserved</p>
	<p style="padding:0px;padding-left:180px;color:white;font-size:14px">Follow us on Twitter,Facebook and blog</p>

		<!-- Footer end -->
	</div>

      
    </section>
	


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