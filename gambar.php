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

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>&nbsp;</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pic Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                                    <form action="#" method="post" id="data" enctype="multipart/form-data">		
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <div class="thumbnail">
													<a href="#" data-toggle="modal" data-target="#myModal">
													  <img id="img_scan" class="img-rounded" src="" alt="Dokumen" width="50%">
													</a>	
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                  <div class="modal-dialog modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-body">
                                                        <div align="center">
                                                          <img id="img_scan_modal" class="img-rounded" src="" alt="dokumen" width="50%" height="50%">
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                        </div>								
										<div class="form-group">
													<input type="file" onchange="readURL(this);" name="exampleInputFile" id="exampleInputFile">
                                        </div>							
										<div class="form-group">
                                            <button type="button" id="btn_upload" class="btn btn-primary">Upload</button>
                                        </div>
                                    </form>
				  
                  </div>
                </div>
              </div>
            </div>			
			
          </div>
        </div>
        <!-- /page content -->
		
		<?php include "footer.php";?>
		
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	


<script type="text/javascript">

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_scan')
                  .attr('src', e.target.result)
                        .width(300);

                    $('#img_scan_modal')
                  .attr('src', e.target.result)
                  .width(800);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

$(document).ready(function() { 

        $("#exampleInputFile").on('change', function() {
			var fileInput = $("#exampleInputFile")[0];
			var info=fileInput.files[0];
			
			//untuk mendapatkan extensi file
			var fup = document.getElementById('exampleInputFile');
			var fileName = fup.value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			//alert(ext);
			
			//untuk mendapatkan nama file
			/*var nama=info.name;
			alert(nama);*/
			
			//untuk mendapatkan tipe file
			var type=info.type;
			//alert(type);
			if((ext!='jpg' && ext!='JPG') && (type!='image/jpeg' && ext!='jpeg' && ext!='JPEG')){
			  alert('Maaf, file harus jpg/jpeg');
			  $("#exampleInputFile").val("");
			  $("#exampleInputFile").focus();
			  return false; 
			}
			
			//untuk mendapatkan ukuran file
			var size=info.size;
			//alert(size);
			if(size>=500000){
			  alert('File harus kurang dari 500 Kb');
			  $("#exampleInputFile").val("");
			  $("#exampleInputFile").focus();
			  return false;
			}
		}); 

	$("#btn_upload").click(function(){	
	    var tampung_data = new FormData($("form#data")[0]);//$('form').serialize(); 
        var exampleInputFile = $("#exampleInputFile").val(); 

        if(exampleInputFile==""){
          alert("Upload Pic harus diisi");
          $("#exampleInputFile").focus();
          return false;
        }

		$.ajax({
			type:"POST",
			url:"gambar_simpan.php",    
			data: tampung_data,
            cache: false,
            contentType: false,
            processData: false,
			success: function(msg){
				//alert(msg);
                if(msg==1){
                  alert('Pic berhasil disimpan');
                }else{
                    alert('Maaf. Pic gagal disimpan');
                }    
			}  
		});     			
	});		
		
		
}); 


</script>		
	
	
  </body>
</html>
