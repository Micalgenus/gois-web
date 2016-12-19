<script>

function clickInbodyList(myKey){
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var result = this.responseText;
			document.getElementById('tblDetail').innerHTML=result;
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var str="detail_key="+myKey;
	xhttp.send(str);
}

function loadTable(){
	var xhttp;
		if (window.XMLHttpRequest) {
			// code for modern browsers
			xhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var result = this.responseText;
				document.getElementById('tblList').innerHTML=result;
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="info_list_id=<?php echo $_SESSION['loged_id']; ?>";
		xhttp.send(str);
}

loadTable();

$("#loadSelect").click(function(){
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var result = this.responseText;
			document.getElementById('demo').innerHTML=result;
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var str="select_id=<?php echo $_SESSION['loged_id']; ?>";
	xhttp.send(str);
});

$("#loadLogout").click(function(){
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var result = this.responseText;
			if(result == 100){
				alert("·Î±×¾Æ¿ô!");
				document.location.href='index.php';
			}
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send("logout=true");
});

$("#sendMyInbody").click(function(){	
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var result = this.responseText;

			document.getElementById('demo').innerHTML=result;
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var str="";

	str+="id="+"<?php echo $_SESSION['loged_id'];?>"+"&";
	str+="mdate="+$("#mdate").val()+"&";
	str+="wicell="+$("#wicell").val()+"&";
	str+="wocell="+$("#wocell").val()+"&";
	str+="protein="+$("#protein").val()+"&";
	str+="mineral="+$("#mineral").val()+"&";
	str+="body_fat="+$("#body_fat").val()+"&";
	str+="weight="+$("#weight").val()+"&";
	str+="s_muscle="+$("#s_muscle").val()+"&";
	str+="bmi="+$("#bmi").val()+"&";
	str+="p_body_fat="+$("#p_body_fat").val()+"&";
	str+="waist_hip="+$("#waist_hip").val();

  xhttp.send(str);
	
});
</script>
