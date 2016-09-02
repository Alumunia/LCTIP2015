<?php
// Error Reporting komplett abschalten
error_reporting(0);
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	else{
	$id = $_SESSION['id'];
	########################################################################FETCH FUNGSI#######################################################

$fungsi=mysqli_query($con,"SELECT * FROM fungsi ORDER BY id DESC LIMIT 1");

$fungsi = mysqli_fetch_array($fungsi);
$fungsi_1=$fungsi['allowing'];
	
	$ticket=mysqli_query($con,"SELECT * from registration where user='$id'");
	$ticket = mysqli_fetch_assoc( $ticket );
	if($ticket['quiz_ticket']==1){
	header("location:index.php");
	}
	else if(($ticket['quiz_allowed']==1)&&($fungsi_1==1)&&($ticket['quiz_ticket']==0)){
	header("location:process/finish.php?done");
}	
	else if($fungsi_1==1){
	header("location:index.php");
	}
	else if(($ticket['quiz_ticket']==1)&&($fungsi_1==1)){
	header("location:index.php");
	}
	
	else{}
	
	$start_quiz=$ticket['start_quiz'];
	$timers=$ticket['quiz_target'];

	
	
	}
	
		$id = $_SESSION['id'];
	
	
	


$sponsor="";
$soal="actives";
$daftar_Peserta="";



$arr    = array();


if(($_GET['pagination'])==1){

$sql121    = "SELECT * FROM quiz_score_1 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active1="active";
}
else if(($_GET['pagination'])==2){
$sql121    = "SELECT * FROM quiz_score_2 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active2="active";
}
else if(($_GET['pagination'])==3){
$sql121    = "SELECT * FROM quiz_score_3 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active3="active";
}
else if(($_GET['pagination'])==4){
$sql121    = "SELECT * FROM quiz_score_4 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active4="active";
}
else if(($_GET['pagination'])==5){
$sql121    = "SELECT * FROM quiz_score_5 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active5="active";
}
else if(($_GET['pagination'])==6){
$sql121    = "SELECT * FROM quiz_score_6 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active6="active";
}
else if(($_GET['pagination'])==7){
$sql121    = "SELECT * FROM quiz_score_7 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active7="active";
}
else if(($_GET['pagination'])==8){
$sql121    = "SELECT * FROM quiz_score_8 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active8="active";
}
else{
$sql121    = "SELECT * FROM quiz_score_1 WHERE username='$id' order by id DESC LIMIT 10;";
$soal_active1="active";
}


$result121 = mysql_query($sql121) or die(mysql_error());  
while( $row = mysql_fetch_assoc( $result121 ) ) {
$arr[] = $row['jawaban'];
}
date_default_timezone_set('Asia/Jakarta');

$dateFormat = "d F Y -- g:i a";
$targetDate = $timers;
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);




?>


<!DOCTYPE html>
<html lang="en">

<head>
<script>
   var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax() {
    $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                    $('#hidden').val(data);// first set the value     
            },
            complete: function (data) {
                    // Schedule the next
                    setTimeout(doAjax, interval);
            }
    });
}
setTimeout(doAjax, interval);
 </script>
<script>
window.localLinkClicked = false;

$("a").live("click", function() {
    var url = $(this).attr("href");

    // check if the link is relative or to your domain
    if (! /^https?:\/\/./.test(url) || /https?:\/\/lctipipb\.com/.test(url)) {
        window.localLinkClicked = true;
    }
});

window.onbeforeunload = function() {
    if (window.localLinkClicked) {
       window.alert("Time is up. Press OK to continue."); // change timeout message as required
    } else {
        window.alert("Time is up. Press OK to continue."); // change timeout message as required
    }
}



</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quiz</title>

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


</script>
<script type="text/javascript" src="assets/dist/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
 var days = <?php echo $remainingDay; ?> 
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?> 
function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
  document.getElementById("remain").innerHTML = hours+" hours, "+minutes+" minutes, "+seconds+" seconds";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if ( hours == '00' && minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
   		
  		window.location = "process/finish.php?done" // Add your redirect url
 	} 

}

</script>

<!-- Modal -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        Are You Sure? Once You Quit, You can not try the quiz any more
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <label type="button" class="btn btn-info" for="submit-form">Submit</label>
	   
      </div>
    </div>
  </div>
</div>
<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');"onload="setCountDown();">

   
    <!-- Header -->
	<div class="col-md-4">
<div class="well" style="background-image:url('assets/images/bg-1.png');position:fixed;z-index:3;width:210px;left:0px;">
<p style="font-size:14px"><Strong>Username : <?php echo $id;?></strong></p>


 
 <div style="font-size:12px" id="remain"><Strong><?php echo "$remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></strong></div>

<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">
 Rules
</button>
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
</div>
<div class="col-md-4 pull-right">
<div class="well pull" style="background-image:url('assets/images/bg-1.png');position:fixed;z-index:3;width:220px;right:0px;padding:10px;padding-bottom:0px;">
<ul>
<li>Biologi (1-15)</li>
<li>Fisika (16-30)</li>
<li>Kimia (31-45)</li>
<li>Mat (46-60)</li>
<li>Pangan (61-80)</li>
</ul>
<br>

</div>

