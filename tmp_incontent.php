<div class="col-sm-10">
		<table class="table table-bordered" id = "tblDetail">
		<colgroup>
			<col width="20%"></col>
			<col></col>
		</colgroup>
			<thead>
				<tr>
					<th>속성</th>
					<th>값</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>검사 날짜</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>기관명</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>세포내수분</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>세포외수분</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>단백질</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>무기질</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>체지방</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>체중</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>골격근량</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>BMI</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>체지방률</td>
					<td>NONE</td>
				</tr>
				<tr>
					<td>복부지방률</td>
					<td>NONE</td>
				</tr>
			</tbody>
		</table>
		<h1 id="demo"></h1>		
		<div class="row">
			<div class="pull-left">
				<form class="form-horizontal">
					<input type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="인바디 추가">
					<input type="button" class="btn btn-success btn-lg" id="loadSelect" value="정보보기">
				</form>
			</div>
		</div>
	<div>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">인바디 추가</h4>
        </div>
        <div class="modal-body">
					<form>
						<input type="date" class="form-control input-lg" id="mdate" placeholder="검사 날짜">
						<input type="text" class="form-control input-lg" id="wicell" placeholder="세포내수분">
						<input type="text" class="form-control input-lg" id="wocell" placeholder="세포외수분">
						<input type="text" class="form-control input-lg" id="protein" placeholder="단백질">
						<input type="text" class="form-control input-lg" id="mineral" placeholder="무기질">
						<input type="text" class="form-control input-lg" id="body_fat" placeholder="체지방">
						<input type="text" class="form-control input-lg" id="weight" placeholder="체중">
						<input type="text" class="form-control input-lg" id="s_muscle" placeholder="골격근량">
						<input type="text" class="form-control input-lg" id="bmi" placeholder="BMI">
						<input type="text" class="form-control input-lg" id="p_body_fat" placeholder="체지방률">
						<input type="text" class="form-control input-lg" id="waist_hip" placeholder="복부지방률">
					</form>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="종료">
					<input type="button" class="btn btn-default" id="sendMyInbody" data-dismiss="modal" value="추가">
        </div>
      </div>
    </div>
  </div>

	
</div>

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

function loadTable(flag){
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

		var str="info_list_id=<?php echo $_SESSION['loged_id']; ?>"+"&";
		str+="info_list_flag="+flag;
		xhttp.send(str);
}

loadTable("Zero");

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
				alert("로그아웃!");
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
</div>