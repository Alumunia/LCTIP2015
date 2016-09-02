<?php
include 'koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:index.php");
	}
	$id = $_SESSION['id'];

$sponsor="";
$soal="actives";
$daftar_Peserta="";




?>
<!DOCTYPE html>
<html>
<head>
<title>Sample Quiz</title>
<?php 

$stmt = $con->prepare( "SELECT *
      FROM soal ORDER BY rand()" );
      $stmt->execute();
?>
</head>
<body>
<?php 
$number = 0;
for($i=0; $row = $stmt->fetch(); $i++){
        $number++;  
        $id = $row['id'];
        $question = $row['question'];
      $ans_array = array($row['choice_1'],$row['choice_2'],$row['choice_3'],$row['answer']);
     shuffle($ans_array);
?>

 <h4> <?php echo $number . ".) " . $question; ?></h4>   
 <label><input type="radio" value="<?php echo $ans_array[0]; ?>" name="<?php echo $question; ?>"> <?php echo $ans_array[0]; ?></label>
 <label><input type="radio" value="<?php echo $ans_array[1]; ?>" name="<?php echo $question; ?>"> <?php echo $ans_array[1]; ?></label>
 <label><input type="radio" value="<?php echo $ans_array[2]; ?>" name="<?php echo $question; ?>"> <?php echo $ans_array[2]; ?></label>
 <label><input type="radio" value="<?php echo $ans_array[3]; ?>" name="<?php echo $question; ?>"> <?php echo $ans_array[3]; ?></label>

<?php
}
?>
<br />
<br />
<input type="submit" value="Submit" name="submit">

</body>
</html>
   

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