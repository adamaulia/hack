<?php
include ('connect.php');

@$nik=$_POST['nik'];
@$tag=$_POST['tag'];
@$kriminal=$_POST['crime'];
@$pengadilan=$_POST['pengadilan'];

$query="insert into map_kriminal_ktp (tag_id,NIK,id_kriminalitas,id_hakim) values ('$tag','$nik','$kriminal','$pengadilan')";

$hasil=mysql_query($query);
if($hasil){
	echo $hasil;
}


?>