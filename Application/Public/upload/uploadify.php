<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
$domain = "uploads";  
// Define a destination


$targetFolder = '/upload/uploads'; // Relative to the root

//$verifyToken = md5('unique_salt' . $_POST['timestamp']);
//$_SESSION['DATA'] = "123";
//if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$tar = "/uploads".'/'.md5(time()).$_FILES['Filedata']['name'];
	if (in_array($fileParts['extension'],$fileTypes)) {
	 $s = new SaeStorage();
	 $s->upload($domain,$tar,$tempFile);
	  $file_url =  $s->getUrl( $domain , $tar); 
	echo $file_url;
	 //$file_url =  $s->getUrl( $domain , $new_file_name); 
	 
		//move_uploaded_file($tempFile,$targetFile);
		
	} else {
		echo 'Invalid file type.';
	}
//}
?>