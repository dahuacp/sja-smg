<?php
	include "session.php";	    
	
	$src = "foto_pegawai/$s_id.jpeg";
?>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $src?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $s_nama;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->