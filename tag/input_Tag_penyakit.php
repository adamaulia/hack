<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
	<h1>input kesehatan kesehatan by dokter dengan nomor tag ktp</h1>
	<div id="input">
		<form>
			<label>input tag:</label>
			<input type="text" id="tag" placeholder="input nomor tag ktp ">
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
	<script>
		$(document).ready(function(){
				var id_rs;
				$.ajax({
					url: "getTagRumahSakit.php",
					success:function(data){
						$('#rumah_sakit').append(data);
					}
				});
			
			
			$("#rumah_sakit").change(function(){
				id_rs= $("#rumah_sakit").val();
			});
			
			$("#submit").click(function(){
				var tag = $("#tag").val();
				var penyakit = $("#penyakit").val();
				var obat = $("#obat").val();
				console.log(tag);
				console.log(penyakit);
				console.log(obat);
				console.log(id_rs);
				$.ajax({
					url: "input_Tag_penyakit_proses.php",
					data:"tag="+tag+"&penyakit="+penyakit+"&obat="+obat+"&id_rs="+id_rs,
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
		
	</script>
</body>

</html>