<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
	<h1> view by civil </h1>
	<h1>record kriminalitas</h1>
	<div id="form">
		<form>
			<label>search your id :</label>
				<input type="text" id="tag" placeholder="input tag ktp">
				<input type="button" id="search" value="search" onclick="getData()">
		</form>
	</div>
	<div id="getktp">
		<table id="viewdata" border="1">
		<thead>
			<th>NIK</th>
			<th>jenis pelanggaran</th>
			<th>tag id</th>
			<th>nama pelanggar</th>
			<th>lokasi pengadilan</th>
			<th>kota pengadilan</th>
		</thead>
		<tbody id="body">
		<tbody>
		</table>
	</div>
	<script>
		function getData(){
		$(document).ready(function(){
			$("#body").empty();
			
			var tag=$("#tag").val();
			console.log(tag);
			$.ajax({
				url: "getTagKriminalitas.php",
				data: "tag="+tag,
				type: "GET",
				dataType: 'json',
				success:function(out){
					
			var tr;
					for (var i = 0; i < out.length; i++) {
						tr = $('<tr/>');
						tr.append("<td>" + out[i].NIK + "</td>");
						tr.append("<td>"+out[i].tag_id+"</td>");
						tr.append("<td>" + out[i].jenis_kriminalitas + "</td>");
						tr.append("<td>" + out[i].nama + "</td>");
						tr.append("<td>" + out[i].alamat+ "</td>");
						tr.append("<td>" + out[i].nama_hakim+ "</td>");
						$('#viewdata').append(tr);
						} 
						
					}
				
				});
			
			document.getElementById('tag').value='';
		});
		}
	
	</script>
</body>
</html>