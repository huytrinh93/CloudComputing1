<?php

	// ini_set('display_error',1);
	// error_reporting(E_ALL);
	define("UPLOAD_DIR","/opt/lampp/htdocs/cc/upload/");
	//echo "hello world";
	function background_exec($command)
	{
		if (substr(php_uname(),0,7) == "Linux")
		{
			// do nothing
		}else{
			exec($command . ' 2>&1 > /dev/null &');
		}
	}


	//$filePointer = fopen("debugTest.txt","w");
	if (!empty($_FILES["img"])) 
	{
    	$myFile = $_FILES["img"];
 		

    	if ($myFile["error"] !== UPLOAD_ERR_OK) 
    	{
        	echo "<p>An error occurred.</p>";
        	//fwrite($filePointer, "<p>An error occurred.</p>");
        	//fclose($filePointer);
        	exit;
    	}
 
    	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    	$success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
    	//if (!$success) 
    	//{ 

        //	echo "<p>Unable to save file.</p>";
        //	fwrite($filePointer, "<p>Unable to save file.</p>");
        //	fclose($filePointer);
        //	exit;
    	//}
    	//fclose($filePointer);
	}
	//}else
	//{
	//	fwrite($filePointer, "<p>No Image.</p>");
	//	fclose($filePointer);
	//}
	
	//echo $path;
	
	//echo shell_exec("python face_regconize.py database/ upload/test.jpg 2>&1");

	//echo "face_recognition database/ upload/".$name." 2>&1";
 
	//echo shell_exec("face_recognition database/ upload/".$name." 2>&1");
	echo shell_exec("python m_face_recog.py database/ upload/".$name." 2>&1");
	//echo shell_exec("face_recognition database/ upload/".$name." | cut -d ',' -f2 2>&1");


?>
