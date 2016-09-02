

<?php
include 'koneksi.php';
$question = mysqli_real_escape_string($con, $_POST['question']);
$answer = mysqli_real_escape_string($con, htmlentities($_POST['answer']));
$wrong_choice_1 = mysqli_real_escape_string($con, $_POST['wrong_choice_1']);
$wrong_choice_2 = mysqli_real_escape_string($con, $_POST['wrong_choice_2']);
$wrong_choice_3 = mysqli_real_escape_string($con, $_POST['wrong_choice_3']);
$wrong_choice_4 = mysqli_real_escape_string($con, $_POST['wrong_choice_4']);

mysqli_query($con,"INSERT INTO soal VALUES('','$question','$answer','$wrong_choice_1','$wrong_choice_2','$wrong_choice_3','$wrong_choice_4')");
$r="INSERT INTO soal VALUES('','$question','$answer','$wrong_choice_1','$wrong_choice_2','$wrong_choice_3','$wrong_choice_4')";
echo $r;
?>