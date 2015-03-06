// JavaScript Document


function viewfilename(pathtofile,filetype)
{  


 settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=575,height=600';

window.open ('viewfile.php?pathtofile='+pathtofile+'&filetype='+filetype, 'newWin',settings );

}
function deletefilename(pathtofile,filetype)
{
 settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=460,height=280';
 //window.open('deletefile.asp?filename='+filename+'&type=logo','Sitecube', settings) ;
  window.open ('deletefile.php?pathtofile='+pathtofile+'&filetype='+filetype, 'newWin',settings );
  
}

function getfilepath(pathtofile)
{
 settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=680,height=280';
 //window.open('deletefile.asp?filename='+filename+'&type=logo','Sitecube', settings) ;
  window.open ('getfilepath_webstorage.php?pathtofile='+pathtofile, 'newWin',settings );
  
}

function deletefolder(folderpath,fvar)
{
 settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=460,height=280';

  window.open ('deletefolder.php?folderpath='+folderpath+'&fvar='+fvar, 'newWin',settings );
  
}

function renamefolder(folderpath,fvar)
{


var  folderpath =  encodeURIComponent(folderpath);

settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=580,height=280';
//alert(folderpath);
//alert(fvar);

window.open ('renamefolder.php?folderpath='+folderpath+'&fvar='+fvar, 'newWin',settings );
  
}



function winclose(fvar)
{
//opener.location.href = http_serverpath + "/builder/uploadlogo.asp" ;
window.close();
//window.opener.location.reload();
url  = window.opener.location + "?fvar=" + fvar;
window.opener.location.href = url;


}







function ShowProgressVideo()
{
  strAppVersion = navigator.appVersion;
  
  var  filename = document.MyForm.elements[0].value;
  //alert(filename);
  
var checkstring1 =filename.indexOf("'");
var checkstring2 =filename.indexOf("{");
var checkstring3 =filename.indexOf("}");
var checkstring4 =filename.indexOf("!");
var checkstring5 =filename.indexOf("&");
var checkstring6 =filename.indexOf("+");
var checkstring7 =filename.indexOf("=");
var checkstring8 =filename.indexOf("[");
var checkstring9 =filename.indexOf("]");
var checkstring10 =filename.indexOf("(");
var checkstring11 =filename.indexOf(")");
var checkstring12 =filename.indexOf("~");
var checkstring13 =filename.indexOf("`");
var checkstring14 =filename.indexOf("@");
var checkstring15 =filename.indexOf("#");
var checkstring16 =filename.indexOf("$");
var checkstring17 =filename.indexOf("%");
var checkstring18 =filename.indexOf("^");
var checkstring19 =filename.indexOf(";");

if (checkstring1>0 || checkstring2>0  || checkstring3>0  || checkstring4>0 || checkstring5>0  || checkstring6>0  || checkstring7>0 || checkstring8>0 || checkstring9>0 || checkstring10>0 || checkstring11>0 || checkstring12>0 || checkstring13>0 || checkstring14>0  || checkstring15>0 || checkstring16>0 || checkstring17>0 || checkstring18>0 || checkstring19>0)
{
alert("File name Should not contain special characters.")
return false;
}
else
{
  
  var  errormsgvar =  document.MyForm.errormsgvideo.value;
  //var  errormsgvar = "ok" ;
  

  
  testextpos = filename.lastIndexOf('.');
  lenoffilename = filename.length;
  var reqstring = filename.substring(testextpos,lenoffilename);
  reqstring = reqstring.toLowerCase();
  //alert(errormsgvar);
  //alert(reqstring);
  //alert(document.MyForm.elements[0].value);
  
if (errormsgvar=="ok")
 { 
     if(reqstring==".flv")
      {
         if (document.MyForm.elements[0].value != "" )
          //if (document.MyForm.FILE1.value != "")
          {
			if (strAppVersion.indexOf('MSIE') != -1 && strAppVersion.substr(strAppVersion.indexOf('MSIE')+5,1) > 4)
				{
					//alert("start upload progress");
					
					startUpload();
					return true;
				}
			else
				{
					startUpload();
					return true;
				}
			}
			return true;
  
       }
	 else
	   {
			alert("File should be in flv format");
			return false;
	   }
  
 }
else if (errormsgvar=="video") 
  {
  
			
  			
  	alert("You have reached Maximium limit.Please delete the old file(s) below before uploading a new file.");
			return false;
  	 
  }
  
  
 } 
  
}


