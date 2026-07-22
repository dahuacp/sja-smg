<?php
	
	include "session.php";
	include "koneksi.php";	
	
	
				$nama_file = $s_id . ".jpeg";

				if(!empty($_FILES['exampleInputFile']['tmp_name']))
				{
					$upload = move_uploaded_file($_FILES['exampleInputFile']['tmp_name'], 'foto_pegawai/'.$nama_file);
					if($upload)
					{
						echo "1";
					}else{
						echo "0";
					}
				}

?>

