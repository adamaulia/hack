<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
	<h1> view by civil </h1>
	<div id="search">
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
			<th>TTL</th>
			<th>nama</th>
			<th>alamat</th>
			<th>Status kepemilikan</th>
			<th>masa berlaku</th>
			<th>agama</th>
			<th>jenis kelamin</th>
			<th>pekerjaan</th>
			<th>status perkawinan</th>
		</thead>
		<tbody id="viewktp"></tbody>
		</table>
	</div>
	<script>
	function getData(){
		$(document).ready(function(){
			//$("#viewktp").empty();

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
					url: "getKTP.php",
					data: "nik="+nik,
					type: "GET",
					dataType: 'json',
					success:function(out){
						$('#viewktp').empty();
						var tr;
						for (var i = 0; i < out.length; i++) {
							tr = $('<tr/>');
							tr.append("<td>" + out[i].NIK + "</td>");
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
			}
		 
		document.getElementById('nik').value='';
	});
	}
	
	</script>
</body>

</html>