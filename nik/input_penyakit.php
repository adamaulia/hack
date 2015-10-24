<?php
include ('connect.php');

?>
<html>
<head>
	<title>input riwayat kesehatan</title>
	<script type="text/javascript" src="../asset/jquery-1.11.3.min.js"></script>
	<script>
		$(document).ready(function(){
				var id_rs;
				$.ajax({
					url: "getRumahSakit.php",
					success:function(data){
						$('#rumah_sakit').append(data);
					}
				});
			
			
			$("#rumah_sakit").change(function(){
				id_rs= $("#rumah_sakit").val();
			});
			
			$("#submit").click(function(){
				var nik = $("#nik").val();
				var penyakit = $("#penyakit").val();
				var obat = $("#obat").val();
				console.log(nik);
				console.log(penyakit);
				console.log(obat);
				console.log(id_rs);
				$.ajax({
					url: "input_penyakit_proses.php",
					data:"nik="+nik+"&penyakit="+penyakit+"&obat="+obat+"&id_rs="+id_rs,
					type:"POST",
					success:function(data){
						alert("input berhasil");
					},
					error:function(err){
						alert("error");
					}
					
					
				});
			});
		});
		document.getElementById('nik').value='';
	</script>
</head>

<body>
	<h1>input kesehatan kesehatan by dokter</h1>
	<div id="input">
		<form>
			<label>input nik:</label>
			<input type="text" id="nik" placeholder="input nomor ktp">
			</br>
			<label>penyakit:</label>
			<input type="text" id="penyakit" placeholder="input nama penyakit">
			</br>
			<label>input obat:</label>
			<input type="text" id="obat" placeholder="input nama obat">
			</br>
			<label>input rumah sakit:</label>
			<select name="rumah_sakit" id="rumah_sakit">
				<option value="">-- Select --</option>
			</select>
			</br>
			<input type="button" id="submit" value="input">
		</form>
	</div>
</body>

</html>