</div>


	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px;background-image:url('assets/images/bg-1.png')";>
    <section id="portfolio">

<div class="container" style="background-color:white;width:900px">
            
 <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Quiz</h2>
<hr class="star-primary">
<div class="row">
<script>
var submitHandler = function() {
  // do stuff
  return false;
}
</script>
<?php
if(($_GET['pagination'])==1){?>
<form action="grade.php?page=1" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold">
<?php } else if(($_GET['pagination'])==2){?>
<form action="grade.php?page=2" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="11">
<?php } else if(($_GET['pagination'])==3){?>
<form action="grade.php?page=3" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="21">
<?php } else if(($_GET['pagination'])==4){?>
<form action="grade.php?page=4" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="31">
<?php } else if(($_GET['pagination'])==5){?>
<form action="grade.php?page=5" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="41">
<?php } else if(($_GET['pagination'])==6){?>
<form action="grade.php?page=6" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="51">
<?php } else if(($_GET['pagination'])==7){?>
<form action="grade.php?page=7" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="61">
<?php } else if(($_GET['pagination'])==8){?>
<form action="grade.php?page=8" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold" start="71">
<?php } else {?>
<form action="grade.php?page=1" method="post" id="quiz"  onkeypress="return event.keyCode != 13;" >
<ol style="font-weight:bold">
<?php } ?>

<!--------------the end---------------------------------->



						<?php
if(($_GET['pagination'])==1){

$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10") ;
}
else if(($_GET['pagination'])==2){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 10") ;
}
else if(($_GET['pagination'])==3){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 20") ;
}
else if(($_GET['pagination'])==4){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 30") ;
}
else if(($_GET['pagination'])==5){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 40") ;
}
else if(($_GET['pagination'])==6){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 50") ;
}
else if(($_GET['pagination'])==7){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 60") ;
}
else if(($_GET['pagination'])==8){
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10 OFFSET 70") ;
}
else{
$results = mysqli_query($con,"SELECT * FROM soal ORDER BY id limit 10") ;
}


########################################################################################----BATAS ALGORITMA-------------###################################################################
$nos=10;		
$no=0;
$number=0;

// output data of each row
while ($row1 = mysqli_fetch_array($results)) {
$row12=$row1['question'];
$nomor_soal=$row1['nomor_soal'];
$no++;
$nos--;
$number++;

?>

		
<li>
			
  <p style="margin-top:30px;size:15px"><?php echo $row12;?></p>

 <?php
$result1 = mysqli_query($con,"SELECT * FROM soal WHERE question='$row12' ORDER BY id") 
or die(mysqli_error());  
if(!$result1){
echo "not connect";
}


// output data of each row
while($row = mysqli_fetch_array( $result1 )) {
$answer=$row['answer'];
$choice_1=$row['choice_1'];
$choice_2=$row['choice_2'];
$choice_3=$row['choice_3'];
$choice_4=$row['choice_4'];
$imgs = array($row['answer'],$row['choice_1'],$row['choice_2'],$row['choice_3'],$row['choice_4']);
shuffle( $imgs );

?>
<style>
p {
    font-size:14px;
}


</style>
<div>
  
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios1" value="<?php echo $imgs[0]; ?>" <?php if ($imgs[0]==$arr[$nos]){echo "checked";}else{}?> >
   <label style="font-weight:normal">
    <?php echo html_entity_decode($imgs[0]); ?>
  </label>
</div>
<div>
  
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadio2" value="<?php echo $imgs[1]; ?>" <?php if ($imgs[1]==$arr[$nos]){echo "checked";}else{}?>>
   <label style="font-weight:normal" >
    <?php echo html_entity_decode($imgs[1]); ?>
  </label>
</div>
<div>

    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios3" value="<?php echo $imgs[2]; ?>" <?php if ($imgs[2]==$arr[$nos]){echo "checked";}else{}?> >
     <label style="font-weight:normal">
    <?php echo html_entity_decode($imgs[2]); ?>
  </label>
</div>
<div>
 
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios4" value="<?php echo $imgs[3]; ?>" <?php if ($imgs[3]==$arr[$nos]){echo "checked";}else{}?>>
    <label style="font-weight:normal">
   <?php echo html_entity_decode($imgs[3]); ?>
  </label>
</div>
<div>

    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios5" value="<?php echo $imgs[4]; ?>" <?php if ($imgs[4]==$arr[$nos]){echo "checked";}else{}?>>
    <label style="font-weight:normal">
   <?php echo html_entity_decode($imgs[4]); ?>
  </label>
</div>
<div>
  
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios6" value="<?php if (empty($arr[$nos])){echo "checked";}else{}?>" >
  <label style="font-weight:normal">
   <p> Kosong kan jawaban</p>
  </label>
</div>

</li>
 
<?php } 
}
?>


           	</ol>
			  
			
			<div class="col-md-12 ">
<?php include('layout/pagination.php')?>
			</div>
			</form>
			<div class="col-md-12">
<div class="row">
<div class="col-xs-5"></div>
<div class="col-xs-2">			
<div class="form-group ">
<!--<button style="border-radius: 0px;border-color: rgb(42, 202, 226);WIDTH:100%"  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">SUBMIT</button>-->
 </div>
</div>
<div class="col-xs-5"></div>
</div>
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