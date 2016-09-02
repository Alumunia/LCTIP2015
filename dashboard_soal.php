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

if (isset($_GET['delete'])){
$del2=$_GET['delete'];
mysqli_query($con,"DELETE FROM `soal` WHERE id= $del2");

}
else 
{}


if (isset($_POST['submit'])){

$question = mysqli_real_escape_string($con, $_POST['question']);
$answer = mysqli_real_escape_string($con, $_POST['answer']);
$wrong_choice_1 = mysqli_real_escape_string($con, $_POST['wrong_choice_1']);
$wrong_choice_2 = mysqli_real_escape_string($con, $_POST['wrong_choice_2']);
$wrong_choice_3 = mysqli_real_escape_string($con, $_POST['wrong_choice_3']);
$wrong_choice_4 = mysqli_real_escape_string($con, $_POST['wrong_choice_4']);

mysqli_query($con,"INSERT INTO SOAL VALUES('','$question','$answer','$wrong_choice_1','$wrong_choice_2','$wrong_choice_3','$wrong_choice_4')");


?>

<script>
		alert('Adding Quiz Success');
        
</script>

<?php


}
else{

}


if (isset($_POST['submit_1'])){

$edit= mysqli_real_escape_string($con, $_POST['edit']);
$question = mysqli_real_escape_string($con, $_POST['question']);
$answer = mysqli_real_escape_string($con, $_POST['answer']);
$choice_1 = mysqli_real_escape_string($con, $_POST['wrong_choice_1']);
$choice_2 = mysqli_real_escape_string($con, $_POST['wrong_choice_2']);
$choice_3 = mysqli_real_escape_string($con, $_POST['wrong_choice_3']);
$choice_4 = mysqli_real_escape_string($con, $_POST['wrong_choice_4']);

mysqli_query($con,"UPDATE soal set question='$question',answer='$answer',choice_1='$choice_1',choice_2='$choice_2',choice_3='$choice_3',choice_4='$choice_4' WHERE id='$edit'");
?>

<script>
		alert('Edit Quiz Success');
        
</script>

<?PHP
} 

else{}


if (isset($_GET['dorm12'])){

mysqli_query($con,"update registration set quiz_ticket=0");
mysqli_query($con,"INSERT INTO fungsi VALUES('','1')");
?>

<script>
		alert('Success');
        document.location.href='dashboard_soal.php';
</script>



<?php
}
else if (isset($_GET['room12'])){

mysqli_query($con,"INSERT INTO fungsi VALUES('','0')");
mysqli_query($con,"update registration set quiz_ticket=1");
?>
<script>
		alert('Success');
        document.location.href='dashboard_soal.php';
</script>
<?php


}



	?>
	
	

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

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
<script type="text/javascript" src="assets/dist/tinymce/js/tinymce/tinymce.min.js"></script>
	
<script type="text/javascript">

tinymce.init({
selector: "textarea",
// ===========================================
// INCLUDE THE PLUGIN
// ===========================================
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],
// ===========================================
// PUT PLUGIN'S BUTTON on the toolbar
// ===========================================
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false
});

</script>
<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');">
	<!-- Modal -->
