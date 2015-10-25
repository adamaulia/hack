<?php
include ('connect.php');
$title = 'input riwayat kriminalitas';
include ('header.php');
?>
	<h1>input riwayat kriminalitas</h1>
	<div id="input">
		<form>
			<label>input nik:</label>
			<input type="text" id="nik" placeholder="input nomor ktp">
			</br>
			<label>jenis kriminalitas:</label>
			</br>
			<select name="kriminal" id="kriminal">
				<option value="">-- Select --</option>
			</select>
			</br>
			<label>lokasi pengadilan:</label>
			</br>
			<select name="pengadilan" id="pengadilan">
				<option value="">-- Select --</option>
			</select>
			</br>
			</br>
			<input type="button" id="submit" value="input">
		</form>
	</div>
	<script>
		$(document).ready(function(){
				var crime;
				var pengadilan;
				$.ajax({
					url: "getAllKriminal.php",
					success:function(data){
						$('#kriminal').append(data);
					}
				});
				
				$.ajax({
					url: "getHakim.php",
					success:function(data){
						$('#pengadilan').append(data);
					}
				});
			
			
			$("#kriminal").change(function(){
				crime= $("#kriminal").val();
			});
			
			
			$("#pengadilan").change(function(){
				pengadilan= $("#pengadilan").val();
			});
			
			$("#submit").click(function(){
				var nik = $("#nik").val();
				console.log(nik);
				console.log(crime);
				console.log(pengadilan);
				$.ajax({
					url: "input_kriminal_proses.php",
					data:"nik="+nik+"&crime="+crime+"&pengadilan="+pengadilan,
					type:"POST",
					success:function(data){
						alert("input berhasil");
						document.getElementById('nik').value='';
						document.getElementById('kriminal').value='';
						document.getElementById('pengadilan').value='';
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