<?php
include ('connect.php');

$nik=$_GET['nik'];

$query=" SELECT k.`NIK` , k.`nama` , mkp.`penyakit` , mkp.`obat` , rs.`nama` as rumah_sakit
FROM map_ktp_penyakit mkp
left join KTP k on k.`NIK`=mkp.`NIK`
left join rumah_sakit rs on rs.`id_rumah_sakit`=mkp.`id_rumah_sakit`
where mkp.`NIK`='$nik'" ;

$hasil=mysql_query($query);

$jsonarray = array();
while($result=mysql_fetch_assoc($hasil))
{

	$jsonarray[]=$result;
}

echo json_encode($jsonarray);

?>