function ShowProgressaudio()
{
  strAppVersion = navigator.appVersion;
  
  var  filename = document.MyForm2.elements[0].value;
  
  var checkstring1 =filename.indexOf("'");
var checkstring2 =filename.indexOf("{");
var checkstring3 =filename.indexOf("}");
var checkstring4 =filename.indexOf("!");
var checkstring5 =filename.indexOf("&");
var checkstring6 =filename.indexOf("+");
var checkstring7 =filename.indexOf("-");
var checkstring8 =filename.indexOf("[");
var checkstring9 =filename.indexOf("]");
var checkstring10 =filename.indexOf("(");
var checkstring11 =filename.indexOf(")");

if (checkstring1>0 || checkstring2>0  || checkstring3>0  || checkstring4>0 || checkstring5>0  || checkstring6>0  || checkstring7>0 || checkstring8>0 || checkstring9>0 || checkstring10>0 || checkstring11>0)
{
alert("File name Should not contain special characters.")
return false;
}
else
{

  
  
  var  errormsgvar =  document.MyForm2.errormsgaudio.value;
  //var  errormsgvar = "ok" ;
  
  //alert(filename);
  //alert(errormsgvar);
  
  testextpos = filename.lastIndexOf('.');
  lenoffilename = filename.length;
  var reqstring = filename.substring(testextpos,lenoffilename);
  reqstring = reqstring.toLowerCase();
  //alert(reqstring);
  
  
if (errormsgvar=="ok")
 { 
     if(reqstring==".mp3" || reqstring==".swf" )
      {
         if (document.MyForm2.elements[0].value != "" )
          //if (document.MyForm.FILE1.value != "")
          {
			if (strAppVersion.indexOf('MSIE') != -1 && strAppVersion.substr(strAppVersion.indexOf('MSIE')+5,1) > 4)
				{
					startUpload();
					return true;
				}
			else
				{
					startUpload();
					return true;
				
				}
			}
			return true;
  
       }
	 else
	   {
			alert("File should be in mp3/swf formats");
			return false;
	   }
  
 }
  else if (errormsgvar=="audio")
  {
  if (reqstring!=".mp3" ||  reqstring!=".swf")
  alert("File should be in mp3/swf formats");
  else
  alert("You can upload a maximum of 10 mp3/swf files ");
  return false;
  }
  
  
  }
  
}






function checkchars()

{

var  filename = document.MyForm.submitB.value;
//var  errormsgvar =  document.MyForm.errormsgvideo.value;

//' { }  ! & + - [ ] ( )

var checkstring1 =filename.indexOf("'");
var checkstring2 =filename.indexOf("{");
var checkstring3 =filename.indexOf("}");
var checkstring4 =filename.indexOf("!");
var checkstring5 =filename.indexOf("&");
var checkstring6 =filename.indexOf("+");
var checkstring7 =filename.indexOf("=");
var checkstring8 =filename.indexOf("[");
var checkstring9 =filename.indexOf("]");
var checkstring10 =filename.indexOf("(");
var checkstring11 =filename.indexOf(")");
var checkstring12 =filename.indexOf("~");
var checkstring13 =filename.indexOf("`");
var checkstring14 =filename.indexOf("@");
var checkstring15 =filename.indexOf("#");
var checkstring16 =filename.indexOf("$");
var checkstring17 =filename.indexOf("%");
var checkstring18 =filename.indexOf("^");
var checkstring19 =filename.indexOf(";");


if (checkstring1>0 || checkstring2>0  || checkstring3>0  || checkstring4>0 || checkstring5>0  || checkstring6>0  || checkstring7>0 || checkstring8>0 || checkstring9>0 || checkstring10>0 || checkstring11>0 || checkstring12>0 || checkstring13>0 || checkstring14>0  || checkstring15>0 || checkstring16>0 || checkstring17>0 || checkstring18>0 || checkstring19>0)
{
alert("File name Should not contain special characters.")
return false;
}
else
{

return true;
}


}

function renamefilename(pathtofile)
{

settings='toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=1,width=580,height=280';
window.open ('renamefile.php?pathtofile='+pathtofile, 'newWin',settings );
  
}







function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
    //  document.getElementById('f1_upload_form').style.visibility = 'hidden';
	//document.MyForm.submit();
      return true;
}

function stopUpload(success,msg,errorresult){
	
	
      var result = '';
	  //alert(success);
      if (success == 1){
         //result = '<div class="showerror">'  +  + '!<\/span><br/><br/>';
		 //document.getElementById('showerror').innerHTML=msg;
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
  //    document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
    //  document.getElementById('f1_upload_form').style.visibility = 'visible';      

		//document.MyForm.submit();
		//var sURL = unescape(window.location.pathname);
		//window.location.href = sURL;

		if(errorresult=="success"){
			//document.getElementById('showerror').innerHTML=msg + "<br><a href='#' onclick='location.reload();' class='sbtn'>Refresh List</a>";
			//location.reload();
			//alert("hi");
			//opener.focus();
			//opener.location.href = opener.location;
			//self.close();
			document.resubmit.submit();
			
		}else{
			document.getElementById('showerror').innerHTML=msg;
		}
		//setTimeout(doNext(),5000);
		//setTimeout('doNext()', 2000);
		//var sURL = unescape(window.location.pathname);
		//window.location.href = sURL;
		
		  
      return true;   
}


 
function stopUpload_multiplefldrs(success,msg,errorresult,folderselected_default,defaultfolder){
	
	
      var result = '';
	  //alert(success);
      if (success == 1){
         //result = '<div class="showerror">'  +  + '!<\/span><br/><br/>';
		 //document.getElementById('showerror').innerHTML=msg;
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
  //    document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
    //  document.getElementById('f1_upload_form').style.visibility = 'visible';      

		//document.MyForm.submit();
		//var sURL = unescape(window.location.pathname);
		//window.location.href = sURL;

		if(errorresult=="success"){
			//document.getElementById('showerror').innerHTML=msg + "<br><a href='#' onclick='location.reload();' class='sbtn'>Refresh List</a>";
			//location.reload();
			//alert("hi");
			//opener.focus();
			//opener.location.href = opener.location;
			//self.close();
			if(folderselected_default=="true"){
				//alert(folderselected_default);
				//alert(defaultfolder);
				
				document.resubmit.selectfolder.value = defaultfolder;	
			}
			document.resubmit.submit();
			
		}else{
			document.getElementById('showerror').innerHTML=msg;
		}
		//setTimeout(doNext(),5000);
		//setTimeout('doNext()', 2000);
		//var sURL = unescape(window.location.pathname);
		//window.location.href = sURL;
		
		  
      return true;   
}


 


