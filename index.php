<html>
<head>
<script>
function showresource()
{
      x = document.getElementById("txtHint");    
      alert(x.innerHTML);
      document.getElementById("response").appendChild( document.createTextNode(x.innerHTML));    
}


function showrequest(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","get_contents.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showrequest(this.value)">
<option value="">Select a person:</option>
<option value="test_api">test_api</option>
<option value="get_staff_list">get_staff_list</option>
</select>
</form>
<br>
<div id="txtHint"><b>request URL will be shown here</b></div>
<div id="myHeader" onclick="showresource()">Show resource</div>
<div id="txtResource"><b>resource will be shown here</b></div>

<div id="response"></div>

</body>
</html>
