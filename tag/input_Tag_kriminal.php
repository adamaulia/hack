<?php
include ('connect.php');

?>
<html>
<head>
	<title>input riwayat kriminalitas</title>
	<script type="text/javascript" src="../asset/jquery-1.11.3.min.js"></script>
	<script>
		$(document).ready(function(){
				var crime;
				var pengadilan;
				$.ajax({
					url: "getTagAllKriminal.php",
					success:function(data){
						$('#kriminal').append(data);
					}
				});
				
				$.ajax({
					url: "getTagHakim.php",
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
				var tag = $("#tag").val();
				console.log(tag);
				console.log(crime);
				console.log(pengadilan);
				$.ajax({
					url: "input_Tag_kriminal_proses.php",
					data:"tag="+tag+"&crime="+crime+"&pengadilan="+pengadilan,
					type:"POST",
					success:function(data){
						alert("input berhasil");
						document.getElementById('tag').value='';
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
</head>

<body>
	<h1>input riwayat kriminalitas dengan menggunakan tag ktp</h1>
	<div id="input">
		<form>
			<label>input tag:</label>
			<input type="text" id="tag" placeholder="input nomor tag ktp">
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
</body>

</html>