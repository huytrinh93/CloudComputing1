<?php

	$dir = "/var/www/html/Gallery/images/";
	
	$baseUrl = "http://192.168.74.131/Gallery/images/"

	if (is_dir($dir)){
		if ($dh = opendir($dir)){
			while (($file = readdir($dh))!= false){
				//文件名的全路径 包含文件名
				$filePath = $baseUrl.$file;
				echo "<a href='#'><img src='".$baseUrl".'><div>".$file."</div></a>";
			}
			closedir($dh);
		}
	}

?>