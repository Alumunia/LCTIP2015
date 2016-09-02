<?php
	
include ('../koneksi.php');
	$file_name=$_FILES["zip_file"]["name"];
	$file_size = $_FILES["zip_file"]["size"];
	$file_type = $_FILES["zip_file"]["type"];
	$new_size = $file_size/1024;  
	$fileName = strtolower($file_name);
	$allowedExts = array('zip','rar');
	$extension = explode(".", $fileName);   
	$extension = end($extension);
	
	

	 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'application/zip': return '.zip';
           case 'application/rar': return '.rar';
          
           default: return false;
       }
     }
	 $acceptable = array(
        'application/zip',
        'application/rar',
        
      
        
    );
	
  if (($new_size > 900) ){   ?>
  
  <script>
		alert('File lebih dari 900kb');
        window.location.href="javascript:history.go(-1)";
</script>
  
  <?php
  }
  else if(!in_array($extension, $allowedExts)){
  ?>
<script>
		alert('File tidak sesuai format');
        window.location.href="javascript:history.go(-1)";
</script>
  <?php

  }
 else{
if (!empty($_FILES["zip_file"]["name"])) {
	
$nama_ketua_tim = mysqli_real_escape_string($con, $_POST['nama_ketua_tim']);
$no_telp_ketua = mysqli_real_escape_string($con, $_POST['no_telp_ketua']);
$email_ketua_tim = mysqli_real_escape_string($con, $_POST['email_ketua_tim']);
$ttl_ketua_tim = mysqli_real_escape_string($con, $_POST['ttl_ketua_tim']);
$nama_anggota_1 = mysqli_real_escape_string($con, $_POST['nama_anggota_1']);
$nama_anggota_2 = mysqli_real_escape_string($con, $_POST['nama_anggota_2']);
$asal_sekolah = mysqli_real_escape_string($con, $_POST['asal_sekolah']);
$alamat_sekolah = mysqli_real_escape_string($con, $_POST['alamat_sekolah']);
$nama_guru_pebimbing = mysqli_real_escape_string($con, $_POST['nama_guru_pebimbing']);
$no_telp_guru_pebimbing = mysqli_real_escape_string($con, $_POST['no_telp_guru_pebimbing']);
$file_name=$_FILES["zip_file"]["name"];
$temp_name=$_FILES["zip_file"]["tmp_name"];
$imgtype=$_FILES["zip_file"]["type"];
$path = $_FILES['zip_file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$imagename=date("d-m-Y")."-".time().".".$ext;
$target_path = "images/".$imagename;
$user = $_POST['user'];
$pass = $_POST['pass'];

$sama = mysqli_query($con, "SELECT * FROM registration WHERE user = '$user'");
	$sama_1 = mysqli_fetch_array($sama);

		if($sama_1){
		?>
<script>
		alert('Username Sudah Pernah Di Gunakan');
        window.location.href="javascript:history.go(-1)";
</script>
		<?php
}
else{
	if(move_uploaded_file($temp_name, $target_path)) {
	mysqli_query($con,"INSERT INTO registration VALUES('','$nama_ketua_tim','$no_telp_ketua','$email_ketua_tim','$ttl_ketua_tim','$nama_anggota_1','$nama_anggota_2','$asal_sekolah','$alamat_sekolah','$nama_guru_pebimbing','$no_telp_guru_pebimbing','$target_path','0','$user','$pass','','','','','','')");
?>
<script>
		alert('successfully uploaded');
		window.location.href='../index.php?success';
        </script>
		<?php
	}
else
{
echo "error";
}
}
	}
	else
{
echo "error";
}
}
?>