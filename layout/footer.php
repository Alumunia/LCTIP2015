

<div class="well well-lg" style="height:90px;margin-bottom:30px;border-radius: 0px;width: 1040px;margin-left: 5px;">
	 		 <h6 style="margin-top: -20px; margin-bottom: 5px;">Supported By</h6>	
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
         <div class="col-md-2">
		
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
		position:absolute;
		bottom:0;
		width:100%;
		height:60px;			/* Height of the footer */
		background:#2ACAE2;
	}
	/* other non-essential CSS */
	#header p,
	#header h1 {
		margin:0;
		padding:10px 0 0 10px;
	}
	#footer p {
		margin:0;
		padding:10px;
			
			
			</style>
   <div id="footer">
		<!-- Footer start -->
	
	<p style="padding:0px;padding-top:12px;padding-left:120px;color:white;font-size:14px">Copyright @2014 LCTIP IPB,All right reserved</p>
	<p style="padding:0px;padding-left:120px;color:white;font-size:14px">Follow us on Twitter,Facebook and blog</p>

		<!-- Footer end -->
	</div>
