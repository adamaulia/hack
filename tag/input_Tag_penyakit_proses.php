<?php
include ('connect.php');

@$tag=$_POST['tag'];
@$nik=$_POST['nik'];
@$penyakit=$_POST['penyakit'];
@$obat=$_POST['obat'];
@$id_rs=$_POST['id_rs'];

//echo $nik, $penyakit,$obat,$id_rs;
$query="insert into map_ktp_penyakit (NIK,tag_id,penyakit,obat,id_rumah_sakit) values ('$nik','$tag','$penyakit','$obat','$id_rs')";

$hasil=mysql_query($query);
if($hasil){
	echo $hasil;
}

?>