

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">    
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
	       
	       
	       
               <?php 
               if ( $_SESSION['netdispen_tipe']>1)
	       { ?>
	       <li><a><i class="fa fa-file-text-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="saldo.php"><i class="fa fa-check"></i>Saldo</a></li>	
						<li><a href="rekap.php"><i class="fa fa-check"></i>Rekap</a></li>
                        
                    </ul>
                </li>
	       <?php }
	       else
	       {
	       
                    if($_SESSION['netdispen_nama']=="ADMIN")
                {
                    ?>   
                <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="pegawai.php"><i class="fa fa-users"></i>Master User</a></li>                  
                    </ul>
                </li>
				                <?php
		}
                ?>
                <li><a><i class="fa fa-database"></i> IN Barang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                
                <li><a href="segelin.php"><i class="fa fa-cube"></i>Barang Masuk</a></li>	  
                <li><a href="barangin.php"><i class="fa fa-cube"></i>Detil Barang Masuk</a></li>        
					  
                    </ul>
                </li>
                    
				<li><a><i class="fa fa-check-square"></i> OUT Barang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="barangout.php"><i class="fa fa-check"></i>Barang Keluar</a></li>	
						<li><a href="detil_barangout.php"><i class="fa fa-check"></i>Detil Barang Keluar</a></li>	                	  
                    </ul>
                </li>
				<li><a><i class="fa fa-file-text-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="saldo.php"><i class="fa fa-check"></i>Saldo</a></li>	
						<li><a href="rekap.php"><i class="fa fa-check"></i>Rekap</a></li>
                        
                    </ul>
                </li>
<?php }?>
				</ul>
				
              </div>			  		

            </div>
            <!-- /sidebar menu -->


        