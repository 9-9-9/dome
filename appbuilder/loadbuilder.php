<?

	include("functions.php");
	include("paths.php");

	/*	$delimeter="$?^?$";
		$licenseinfotxt=ioncube_read_file($licensefilepath);
		$licenseinfoarry=explode($delimeter,$licenseinfotxt);
		$username_license = $licenseinfoarry[0];
		$password_license = $licenseinfoarry[1];
		$email = $licenseinfoarry[2];
		$domainname= $licenseinfoarry[3];
		$producttype= $licenseinfoarry[4];
		$product= $licenseinfoarry[5];
		$status= $licenseinfoarry[6];
		$creationdate= $licenseinfoarry[7];
		$orderid= $licenseinfoarry[8];
		
		
		
		$currentdate   = getdate();
		$year_currentdate  = $currentdate['year'] ;
		$month_currentdate = $currentdate['mon'] ;
		$day_currentdate = $currentdate['mday'] ;
		
		
		$creationdatearry = explode("-",$creationdate);
		$year_creationdate =  $creationdatearry[0];
		$month_creationdate=  $creationdatearry[1];
		$day_creationdate=$creationdatearry[2];
		
		$d1=mktime(0,0,0,$month_currentdate,$day_currentdate,$year_currentdate);
		$d2=mktime(0,0,0,$month_creationdate,$day_creationdate,$year_creationdate);
		$daysdiff = floor(($d1-$d2)/86400) ;


		//if( ($producttype=="trial" || $status=="expired") && $daysdiff>10 ){
					//$errormsg = "Your trial account has expired." . "<br>";
					//$inerror="true";
		if($status=="suspended"){
			  		$errormsg = "Your Account has Suspended." . "<br>";
					$inerror="true";
				
		}
	*/		
		
	//if($inerror!="true"){					


		$width = $_GET['width'];
		$height =  $_GET['height'];
	
	//if(file_exists('../basepath.txt')){
	
		//$fhandle = fopen('../basepath.txt', "rb");
		//while (!feof($fhandle) ) {
			//$basepath = fgets($fhandle);
		//}
	
	
	session_start(); 
	
	$_SESSION['domainname'] = "apps.trendyflash.com";
	
	$domainname = $_SESSION['domainname'];

	
	if(file_exists($projectpath . "/baseproject.swf")){
			$mode="edit";
	}
	else{
			$mode="new";
	}
	
	
	//if ($domainname =="") {
   
		//			echo "Session has Expired.Close the Builder and login again !";
  	//}
	//else 
	//{
	
		include("accessdb.php");
		
		dataConn();		
			
			
			$result =mysql_query("select * from tbl_trendyapps_appinfo where domainname='".$domainname."'");
			if (!$result) 
			   die('<font color=red>Invalid query: ');		
	
					
			$rcount=mysql_num_rows($result);
	
			if ($rcount!=0) 
			{
				while($row=mysql_fetch_array($result))
				{
					$apptitle = $row["apptitle"];
				}
				
			}		

			if (strlen($apptitle)==0){
				$apptitle = "Trendy App";
			}
		/*if($license=ioncube_license_properties()){
			$_new = array();
			foreach ($license as $key => $value) {
    				//$_new[$_key] = $_value["value"];
				if ($key=="product"){
						$product= ${$key} = $value['value'];
				}	
				elseif 	($key=="producttype"){
						$producttype= ${$key} = $value['value'];
				}
				elseif 	($key=="avplayerenabled"){
						$avplayerenabled= ${$key} = $value['value'];
				}
				elseif 	($key=="storetype"){
				$storetype= ${$key} = $value['value'];
				}
	       }
		   
		}*/

				$randomNum=rand(1, 10000)+1;
				
				
				$isdirexists_user = file_exists($userpath);
				if (!$isdirexists_user){
						mkdir($userpath);

				}

				$isdirexists_imagespath = file_exists($imagespath);
				if (!$isdirexists_imagespath){
						mkdir($imagespath);

				}

				$isdirexists_themepath = file_exists($themepath);
				if (!$isdirexists_themepath){
						mkdir($themepath);

				}
				
				$isdirexists_musicpath = file_exists($musicpath);
				if (!$isdirexists_musicpath){
						mkdir($musicpath);

				}

				$isdirexists_videopath = file_exists($videopath);
				if (!$isdirexists_videopath){
						mkdir($videopath);

				}
				
				
				$isdirexists_appiconpath = file_exists($appiconpath);
				if (!$isdirexists_appiconpath){
						mkdir($appiconpath);

				}

				//echo "apptitle: " .  $apptitle;
 ?>
 
 
 
						<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
						  
						<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transi  tional//EN" 	"http://www.w3.org/TR/html4/loose.dtd"> -->
						<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
						<!--<html> -->
						<head>
						<title>Trendy App Builder </title>
						<script src="include/detect.js" language="javascript"></script>
						<script language="JavaScript" type="text/javascript">
					<!--
						// -----------------------------------------------------------------------------
						// Globals
						// Major version of Flash required
						var requiredMajorVersion = 8;
						// Minor version of Flash required
						var requiredMinorVersion = 0;
						// Minor version of Flash required
						var requiredRevision = 0;
						// -----------------------------------------------------------------------------
					// --></script>
					<style type="text/css">
					<!--
					body {
						background-color: #000000;
					}
					.orng {
						color: #FF9900;
						font-family: Arial, Helvetica, sans-serif;
						font-weight: bold;
						font-size: 16px;
					}
					.gray {color: #CCCCCC; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; }
					-->
					</style>
					</head>
					<body bgcolor="#000000" TOPMARGIN="0" LEFTMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
						
						<!-- FLASH OBJECT -->
					 <div class="bodyText">
				<script language="JavaScript" type="text/javascript">
					<!--
				// Version check based upon the values entered above in "Globals"
					var hasReqestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
				// Check to see if the version meets the requirements for playback
				if (hasReqestedVersion) {
				
				
					document.write ('<OBJECT classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000  codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=8,0,22,0"  ID=sitecube WIDTH="100%" HEIGHT="100%" >');
					document.write('<PARAM NAME=movie VALUE="tdc.swf?invokemode=<?=$mode?>&randomNum=<?=$randomNum?>&uploadbasepath=<?=$root?>&apptitle=<?=$apptitle?>">');
					document.write('<PARAM NAME=quality VALUE=high>');
					document.write('<PARAM NAME=scale VALUE=noscale>');  
					document.write('<PARAM NAME=align VALUE=middle>');
					document.write('<PARAM NAME=menu VALUE=false>');
					document.write('<PARAM NAME=allowscriptaccess VALUE=always>');
					
					document.write('<PARAM NAME=bgcolor VALUE=#000000>');  
					<!--document.write('<PARAM NAME=allowscriptaccess VALUE=always>');   -->
					
					
					document.write('<EMBED name=sitecube src="tdc.swf?invokemode=<?=$mode?>&randomNum=<?=$randomNum?>&uploadbasepath=<?=$root?>&apptitle=<?=$apptitle?>"  allowscriptaccess="always" menu="false" quality="high" bgcolor="#000000" WIDTH="100%" HEIGHT="100%" scale="noscale" align="middle" TYPE="application/x-shockwave-flash"  PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">');
			    	document.write('</EMBED></OBJECT>');					
					
						
					
					

				} else {  // flash is too old or we can't detect the plugin
			 		document.write('<table width="100%" height="100%" align="center" cellpadding="0" cellspacing="0"><tr>'); 
					document.write('<td height="380" align="center" valign="middle"><span class="gray">');
			 		document.write('You need flash player 8 or above to use the Website Builder.</span><br><strong>');
			 		document.write('<a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank"'); 		
			 		document.write('class="orng">Please click here to get the latest Flash Player.</a></strong></td></tr></table>');
			//document.write(alternateContent);  // insert non-flash content
		  }
		// -->
		</script>

</div>


		  <!-- END FLASH OBJECT -->
			
						
						</body>
						</html>
						
<? 
//}

//}else{

//echo "Error ";
//}
?>