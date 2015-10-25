<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
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
		<table class="table">
		<thead>
			<th>NIK</th>
			<th>tag</th>
			<th>nama</th>
			<th>penyakit</th>
			<th>lobat</th>
			<th>rumah sakit</th>
		</thead>
		<tbody id="viewdata">
		<tbody>
		</table>
	</div>
	<script>
		function getData(){
		$(document).ready(function(){

			function validate_tag(selector){
				var tag = $(selector).val();
				if(tag.length == 14){
					return true;
				}else{
					alert('Inputan Tag ID tidak valid');
					return false;
				}
			}
			
			$("#viewdata").empty();
			var tag=$("#tag").val();
			console.log(tag);
			if(validate_tag('#tag')){
				$.ajax({
					url: "getTagkesehatan.php",
					data: "tag="+tag,
					type: "GET",
					dataType: 'json',
					success:function(out){
						
						var tr;
						$("#viewdata").empty();
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
			}
			
			document.getElementById('tag').value='';
		});
		}
	
	</script>
</body>
</html>