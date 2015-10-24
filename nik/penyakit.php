<?php
include ('connect.php');
?>
<html>
<head>
	<title>record kriminalitas</title>
	<script type="text/javascript" src="../asset/jquery-1.11.3.min.js"></script>
	<script>
		function getData(){
		$(document).ready(function(){
			
			$("#viewdata").empty();
			var nik=$("#nik").val();
			console.log(nik);
			$.ajax({
				url: "getPenyakit.php",
				data: "nik="+nik,
				type: "GET",
				dataType: 'json',
				success:function(out){
					
			var tr;
					for (var i = 0; i < out.length; i++) {
						tr = $('<tr/>');
						tr.append("<td>" + out[i].NIK + "</td>");
						tr.append("<td>" + out[i].nama + "</td>");
						tr.append("<td>" + out[i].penyakit + "</td>");
						tr.append("<td>" + out[i].obat+ "</td>");
						tr.append("<td>" + out[i].rumah_sakit+ "</td>");
						$('#viewdata').append(tr);
						} 
						
					}
				
				});
			
			document.getElementById('nik').value='';
		});
		}
	
	</script>
</head>

<body>
	<h1> view by civil </h1>
	<h1>history penyakit</h1>
	<div id="form">
		<form>
			<label>search your id :</label>
				<input type="text" id="nik" placeholder="input nomor ktp">
				<input type="button" id="search" value="search" onclick="getData()">
				
		</form>
	</div>
	<div id="getktp">
		<table id="viewdata" border="1">
		<thead>
			<th>NIK</th>
			<th>nama</th>
			<th>penyakit</th>
			<th>obat</th>
			<th>rumah sakit</th>
		</thead>
		</table>
	</div>
</body>
</html>