<div class="modal fade" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Quiz</h4>
      </div>
      <div class="modal-body">
    
	      <form role="form" method="post"  action=""  >
      
                            <div class="form-group controls">
                                <label>Question</label>
                               
								<textarea type="text"  rows="9" name="question" required class="form-control" placeholder="Question"> Your Text Here...</textarea>

                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Answer</label>
                                <input type="text" class="form-control" required placeholder="answer" name="answer" required />
                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Wrong Choice 1</label>
                                <input type="text" class="form-control" required placeholder="Wrong_choice_1" name="wrong_choice_1" required />
                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Wrong Choice 2</label>
                                <input type="text" class="form-control" required placeholder="Wrong_choice_2" name="wrong_choice_2" required />
                                <p class="help-block text-danger"></p>
                            </div>  
							<div class="form-group controls">
                                <label>Wrong Choice 3</label>
                                <input type="text" class="form-control" required placeholder="Wrong_choice_3" name="wrong_choice_3" required />
                                <p class="help-block text-danger"></p>
                            </div>  
							<div class="form-group controls">
                                <label>Wrong Choice 4</label>
                                <input type="text" class="form-control" required placeholder="Wrong_choice_4" name="wrong_choice_4" required />
                                <p class="help-block text-danger"></p>
                            </div>
						
							
                      
                        <div class="row">
                            <div class="form-group ">
                               <button style="border-radius: 0px; background-color: rgb(42, 202, 226); border-color: rgb(42, 202, 226);WIDTH:100%" value="submit" name="submit" type="submit" class="btn btn-info pull-right">SUBMIT</button>
                            </div>
                        </div>
                    </form>
	
	
	
	
	
	  </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Hapus Pertanyaan</h4>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin untuk menghapus pertanyaan  <strong></strong>?</p>
	  </div>
      <div class="modal-footer">
							<form action="dashboard_soal.php" method="get">
							  <input type="text" name="delete" hidden="hidden"/>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							  <button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="myModal_4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Help</h4>
      </div>
      <div class="modal-body">
	  <ol>
     <li> <p>Gunakan <strong>Add Quiz</strong> Untuk menambah Pertanyaan</p> </li>
     <li> <p>Setiap pertanyaan yang di buat mengandung satu jawaban benar dan 4 jawaban salah (wrong choice)</p> </li>
     <li> <p>Jawaban akan di Acak Tiap Pertanyaan</p> </li>
     <li> <p>Gunakan ikon edit untuk mengedit pertanyaan yang di inginkan</p> </li>
     <li> <p>Gunakan ikon trash untuk menghapus pertanyaan yang di inginkan</p> </li>
     <li> <p>Gunakan Button Show Untuk melihat Simulasi Soal</p> </li>
     <li> <p>jika ada saran dan masukan, silahkan email ke alumunia@gmail.com</p> </li>
	 </ol>
	  </div>
      <div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							
							</form>
						  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<!-- Modal -->
<div class="modal fade" id="my3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Quiz</h4>
      </div>
      <div class="modal-body">
    
	      <form role="form" method="post"  action=""  >
                        <input type="text" name="edit" id="editid" hidden="hidden"/>
                            <div class="form-group controls">
                                <label>Question</label>
								
                                <input type="text" class="form-control" id="questionid" placeholder="Question" name="question"/>
                                <p class="help-block text-danger"></p>
                            </div>
							
						 <div class="form-group controls">
                                <label>Answer</label>
                                <input type="text" class="form-control" id="answerid" placeholder="answer" name="answer" />
                                <p class="help-block text-danger"></p>
                            </div>
                       <div class="form-group controls">
                                <label>Wrong Choice 1</label>
                                <input type="text" class="form-control" id="wrong_choice_1id" placeholder="Wrong_choice_1" name="wrong_choice_1" />
                                <p class="help-block text-danger"></p>
                            </div>
							  <div class="form-group controls">
                                <label>Wrong Choice 2</label>
                                <input type="text" class="form-control" id="wrong_choice_2id" placeholder="Wrong_choice_2" name="wrong_choice_2" />
                                <p class="help-block text-danger"></p>
                            </div>  <div class="form-group controls">
                                <label>Wrong Choice 3</label>
                                <input type="text" class="form-control" id="wrong_choice_3id" placeholder="Wrong_choice_3" name="wrong_choice_3" />
                                <p class="help-block text-danger"></p>
                            </div>  <div class="form-group controls">
                                <label>Wrong Choice 4</label>
                                <input type="text" class="form-control" id="wrong_choice_4id" placeholder="Wrong_choice_4" name="wrong_choice_4" />
                                <p class="help-block text-danger"></p>
                            </div>
                        <div class="row">
                            <div class="form-group ">
                               <button style="border-radius: 0px; background-color: rgb(42, 202, 226); border-color: rgb(42, 202, 226);WIDTH:100%" value="submit" name="submit_1" type="submit" class="btn btn-info pull-right">SUBMIT</button>
                            </div>
                        </div>
                    </form>
	
	
	
	
	
	  </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php

