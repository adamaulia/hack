<?php
header('Access-Control-Allow-Origin: *');
include ('connect.php');
?>
<html>
<head>
	<title>record kriminalitas</title>
	<script type="text/javascript" src="../asset/jquery-1.11.3.min.js"></script>
	<script>
		function getData(){
		$(document).ready(function(){
			
			$("#body").empty();
			var tag=$("#tag").val();
			console.log(tag);
			$.ajax({
				url: "getTagkesehatan.php",
				data: "tag="+tag,
				type: "GET",
				dataType: 'json',
				success:function(out){
					
			var tr;
					for (var i = 0; i < out.length; i++) {
						tr = $('<tr/>');
						tr.append("<td>" + out[i].NIK + "</td>");
						tr.append("<td>" + out[i].tag_id + "</td>");
						tr.append("<td>" + out[i].nama + "</td>");
						tr.append("<td>" + out[i].penyakit + "</td>");
						tr.append("<td>" + out[i].obat+ "</td>");
						tr.append("<td>" + out[i].rumah_sakit+ "</td>");
						$('#viewdata').append(tr);
						} 
						
					}
				
				});
			
			document.getElementById('tag').value='';
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
				<input type="text" id="tag" placeholder="input nomor ktp">
				<input type="button" id="search" value="search" onclick="getData()">
		</form>
	</div>
	<div id="getktp">
		<table id="viewdata" border="1">
		<thead>
			<th>NIK</th>
			<th>tag</th>
			<th>nama</th>
			<th>penyakit</th>
			<th>lobat</th>
			<th>rumah sakit</th>
		</thead>
		<tbody id="body">
		<tbody>
		</table>
	</div>
</body>
</html>