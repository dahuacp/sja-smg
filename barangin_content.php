<?php	
	include "koneksi.php";
	include "session.php";
	include "file_fn.php";
?>


<form id="form" class="form-horizontal form-label-left">

                            <div id="div_tambah"></div>						
							<div id="div_data"></div>	
							<div id="div_refresh_data"></div>					
							<div id="div_sql"></div>	
							
					
</form>					
					
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
 
	$(document).ready(function(){

		$("#div_refresh_data").click(function(){	
   			$("#div_data").html("");
			$.ajax({
    			type:"POST",
    			url:"barangin_data.php",    
				beforeSend: function(msg){  $("#div_data").html('<img src="LoaderIcon.gif"><h4>Loading...</h4>');},	 
    			success: function(msg){   
    			    $("#div_data").html(msg);			
    			}  
   			})     			
		});
		
		$("#div_refresh_data").click();
		
	});

    
  </script>  		
    