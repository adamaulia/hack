<?php
include ('connect.php');

$query_penyakit="select * from rumah_sakit";
$hasil=mysql_query($query_penyakit);
// $data=mysql_fetch_assoc($hasil);

while($data=mysql_fetch_assoc($hasil)) :
	echo "<option value='".$data['id_rumah_sakit']."'>".($data['nama'])."</option>\n";
endwhile;


// foreach($data as $d){
	// echo "<option value='".$d['id_rumah_sakit']."'>".ucwords($d['nama'])."</option>\n";
// }

?>