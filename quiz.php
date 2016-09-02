<?php
include ('koneksi.php');

session_start();
date_default_timezone_set('Asia/Jakarta');
if(empty($_SESSION['id'])){
}
else{
$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM registration WHERE user='$id'");



}

$index="actives";
?>
<!DOCTYPE html>
<html lang="en">
<!---------CREATED BY RIZKI------->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCTIPIPB</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/non-responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="css/non-responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="background-image:url('assets/images/bg-1.png');padding-bottom:0px;padding-top:26px;">

 <?php
 
 include('layout/nav.php');

 
 
 ?>

    <!-- Header -->
	

   


        <div class="container" style="width:1040px;">
		<img src="assets/images/logo.png" class="pull-left" style="position:absolute" height="90px">
<!-------QUIZ SECTION-------------------->
  <h2 class="text-center" style="margin-top: -60px;margin-bottom: 30px;">Daftar Soal</h2>

		<?php
$db_username = 'root'; // Your MYSQL Username.
$db_password = ''; // Your MYSQL Password.
$db_name = 'kuis'; // Your Database name.
$db_host = 'localhost';
 
$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('Error: Could not connect to database.');


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

$startpoint = (($page * $per_page) - $per_page);

$statement = "soal ORDER BY `id` DESC" ; // Change `records` according to your table name.
 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) {
    
	// displaying records.
    while ($row = mysqli_fetch_array($results)) {?>

<p><?php echo $row['question'];?></p>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
   <?php echo $row['answer'];?>
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
   <?php echo $row['choice_1'];?>
  </label>
</div>


    <?php }
 
} else {
     echo "No records are found.";
}

 // displaying paginaiton.
echo pagination($statement,$per_page,$page,$url='?');
?>
   
   
   
   
   














<!---------------THE END OF QUIZ-------->
<div class="well well-lg" style="height:90px;border-radius: 0px;width: 990px;margin-left: 5px;margin-top:0px">
	 		 <h6 class="pull-left" style="margin-top: -20px; margin-bottom: 5px;">Supported By</h6>	
		 <div class="row">

					<?php
			
$no=1;
$value=1;
$number=1;
$result = mysqli_query($con,"SELECT * FROM sponsor") 
or die(mysqli_error());  


// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
  
?>
           
   <!---IKLAN 1---->
         <div class="col-xs-2">
		
       	<?php
			$query=mysqli_query($con,"SELECT * FROM sponsor WHERE number=$no")
			or die(mysqli_error());
			while($row = mysqli_fetch_assoc($query)){
			?>
			
		<a href="<?php echo $row['link'];?>" target="_blank">	<img class="img-rounded" src="process/<?php echo $row['images_path'];?>" alt="http://W3Schools.com" height="60px" width="60px" style="padding-top:10px;padding-bottom:10px"></a>
		
			<?php } ?>                     
		
			
			</div>
	<!--------THE END OF IKLAN 1---->
<?php $no++;}  ?>
               
                </div>
</div>
</div>

	<style>
			#footer {
		
		
		
		height:60px;			/* Height of the footer */
		background:#2ACAE2;
	}
	/* other non-essential CSS */
	#header p,
	#header h1 {
		margin:0;
		
	}
	#footer p {
		margin:0;
		
			
			
			</style>
   <div id="footer">
		<!-- Footer start -->
<!-----THIS IS FOOTER----->
	<p style="padding:0px;padding-top:12px;padding-left:180px;color:white;font-size:14px">Copyright @2014 LCTIP IPB,All rights reserved</p>
	<p style="padding:0px;padding-left:180px;color:white;font-size:14px">Follow us on Twitter,Facebook and blog</p>

		<!-- Footer end -->
	</div>

      
    </section>
	


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->


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