include('layout/nav_1.php');

?>

   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px";>
    <section id="portfolio">
        <div class="container">
            <div class="row">
			
  <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">list Of Quiz</h2>
   <hr class="star-primary">
   <div class="row">
   <div class="col-xs-1 pull-left">

  <a type="button" class="btn btn-primary btn-md " href="dashboard_soal_add.php">
 <strong> Add Quiz </strong>
</a> 
 </div>
   <div class="col-xs-1 pull-left">

  <a type="button" class="btn btn-success btn-md" href="dashboard_show.php">
 <strong> Show </strong>
</a> 
 </div>
    <div class="col-xs-1 pull-left">
    <button type="button" class="btn btn-info btn-md btn-md" class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#myModal_4">
	<strong > Help</strong>
	</div>
	
	
   </div>
   
   
  <div class="col-md-12">
         <!-- Button trigger modal -->

<br>
<br>
<style>
p {
    font-size:14px;
}


</style>
    <table class="table table-striped" style="">
              <thead>
                <tr >
                  <th>No</th>
                 <th style="width: 500px;">Question</th>
                  <th  style="width: 100px;">Answer</th>
                  <th  style="width: 100px;">choice 1</th>
                  <th  style="width: 100px;">choice 2</th>
                  <th  style="width: 100px;">choice 3</th>
                  <th  style="width: 100px;">choice 4</th>
                  <th  style="width: 100px;">action</th>
				  
                  
                </tr>
              </thead>
              <tbody>
						<?php
$no=1;
$result = mysqli_query($con,"SELECT * FROM soal ORDER BY id ASC") 
or die(mysqli_error());  
if(!$result){
echo "not connect";
}

// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
  
?>
                <tr>
				
				 <td><?php echo $no++;?></td>
			   	<td><?php echo $row['question'];?></td>
				 <td><?php echo $row['answer'];?></td>
				 <td><?php echo $row['choice_1'];?></td>
				 <td><?php echo $row['choice_2'];?></td>
				 <td><?php echo $row['choice_3'];?></td>
				 <td><?php echo $row['choice_4'];?></td>
                 <td>
<a class="btn btn-info btn-sm" 
 href="dashboard_soal_edit.php?id=<?php echo $row['id'];?>">
<span class="glyphicon glyphicon-edit"></span>
</a>
				 ||
				
				 
<button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#myModal" data-whatever12="<?php echo $row['id'] ?>">
<span class="glyphicon glyphicon-trash"></span>
</button>  </td>
                  </tr>
<?php } ?>
              </tbody>
            </table>
         
   </div>
  
   </div><!--ROW--->

	</div>
 </section>
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
<script>
	$('#myModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var recipient = button.data('whatever')
	  var recipient12 = button.data('whatever12')
	  var modal = $(this)
	  modal.find('.modal-body p strong').text(recipient)
	  modal.find('.modal-footer form input').val(recipient12)
	})    
	</script>
	<script>
	$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('question');
     var Id = $(this).data('id');
     var myBookId_1 = $(this).data('answer');
     var myBookId_2 = $(this).data('choice_1');
     var myBookId_3 = $(this).data('choice_2');
     var myBookId_4 = $(this).data('choice_3');
     var myBookId_5 = $(this).data('choice_4');
     $(".modal-body form #questionid").val( myBookId );
     $(".modal-body form #editid").val( Id );
     $(".modal-body form #answerid").val( myBookId_1 );
     $(".modal-body form #wrong_choice_1id").val( myBookId_2 );
     $(".modal-body form #wrong_choice_2id").val( myBookId_3 );
     $(".modal-body form #wrong_choice_3id").val( myBookId_4 );
     $(".modal-body form #wrong_choice_4id").val( myBookId_5 );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
	</script>
</body>

</html>