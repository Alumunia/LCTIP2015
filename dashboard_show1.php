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

<?php

include('layout/nav_1.php');

?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        This is Just a Simulation :)      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
   
    <!-- Header -->
	<div class="col-md-12" style="BACKGROUND-COLOR: WHITE;padding-top:84px;background-image:url('assets/images/bg-1.png')";>
    <section id="portfolio">
<div class="container" style="background-color:white;width:1000px">
            
                    <h2 class="text-center" style="margin-top: -150px;margin-bottom: 30px;">Simulation</h2>
          <hr class="star-primary">
            <div class="row">
<a type="button" class="btn btn-default btn-md" href="dashboard_soal.php">
 <strong> Back </strong>
</a> 
<form action="" method="post" id="quiz">
<ol style="font-weight:bold">
	<?php
include('koneksi.php');

// Pagination Function
function pagination($query,$per_page=10,$page=1,$url='?'){   
    global $conDB; 
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conDB,$query));
    $total = $row['num'];
    $adjacents = "2"; 
     
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
	$lastlabel = "Last &rsaquo;&rsaquo;";
     
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
     
    $prev = $page - 1;                          
    $next = $page + 1;
     
    $lastpage = ceil($total/$per_page);
     
    $lpm1 = $lastpage - 1; // //last page minus 1
     
    $pagination = "";
    if($lastpage > 1){   
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
             
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
             
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
         
        } elseif($lastpage > 5 + ($adjacents * 2)){
             
            if($page < 1 + ($adjacents * 2)) {
                 
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                     
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                 
            } else {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
         
            if ($page < $counter - 1) {
				$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
			}
         
        $pagination.= "</ul>";        
    }
     
    return $pagination;
}
		
		
		
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 4; // Set how many records do you want to display per page.

$startpoint = (($page * $per_page) - $per_page) + 0;

$statement = "`soal` ORDER BY id DESC" ; // Change `records` according to your table name.
 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) { 

$no=0;

// displaying records.
    while ($row = mysqli_fetch_array($results)) {
	$no++;?>
			

		

			
 <p style="margin-top:30px"><strong><?php echo $no;?>.<?php echo $row['question'];$row12=$row['question'];?></strong></p>

 <?php
$result1 = mysqli_query($con,"SELECT * FROM soal WHERE question='$row12' ORDER BY id") 
or die(mysqli_error());  
if(!$result1){
echo "not connect";
}


// output data of each row
while($row = mysqli_fetch_array( $result1 )) {
$answer=$row['answer'];
$choice_1=$row['choice_1'];
$choice_2=$row['choice_2'];
$choice_3=$row['choice_3'];
$choice_4=$row['choice_4'];
$imgs = array($row['answer'],$row['choice_1'],$row['choice_2'],$row['choice_3'],$row['choice_4']);
shuffle( $imgs );

?>
<div>
  <label>
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios1" value="<?php echo $imgs[0]; ?>" >
    A. <?php echo $imgs[0]; ?>
  </label>
</div>
<div>
  <label>
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadio2" value="<?php echo $imgs[1]; ?>" >
    B. <?php echo $imgs[1]; ?>
  </label>
</div>
<div>
  <label>
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios3" value="<?php echo $imgs[2]; ?>" >
    C. <?php echo $imgs[2]; ?>
  </label>
</div>
<div>
  <label>
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios4" value="<?php echo $imgs[3]; ?>" >
   D. <?php echo $imgs[3]; ?>
  </label>
</div>
<div>
  <label>
    <input type="radio" name="optionsRadios<?php echo $no;?>" id="optionsRadios5" value="<?php echo $imgs[4]; ?>" >
   E. <?php echo $imgs[4]; ?>
  </label>
</div>
</li>
 
  <?php }
 
}} else {
     echo "No records are found.";
}

 // displaying paginaiton.
echo pagination($statement,$per_page,$page,$url='?');
?>


           
			  
			</form>
<div class="col-xs-5"></div>
<div class="col-xs-2">			
			<div class="form-group ">
                               <button style="border-radius: 0px; background-color: rgb(42, 202, 226); border-color: rgb(42, 202, 226);WIDTH:100%"  class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">SUBMIT :)</button>
                            </div>
                            </div>
<div class="col-xs-5"></div>
			</div>
		
 </section>
 </div>
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

</body>

</html>