<?php
header('Access-Control-Allow-Origin: *');
include ('connect.php');


$tag=$_GET['tag'];

$query="select  k.`NIK`,k.`tag_id`, k.`nama` ,kl.`jenis_kriminalitas`, h.`alamat`,h.`nama_hakim`from ktp k , kriminalitas kl, map_kriminal_ktp mkk , hakim h
where k.`tag_id` = mkk.`tag_id` and kl.`id_kriminalitas`=mkk.`id_kriminalitas` and mkk.`id_hakim`= h.`id_hakim` and k.`tag_id`='$tag'";

$hasil=mysql_query($query);

$jsonarray = array();

while($result=mysql_fetch_assoc($hasil))
{

	$jsonarray[]=$result;
}

echo json_encode($jsonarray);
?>