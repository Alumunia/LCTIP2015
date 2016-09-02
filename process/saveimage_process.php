
  <?php
	include '../koneksi.php';

	$day = gmdate("l");
	$date = gmdate("j F Y");
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     } 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "sponsor/".$imagename;
	$link=$_POST['link'];
	$number=$_POST['number'];

if(move_uploaded_file($temp_name, $target_path)) {

	$query_upload="UPDATE `sponsor` SET `images_path`='$target_path',`link`='http://$link' WHERE `number`='$number'";
	mysql_query($query_upload) or die("error in $query_upload".mysql_error());
	echo "upload succes";
;
}else{

   exit("Error While uploading image on the server");
} 

}

?>