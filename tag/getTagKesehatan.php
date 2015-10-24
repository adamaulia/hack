<?php
header('Access-Control-Allow-Origin: *');
include ('connect.php');

$tag=$_GET['tag'];

$query=" SELECT k.`NIK`,k.`tag_id`, k.`nama` , mkp.`penyakit` , mkp.`obat` , rs.`nama` as rumah_sakit
FROM map_ktp_penyakit mkp
left join KTP k on k.`tag_id`=mkp.`tag_id`
left join rumah_sakit rs on rs.`id_rumah_sakit`=mkp.`id_rumah_sakit`
where k.`tag_id`='$tag'" ;

$hasil=mysql_query($query);

$jsonarray = array();
while($result=mysql_fetch_assoc($hasil))
{

	$jsonarray[]=$result;
}

echo json_encode($jsonarray);

?>