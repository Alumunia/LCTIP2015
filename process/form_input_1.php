<?php
error_reporting(0);
	include '../koneksi.php';
	
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);

	
	
		if (isset($_POST['user']) || !isset($_POST['pass'])){
	$query = mysqli_query($con, "SELECT * FROM registration WHERE user = '$user' AND pass = '$pass'");
	$result = mysqli_fetch_array($query);
	
	
		if($result) {
		
		$query1 = mysqli_query($con, "SELECT * FROM registration WHERE user = '$user' AND pass = '$pass' AND status = 1");
		
		$result1 = mysqli_fetch_array($query1);
		if($result1){
		
		session_start();
		$_SESSION['id'] = $result['user'];
		
		header("location:../index.php");
		}
		else {
		header("location:../index.php?error");
		}
	}
	else{
	?>
	<script> document.location.href='../index.php?failed';</script>
	<?php }
	}
		else{
	?>
<script language="javascript">alert("Harap isi password dan username dengan baik dan benar");</script>
	
	<?php }
	
	$m = strtotime("08:00");
	$masuk = date("H:i", $m);
	
	$k = strtotime("20:00");
	$keluar = date("H:i", $k);


?>