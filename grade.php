<?php
session_start();
include 'koneksi.php';
if(empty($_SESSION['id'])) {
		header("location:index.php");
	}else{
	$id = $_SESSION['id'];
	
	$query12=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");

	$query12 = mysqli_fetch_assoc($query12);
	$nama_ketua_tim=$query12['nama_ketua_tim'];
	$username=$query12['username'];
	
	
	}


$soal=0;
$S=array();
$R=array();
$query12=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");
$hal=$_POST['hal'];
$query12 = mysqli_fetch_assoc($query12);
$nama_ketua_tim=$query12['nama_ketua_tim'];
$user=$query12['user'];
$score=0;
$sum=0;
$x=0;
$question="QUESTION NUMBER";
$ar="optionsRadios";
while($x <= 9) {

			
			  $S[]=htmlentities($_POST[$ar.++$soal]);
			  $R[] = $row['answer'];
			  $x++;
			 
 }
 


 

 if (($_GET['page'])==1){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_1 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_1 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_1` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}

####################################################################################################################################################################################
else if (($_GET['page'])==2){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_2 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_2 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}

}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_2` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}
####################################################################################################################################################################################
else if ((($_GET['page']))==3){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_3 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_3 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_3` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}
####################################################################################################################################################################################
else if ((($_GET['page']))==4){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_4 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_4 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_4` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}

####################################################################################################################################################################################
else if ((($_GET['page']))==5){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_5 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_5 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_5` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}
####################################################################################################################################################################################
else if ((($_GET['page']))==6){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_6 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_6 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_6` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}
####################################################################################################################################################################################
else if ((($_GET['page']))==7){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_7 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_7 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_7` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}


if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}

}

####################################################################################################################################################################################
else if ((($_GET['page']))==8){
 $result=mysqli_query($con,"SELECT * FROM quiz_score_8 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_8 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_8` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}

if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}


}
###################################################################################################################################
else{
 $result=mysqli_query($con,"SELECT * FROM quiz_score_1 WHERE username='$id'");
 $query123 = mysqli_fetch_array($result);

 if(!$query123){
  foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"INSERT INTO quiz_score_1 (id,username,nomor_soal,jawaban) VALUES ('','$user','$nomor_soal','$jawaban_peserta');");
}


}
else
{
 foreach ($S as $nomor_soal=>$jawaban_peserta)
{
// connect to mysql database
mysqli_query($con,"UPDATE `quiz_score_1` SET `username`='$user',`nomor_soal`='$nomor_soal',`jawaban`='$jawaban_peserta' WHERE nomor_soal='$nomor_soal' AND username='$user';");

}


}
if ($hal==1){header("location:soal_1.php?pagination=1");}
else if($hal==2){header("location:soal_1.php?pagination=2");}
else if($hal==3){header("location:soal_1.php?pagination=3");}
else if($hal==4){header("location:soal_1.php?pagination=4");}
else if($hal==5){header("location:soal_1.php?pagination=5");}
else if($hal==6){header("location:soal_1.php?pagination=6");}
else if($hal==7){header("location:soal_1.php?pagination=7");}
else if($hal==8){header("location:soal_1.php?pagination=8");}
else if($hal==10){header("location:process/finish.php?done");}
else{header("location:soal_1.php?pagination=1");}



}





 ?>