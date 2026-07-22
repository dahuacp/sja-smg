<?php

	include "session.php";		
	include "koneksi.php";
 	include "file_fn.php";	

    
    $cb_pegawai = $s_id;	
	
                    	$sql = "	SELECT	p.*								
                    				FROM	user p
									WHERE	p.U_ID = $cb_pegawai 	";
                    	//echo $sql;			
                    	$sql = mysqli_query($con,$sql);
                    	while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                    		$d_id = $data["U_ID"];	
                    		$d_nama = $data["U_NAMA"];	
						}
						
						$J = time();
						
						$src = "foto_pegawai/" . $d_id . ".jpeg";   
  
?>

				
				<input type="hidden" name="cb_pegawai" id="cb_pegawai" value="<?php echo $d_id?>">		
				
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo$src?>?<?php echo$J?>" alt=""><?php echo $d_nama;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="account.php"> Account</a></li>
                    <li><a href="gambar.php"> Pic</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

						

						