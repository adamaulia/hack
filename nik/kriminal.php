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
				<input type="text" id="nik" placeholder="input nomor ktp">
				<input type="button" id="search" value="search" onclick="getData()">
		</form>
	</div>
	<div id="getktp">
		<table class="table">
		<thead>
			<th>NIK</th>
			<th>jenis pelanggaran</th>
			<th>nama pelanggar</th>
			<th>lokasi pengadilan</th>
			<th>kota pengadilan</th>
		</thead>
		<tbody id="viewdata">
		</tbody>
		</table>
	</div>
	<script>
		function getData(){
		$(document).ready(function(){
			//$("#viewdata").empty();
			
			function validate_nik(selector){
				var nik = $(selector).val();
				if((nik.length == 16) && (!isNaN(nik))){
					return true;
				}else{
					alert('Inputan NIK tidak valid.');
					return false;
				}
			}

			var nik=$("#nik").val();
			console.log(nik);
			if(validate_nik('#nik')){

				$.ajax({
					url: "getKriminalitas.php",
					data: "nik="+nik,
					type: "GET",
					dataType: 'json',
					success:function(out){
						$('#viewdata').empty();
						var tr;
						for (var i = 0; i < out.length; i++) {
							tr = $('<tr/>');
							tr.append("<td>" + out[i].NIK + "</td>");
							tr.append("<td>" + out[i].jenis_kriminalitas + "</td>");
							tr.append("<td>" + out[i].nama + "</td>");
							tr.append("<td>" + out[i].alamat+ "</td>");
							tr.append("<td>" + out[i].nama_hakim+ "</td>");
							$('#viewdata').append(tr);
							} 
							
						}
					
					});
				
				document.getElementById('nik').value='';
			}
		});
		}
	
	</script>
</body>
</html>