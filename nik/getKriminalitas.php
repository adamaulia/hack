<?php
include ('connect.php');


$nik=$_GET['nik'];

$query="select  k.`NIK`, k.`nama` ,kl.`jenis_kriminalitas`, h.`alamat`,h.`nama_hakim`from ktp k , kriminalitas kl, map_kriminal_ktp mkk , hakim h
where k.`NIK` = mkk.`NIK` and kl.`id_kriminalitas`=mkk.`id_kriminalitas` and mkk.`id_hakim`= h.`id_hakim` and mkk.`NIK`='$nik'";

$hasil=mysql_query($query);

$jsonarray = array();

while($result=mysql_fetch_assoc($hasil))
{

	$jsonarray[]=$result;
}

echo json_encode($jsonarray);
?>