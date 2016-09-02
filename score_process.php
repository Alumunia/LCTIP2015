<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	
$id = $_GET['exam'];



$result=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");
$query = mysqli_fetch_array($result);
$start_quiz=$query['start_quiz'];
$end_quiz=$query['end_quiz'];

$sponsor="";
$soal="actives";
$daftar_Peserta="";
$soal_active1='active';

	
##PENILAIAN PAGE 1
$arr_1    = array();
$arr_11    = array();
$x_a=0;
$jumlah_benar_1=0;
$jumlah_salah_1=0;
$jumlah_seri_1=0;
$score_1=0;
$sql_1    = "SELECT * FROM soal ORDER BY id limit 10";
$sql_11    = "SELECT * FROM quiz_score_1 WHERE username='$id' ORDER BY id limit 10";
$result_1 = mysql_query($sql_1) or die(mysql_error());  
$result_11 = mysql_query($sql_11) or die(mysql_error());  
while(($row_1 = mysql_fetch_assoc( $result_1))&&($row_11 = mysql_fetch_assoc( $result_11)) && ($x_a <= 9)) {
 $arr_1[$x_a]=$row_1['answer'];
 $arr_11[$x_a] = $row_11['jawaban'];
	if ((empty($arr_11[$x_a]))||(($arr_11[$x_a])=="checked")){($score_1=$score_1+0);($jumlah_seri_1=$jumlah_seri_1+1);} else if(($arr_11[$x_a])==($arr_1[$x_a])){($score_1=$score_1+2);($jumlah_benar_1=$jumlah_benar_1+1);}else if(($arr_11[$x_a])!=($arr_1[$x_a])){($score_1=$score_1-1);($jumlah_salah_1=$jumlah_salah_1+1);};
	
	$x_a++;
}
##PENILAIAN PAGE 2
$arr_2    = array();
$arr_22    = array();
$x_b=0;
$jumlah_benar_2=0;
$jumlah_salah_2=0;
$jumlah_seri_2=0;
$score_2=0;
$sql_2    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 10";
$sql_22    = "SELECT * FROM quiz_score_2 WHERE username='$id' ORDER BY id limit 10";
$result_2 = mysql_query($sql_2) or die(mysql_error());  
$result_22 = mysql_query($sql_22) or die(mysql_error());  
while(($row_2 = mysql_fetch_assoc( $result_2))&&($row_22 = mysql_fetch_assoc( $result_22)) && ($x_b <= 9)) {
 $arr_2[$x_b]=$row_2['answer'];
 $arr_22[$x_b] = $row_22['jawaban'];
	if ((empty($arr_22[$x_b]))||(($arr_22[$x_b])=="checked")){($score_2=$score_2+0);($jumlah_seri_2=$jumlah_seri_2+1);} else if(($arr_22[$x_b])==($arr_2[$x_b])){($score_2=$score_2+2);($jumlah_benar_2=$jumlah_benar_2+1);}else if(($arr_22[$x_b])!=($arr_2[$x_b])){($score_2=$score_2-1);($jumlah_salah_2=$jumlah_salah_2+1);};

	$x_b++;
}
##PENILAIAN PAGE 3
$arr_3    = array();
$arr_33    = array();
$x_c=0;
$jumlah_benar_3=0;
$jumlah_salah_3=0;
$jumlah_seri_3=0;
$score_3=0;
$sql_3    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 20";
$sql_33    = "SELECT * FROM quiz_score_3 WHERE username='$id' ORDER BY id limit 10";
$result_3 = mysql_query($sql_3) or die(mysql_error());  
$result_33 = mysql_query($sql_33) or die(mysql_error());  
while(($row_3 = mysql_fetch_assoc( $result_3))&&($row_33 = mysql_fetch_assoc( $result_33)) && ($x_c <= 9)) {
 $arr_3[$x_c]=$row_3['answer'];
 $arr_33[$x_c] = $row_33['jawaban'];
	if ((empty($arr_33[$x_c]))||(($arr_33[$x_c])=="checked")){($score_3=$score_3+0);($jumlah_seri_3=$jumlah_seri_3+1);} else if(($arr_33[$x_c])==($arr_3[$x_c])){($score_3=$score_3+2);($jumlah_benar_3=$jumlah_benar_3+1);}else if(($arr_33[$x_c])!=($arr_3[$x_c])){($score_3=$score_3-1);($jumlah_salah_3=$jumlah_salah_3+1);};

	$x_c++;
}
##PENILAIAN PAGE 4
$arr_4    = array();
$arr_44    = array();
$x_d=0;
$jumlah_benar_4=0;
$jumlah_salah_4=0;
$jumlah_seri_4=0;
$score_4=0;
$sql_4    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 30";
$sql_44    = "SELECT * FROM quiz_score_4 WHERE username='$id' ORDER BY id limit 10";
$result_4 = mysql_query($sql_4) or die(mysql_error());  
$result_44 = mysql_query($sql_44) or die(mysql_error());  
while(($row_4 = mysql_fetch_assoc( $result_4))&&($row_44 = mysql_fetch_assoc( $result_44)) && ($x_d <= 9)) {
 $arr_4[$x_d]=$row_4['answer'];
 $arr_44[$x_d] = $row_44['jawaban'];
	if ((empty($arr_44[$x_d]))||(($arr_44[$x_d])=="checked")){($score_4=$score_4+0);($jumlah_seri_4=$jumlah_seri_4+1);} else if(($arr_44[$x_d])==($arr_4[$x_d])){($score_4=$score_4+2);($jumlah_benar_4=$jumlah_benar_4+1);}else if(($arr_44[$x_d])!=($arr_4[$x_d])){($score_4=$score_4-1);($jumlah_salah_4=$jumlah_salah_4+1);};

	$x_d++;
}
##PENILAIAN PAGE 5
$arr_5    = array();
$arr_55    = array();
$x_e=0;
$jumlah_benar_5=0;
$jumlah_salah_5=0;
$jumlah_seri_5=0;
$score_5=0;
$sql_5    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 40";
$sql_55    = "SELECT * FROM quiz_score_5 WHERE username='$id' ORDER BY id limit 10";
$result_5 = mysql_query($sql_5) or die(mysql_error());  
$result_55 = mysql_query($sql_55) or die(mysql_error());  
while(($row_5 = mysql_fetch_assoc( $result_5))&&($row_55 = mysql_fetch_assoc( $result_55)) && ($x_e <= 9)) {
 $arr_5[$x_e]=$row_5['answer'];
 $arr_55[$x_e] = $row_55['jawaban'];
	if ((empty($arr_55[$x_e]))||(($arr_55[$x_e])=="checked")){($score_5=$score_5+0);($jumlah_seri_5=$jumlah_seri_5+1);} else if(($arr_55[$x_e])==($arr_5[$x_e])){($score_5=$score_5+2);($jumlah_benar_5=$jumlah_benar_5+1);}else if(($arr_55[$x_e])!=($arr_5[$x_e])){($score_5=$score_5-1);($jumlah_salah_5=$jumlah_salah_5+1);};

	$x_e++;
}
##PENILAIAN PAGE 6
$arr_6    = array();
$arr_66    = array();
$x_f=0;
$jumlah_benar_6=0;
$jumlah_salah_6=0;
$jumlah_seri_6=0;
$score_6=0;
$sql_6    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 50";
$sql_66    = "SELECT * FROM quiz_score_6 WHERE username='$id' ORDER BY id limit 10";
$result_6 = mysql_query($sql_6) or die(mysql_error());  
$result_66 = mysql_query($sql_66) or die(mysql_error());  
while(($row_6 = mysql_fetch_assoc( $result_6))&&($row_66 = mysql_fetch_assoc( $result_66)) && ($x_f <= 9)) {
 $arr_6[$x_f]=$row_6['answer'];
 $arr_66[$x_f] = $row_66['jawaban'];
	if ((empty($arr_66[$x_f]))||(($arr_66[$x_f])=="checked")){($score_6=$score_6+0);($jumlah_seri_6=$jumlah_seri_6+1);} else if(($arr_66[$x_f])==($arr_6[$x_f])){($score_6=$score_6+2);($jumlah_benar_6=$jumlah_benar_6+1);}else if(($arr_66[$x_f])!=($arr_6[$x_f])){($score_6=$score_6-1);($jumlah_salah_6=$jumlah_salah_6+1);};

	$x_f++;
}
##PENILAIAN PAGE 7
$arr_7    = array();
$arr_77    = array();
$x_g=0;
$jumlah_benar_7=0;
$jumlah_salah_7=0;
$jumlah_seri_7=0;
$score_7=0;
$sql_7    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 60";
$sql_77    = "SELECT * FROM quiz_score_7 WHERE username='$id' ORDER BY id limit 10";
$result_7 = mysql_query($sql_7) or die(mysql_error());  
$result_77 = mysql_query($sql_77) or die(mysql_error());  
while(($row_7 = mysql_fetch_assoc( $result_7))&&($row_77 = mysql_fetch_assoc( $result_77)) && ($x_g <= 9)) {
 $arr_7[$x_g]=$row_7['answer'];
 $arr_77[$x_g] = $row_77['jawaban'];
	if ((empty($arr_77[$x_g]))||(($arr_77[$x_g])=="checked")){($score_7=$score_7+0);($jumlah_seri_7=$jumlah_seri_7+1);} else if(($arr_77[$x_g])==($arr_7[$x_g])){($score_7=$score_7+2);($jumlah_benar_7=$jumlah_benar_7+1);}else if(($arr_77[$x_g])!=($arr_7[$x_g])){($score_7=$score_7-1);($jumlah_salah_7=$jumlah_salah_7+1);};
	
	$x_g++;
}
##PENILAIAN PAGE 8
$arr_8    = array();
$arr_88    = array();
$x_h=0;
$jumlah_benar_8=0;
$jumlah_salah_8=0;
$jumlah_seri_8=0;
$score_8=0;
$sql_8    = "SELECT * FROM soal ORDER BY id limit 10 OFFSET 70";
$sql_88    = "SELECT * FROM quiz_score_8 WHERE username='$id' ORDER BY id limit 10";
$result_8 = mysql_query($sql_8) or die(mysql_error());  
$result_88 = mysql_query($sql_88) or die(mysql_error());  
while(($row_8 = mysql_fetch_assoc( $result_8))&&($row_88 = mysql_fetch_assoc( $result_88)) && ($x_h <= 9)) {
 $arr_8[$x_h]=$row_8['answer'];
 $arr_88[$x_h] = $row_88['jawaban'];
	if ((empty($arr_88[$x_h]))||(($arr_88[$x_h])=="checked")){($score_8=$score_8+0);($jumlah_seri_8=$jumlah_seri_8+1);} else if(($arr_88[$x_h])==($arr_8[$x_h])){($score_8=$score_8+2);($jumlah_benar_8=$jumlah_benar_8+1);}else if(($arr_88[$x_h])!=($arr_8[$x_h])){($score_8=$score_8-1);($jumlah_salah_8=$jumlah_salah_8+1);};
	
	$x_h++;
}



$jumlah_benar=$jumlah_benar_1+$jumlah_benar_2+$jumlah_benar_3+$jumlah_benar_4+$jumlah_benar_5+$jumlah_benar_6+$jumlah_benar_7+$jumlah_benar_8;
$jumlah_salah=$jumlah_salah_1+$jumlah_salah_2+$jumlah_salah_3+$jumlah_salah_4+$jumlah_salah_5+$jumlah_salah_6+$jumlah_salah_7+$jumlah_salah_8;
$jumlah_seri=$jumlah_seri_1+$jumlah_seri_2+$jumlah_seri_3+$jumlah_seri_4+$jumlah_seri_5+$jumlah_seri_6+$jumlah_seri_7+$jumlah_seri_8;

$final_nilai=$score_1+$score_2+$score_3+$score_4+$score_5+$score_6+$score_7+$score_8;

mysqli_query($con,"INSERT INTO peserta_score VALUES('','$id','$jumlah_benar','$jumlah_salah','$jumlah_seri','$final_nilai')");
mysqli_query($con,"UPDATE `kuis`.`registration` SET `nilai` = '$final_nilai',`checked`=1 WHERE `registration`.`user` = '$id';");

header("location:dashboard_rank.php");
