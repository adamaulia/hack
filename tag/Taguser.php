<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
	<h1> view by civil </h1>
	<div id="search">
		<form>
			<label>search your id :</label>
				<input type="text" id="tag" placeholder="input tag ktp">
				<input type="button" id="search" value="search" onclick="getData()">
		</form>
	</div>
	<div id="getktp">
		<table id="viewktp" border="1">
		<thead>
			<th>NIK</th>
			<th>tag_id</th>
			<th>TTL</th>
			<th>nama</th>
			<th>alamat</th>
			<th>status kepemilikan</th>
			<th>masa berlaku</th>
			<th>agama</th>
			<th>jenis kelamin</th>
			<th>pekerjaan</th>
			<th>status perkawinan</th>
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
				url: "getTagKTP.php",
				data: "tag="+tag,
				type: "GET",
				dataType: 'json',
				success:function(out){
					
			var tr;
					for (var i = 0; i < out.length; i++) {
						tr = $('<tr/>');
						tr.append("<td>" + out[i].NIK + "</td>");
						tr.append("<td>" + out[i].tag_id + "</td>");
						tr.append("<td>" + out[i].tempat + "</td>");
						tr.append("<td>" + out[i].nama + "</td>");
						tr.append("<td>" + out[i].alamat + "</td>");
						tr.append("<td>" + out[i].kewarganegaraan + "</td>");
						tr.append("<td>" + out[i].masa_berlaku + "</td>");
						tr.append("<td>" + out[i].jenis_agama + "</td>");
						tr.append("<td>" + out[i].jenis_kelamin + "</td>");
						tr.append("<td>" + out[i].jenis_pekerjaan + "</td>");
						tr.append("<td>" + out[i].status_perkawinan + "</td>");
						$('#viewktp').append(tr);
					} 
					
				}
			
			});
		 
		document.getElementById('tag').value='';
	});
	}
	
	</script>
</body>

</html>