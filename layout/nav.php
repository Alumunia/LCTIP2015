
   <!-- Navigation -->
   <div class="row">
   <div class="col-md-7">
   
	</div>
	<div class="col-md-3">
			<nav class="navbar navbar-default navbar-fixed-top" style="height: 0.00001px; min-height: 20px; padding: 0px;">
			<div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="
    padding-top:20px;
    background-color: #2ACAE2;
	margin-right:-10px;
">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll <?php echo $index;?>">
                        <a href="index.php">HOME</a>
                    </li>
					<li style="margin-left: -17px;margin-right: -17px;">
					<a>|</a>
					</li>
					<?php if (isset($_SESSION['id'])) {?>
				 <li class="page-scroll">
                        <a href="logout.php">Logout</a>
                    </li>	
               <?php } else{ ?>
					<li class="page-scroll <?php echo $pendaftaran;?>">
                        <a href="registration.php">PENDAFTARAN</a>
                    </li>
                  <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
		</nav>
	</div>
 <div class="col-md-2">
   
	</div>
</div>
        <!-- /.container-fluid -->