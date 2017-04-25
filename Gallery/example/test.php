<?php

echo "test";
$dir = "/var/www/html/upload/";
$baseUrl = "http://192.168.74.131/upload/";
echo $dir.$baseUrl;

	if (is_dir($dir)){
		if ($dh = opendir($dir)){
			while (($file = readdir($dh))!= false){
				if($file != "." && $file != ".."){
					//文件名的全路径 包含文件名
					$filePath = $baseUrl.$file;
					echo $filePath;
					//echo "<br>";
					echo "<img src='".$filePath."'>";
					echo "<br>";
				}
			}
			closedir($dh);
		}
	}


?>