<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include "file_title.php"; ?>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
     <!--<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

<?php

											$is_login_false = 0;
											$txt_username = '';
											$txt_password = '';
											if(!isset($_SESSION['netdispen_username'])&& isset($_POST["txt_username"])){												
												include "koneksi.php";												
												$txt_username = $_POST["txt_username"];
												$txt_password = $_POST["txt_password"];	
												
                                                $sql_cek = "SELECT * FROM user WHERE U_USERNM = ? AND U_PASS = MD5(?) AND U_IS_DELETE = 0 LIMIT 1";
                                                $stmt = mysqli_prepare($con, $sql_cek);
                                                mysqli_stmt_bind_param($stmt, 'ss', $txt_username, $txt_password);
                                                mysqli_stmt_execute($stmt);
                                                $hasil_cek = mysqli_stmt_get_result($stmt);
															if($data_cek=mysqli_fetch_array($hasil_cek,MYSQLI_ASSOC)){
													$is_login_false = 0;
													$username = $data_cek["U_USERNM"];	
													$id = $data_cek["U_ID"];	
                          $nama = $data_cek["U_NAMA"];
                          $deptx =$data_cek["D_ID"];                                                   						
													$_SESSION['netdispen_username'] = $username;
													$_SESSION['netdispen_id'] = $id;	
                          $_SESSION['netdispen_nama'] = $nama;			
                          $_SESSION['netdispen_tipe'] = $deptx;      
													echo "<script>window.location='index.php'</script>";	
												}else{
													$is_login_false = 1;
												}	
											}
?>			  
	  
	  
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="#" method="post">
              <h2> MUTASI BARANG  PDKB </h2>
									<?php
										if(($txt_username<>"") || ($txt_password<>"")){
											if($is_login_false==1){
									?>			  
			  
                <div class="x_content bs-example-popovers">

                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Login gagal. Cek ulang username dan password.
                  </div>

                </div>         
									<?php
											}
										}
									?>				  
              <div>
                <input type="text" id="txt_username" name="txt_username" class="form-control" placeholder="Username" required="" value="<?php echo $txt_username?>" />
              </div>
              <div>
                <input type="password" id="txt_password" name="txt_password"  class="form-control" placeholder="Password" required="" value="<?php echo $txt_password?>" />
              </div>
              <div>
                    <button type="submit" class="btn btn-primary">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2020 All Rights Reserved. NET ID</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
	
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
  </body>
</html>