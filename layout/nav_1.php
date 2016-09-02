    <!-- Navigation -->
	
<?php	date_default_timezone_set('Asia/Jakarta');?>
<style>
navbar-collapse.collapse {
display: block!important;
}

.navbar-nav>li, .navbar-nav {
float: left !important;
}

.navbar-nav.navbar-right:last-child {
margin-right: -15px !important;
}

.navbar-right {
float: right!important;
}
.actives>a {

font-size:50px;
}

	
	
	</style>

	   <nav class="navbar  navbar-inverse" style="background-color:#2E3092">
     
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
       <div id="navbar" class="collapse navbar-collapse" style="
    background-color: #3498DB;
">
          <ul class="nav navbar-nav">
            <li class="page-scroll <?php echo $daftar_Peserta;?>">
                        <a href="dashboard.php">Daftar Peserta</a>
                    </li>
					<li class="page-scroll  <?php echo $sponsor;?>">
                        <a  class="<?php echo $sponsor;?>" href="dashboard_sponsor.php">Sponsor</a>
                    </li>
					<li class="page-scroll  <?php echo $pengumuman;?>">
                        <a  class="<?php echo $pengumuman;?>" href="dashboard_pengumuman.php">Pengumuman</a>
                    </li>
					<li class="page-scroll  <?php echo $soal;?>">
                        <a href="dashboard_soal.php">Soal</a>
                    </li>
					<li class="page-scroll  <?php echo $rank;?>">
                        <a href="dashboard_rank.php">Rank</a>
                    </li>
					<li class="page-scroll  <?php echo $control;?>">
                        <a href="dashboard_control.php">Control</a>
                    </li>
					    <li class="page-scroll">
                        <a href="logout.php">Logout</a>
                    </li>
					
          </ul>
		  <span class="pull-right padnav" style="color:#fff;font-size:17px;padding-top: 25px;" ><strong>Today is: <?php echo date('H:i');?></strong></span>
        </div><!-- /.nav-collapse -->
    </nav><!-- /.navbar -->