<?


require("paths.php");
require("icubefunctions.php");
$delimeter="$?^?$";


session_start();


$delimeter="$?^?$";

$ref= $_SERVER['HTTP_REFERER'];



$project_name = trim($_POST['project_name']);



$OS = strtoupper(PHP_OS);
$docroot = str_replace(basename(__FILE__), "", __FILE__);
$disabled = strtoupper(ini_get("disable_functions"));
$gallery_type;$errormsg;


$tfversion = "tf" . $version ;

//$project_name= "Accountant";


$source_zipurl = "http://addons.trendyflashdownload.com/trendyapp1.0/downloads/projects_gallery/"  . $project_name . "/appuser.zip";


//$sourceurl = str_replace("resources","downloads",$sourceurl);


//$tmpsourceurl =  str_replace("http://","",$sourceurl);
//$sourcearry = explode("/",$sourceurl);
//$project_name= $sourcearry[count($sourcearry)-1];



	if ( ini_get('allow_url_fopen') ==  ( "1"  || "On" || "on"  || "true" ) ) {
					$responsevar  = "ok";
	}else{
			$responsevar  = "fail";
	 		$errormsg="Turn allow_url_fopen on in this Server's php.ini to download designs";
	}
		
	if ( eregi('SHELL_EXEC', $disabled) ) {
				
			$errormsg="SHELL_EXEC has been disabled on this server.Remove the SHELL_EXEC command from the disable_functions list in this Server's php.ini" ;
			$responsevar  = "fail";
	}




if($responsevar!== "fail"){

				
			if(!file_exists("tmp")){
						mkdir("tmp");
			}


			/*if(file_exists("tmp/files")){
					//$folderdeleted = deldir("tmp/files");
					mkdir("tmp/files");

			}else{
						mkdir("tmp/files");
			}
				
				*/
			
			$localpath_zipfiles = "tmp/appuser.zip";
			$chdirpath = "tmp/";
			
			$isdownloaded_zip=download($source_zipurl, $localpath_zipfiles);
				
				
				if ( eregi("WIN", $OS) ){
								
										$localpath_unzipexe =   "tmp/unzip.exe";
										$source_unzipexepath = "http://addons.trendyflashdownload.com/";
										$isdownloaded_exe=download($source_unzipexepath . "unzip_exe/unzip.exe" , $localpath_unzipexe);
										//$chdirpath_path= $docroot . "tmp\files";
										//echo "chdirpath_path=" .$chdirpath_path;
										
										$chdir = chdir($chdirpath); sleep("5");
										$extract = shell_exec("unzip.exe -o appuser.zip "); sleep("5");
										if(file_exists("appuser.zip")){
											unlink("appuser.zip");
										}
										
										if(file_exists("tmp/unzip.exe")){
											unlink("tmp/unzip.exe");
										}
										
										
										//$chdir = chdir($docroot); sleep("5");
										//unlink("files.zip" );
										
										//echo "unlink path=" .$localpath_mobiledesignfile . ".zip" ;
										
										
										
								}else{
							
										
										
										$chdir = chdir($chdirpath); sleep("5");
										$extract = shell_exec("unzip -o appuser.zip"); sleep("5");
										if(file_exists("appuser.zip")){
											unlink("appuser.zip");
										}

										//$chdir = chdir($docroot); sleep("5");
										//unlink("files.zip");
										//if($extract==""){
											//	 $responseextract = extractzip("url=" . $root . "/builder/tmp/files/extract.php");
												 
										//}		 
										
										
										
										//if($extract=="" && $responseextract==""){
											//	$errorresponse="failed";
												
										//}
										 
										 										   
								
								}		


$chdir = chdir($docroot);

if(!file_exists($userpath))	{
		mkdir($userpath);

}			

	copyr($chdirpath,$userpath);								

			echo "&responsevar=success&";
			echo "&downloadmessage=Downloading complete.Click on ok to load the project  !&";


}else{

			echo "&responsevar=failed&";
			echo "&downloadmessage=Download Failed !&";

}
/// end of responsevar =ok check


function download($remotepath,$localpath){

//echo $remotepath . "<br>";
//echo $localpath . "<br>";

global $gallery_type;
global $errormsg;

 if ( !$fpremote = fopen($remotepath,"r") ) {
        $errormsg = "Downloading Failed.Please contact Support";
         
     }

      // create local file
      if ( !$fplocal = fopen($localpath,"w") ) {
       		$errormsg = "Check the permissions on the  folder '" .$gallery_type . "' The permissions should be set to 777 for downloading." ;
         //$this->msg .= "Check the permissions on the <strong>[".$this->local['dir']."]</strong> folder.  The permissions should be set to 777 for installation.";
         //return false;
      }
	  
	  
	  //echo "errormsg=" . $errormsg;
	  
		if($errormsg==""){
		
		//echo "not in error";
		
      			// read remote and write to local
      			while (!feof($fpremote)) {
           				$output = fread($fpremote,1024);
						//echo "output=" . $output ;
						
		   				fputs($fplocal,$output);
      			}
				      fclose($fpremote);
      				  fclose($fplocal);
					  
					  //echo "downloaded true";
	  				 return  true;
	  	}else{
				return false;
		}

}


function deldir($path)
{

$d = dir($path);
 while($entry = $d->read()) { 
  	if ($entry!= "." && $entry!= "..") { 
		   unlink($path ."/". $entry); 
    }else{
	
			deldir($entry);
	}
 } 

	$d->close();
	rmdir($path);  
	return 1;
	
	  
}	  



function copyr($source, $dest) {   
  // Check for symlinks 
      if (is_link($source)) {  
	         return symlink(readlink($source), $dest);  
	  }       // Simple copy for a file  
	  
	     if (is_file($source)) { 
		         return copy($source, $dest); 
		   }       // Make destination directory 
		   
		if (!is_dir($dest)) {
		       mkdir($dest);
		 }       // Loop through the folder    
		  $dir = dir($source); 
		    while (false !== $entry = $dir->read()) {
			         // Skip pointers        
				  if ($entry == '.' || $entry == '..') { 
				           continue;  
				    }           // Deep copy directories        
				 copyr("$source/$entry", "$dest/$entry"); 
				    }       // Clean up    
					 $dir->close(); 
			    return true; 
				
} 

?>