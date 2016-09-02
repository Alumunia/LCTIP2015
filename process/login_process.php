<?php
error_reporting(0);


	include '../koneksi.php';
	
	$user = mysqli_real_escape_string($con, $_POST['name']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);

	
	
	if (isset($_POST['name']) || !isset($_POST['pass'])){
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
	$result = mysqli_fetch_array($query);
	
	if($result) {
		session_start();
		$_SESSION['id'] = $result['username'];
		
		
		header("location:../dashboard.php"); 
	
	}
	else{?>
	
		
<script languange="javascript">alert("Harap isi password dan username dengn benar");</script>
	<script> document.location.href='../index.php';</script>
	
	<?php
	}
	}
	else{
	?>
	
<script languange="javascript">alert("Harap isi password dan username dengn benar");</script>
	<script> document.location.href='../index.php';</script>
	
	
		<?php }
	
	
	?>
	
	

