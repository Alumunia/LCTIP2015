<?php
session_start();
		include 'koneksi.php';
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	else{
	$id = $_SESSION['id'];
	$ticket=mysqli_query($con,"SELECT * from registration where user='$id'");
	$ticket = mysqli_fetch_assoc( $ticket );
	if($ticket['quiz_ticket']==1){
	header("location:index.php?ever");
	}
	else{}
	
	$start_quiz=$ticket['start_quiz'];
	$timers=$ticket['quiz_target'];

	
	
	}

date_default_timezone_set('Asia/Jakarta');

$dateFormat = "d F Y -- g:i a";
$targetDate = $timers;
$actualDate = time();

$result=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");
$query = mysqli_fetch_array($result);
$quiz_target=$query['quiz_target'];
$quiz_begin=$query['quiz_begin'];

if (($quiz_begin) >= ($quiz_target)){
mysqli_query($con,"update registration set quiz_ticket=1 where user='$id'");


}
else
{
 //Query the database and get the count 
  $q = mysql_query("UPDATE registration SET quiz_begin='$actualDate' WHERE user='$id';");
  $result = mysql_query($q);
}


echo $quiz_begin;
echo $quiz_target;
echo $id;
  

?>
