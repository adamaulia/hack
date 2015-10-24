<?php
header('Access-Control-Allow-Origin: *');
include ('connect.php');

$tag=$_GET['tag'];

$query="
SELECT k.`NIK`,k.`tag_id`,concat(Tempat,ttl)as tempat,k.`nama`, k.`alamat`, k.`kewarganegaraan`, k.`masa_berlaku`, ag.`jenis_agama`, kl.`jenis_kelamin`, 
pk.`jenis_pekerjaan`, sp.`status_perkawinan`
FROM ktp k
LEFT JOIN agama ag ON k.`id_agama` = ag.`id_agama`
LEFT JOIN kelamin kl ON k.`id_kelamin` = kl.`id_kelamin`
LEFT JOIN pekerjaan pk ON k.`id_pekerjaan` = pk.`id_pekerjaan`
LEFT JOIN status_perkawinan sp ON k.`id_status_perkawinan` = sp.`id_status_perkawinan` where k.`tag_id`='$tag'" ;

$hasil=mysql_query($query);

$jsonarray = array();

while($result=mysql_fetch_assoc($hasil))
{

	$jsonarray[]=$result;
}

echo json_encode($jsonarray);
?>