<?php
session_start();
if(!isset($_SESSION['netdispen_username'])){	
	echo "<script> window.location='login.php'</script>";	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include "file_title.php";?>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style>.right_col,#printableArea,.rekap-table-wrap{max-width:100%;min-width:0;overflow:hidden}.rekap-table-wrap{width:100%;overflow:auto}.rekap-table-wrap .dataTables_wrapper{width:100%;max-width:100%}</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
		  
            <?php include "file_index.php"; ?>

            <div class="clearfix"></div>

            <?php include "menu_user.php"; ?>
			<br/>
            <?php include "menu.php"; ?>

          </div>
        </div>

        <?php include "index_profile.php"; ?>
		
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>&nbsp;</h3>
              </div>
            </div>

            <div class="clearfix"></div>
				<?php
					include "rekap_content.php";
				?>	
		
		
		</div>
        <!-- page content -->
		
		<?php include "footer.php";?>
		
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
