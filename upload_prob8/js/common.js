function upload(){
  window.open(upload.php,'','scrollbars=no,width=500,height=500');
  elementId=id;
}
function closewindow(elementId){
  var arr= new Array();
  arr=document.getElementsByTagName("input");
  var value='';
  for(var i=0; i<arr.length; i++){
    if(arr[i].checked){
      value=arr[i].value;
      break;
    }
  }
  window.close();
  window.opener.document.getElementById(elementId).value=value;

}
function download(file1, file2){
	var path="notice";
	location.href="./download.php?path="+path+"&real_file="+file1+"&org_file="+file2;
}