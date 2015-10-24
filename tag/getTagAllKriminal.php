<?php
include ('connect.php');

$query="select * from kriminalitas";
$hasil=mysql_query($query);
while($data=mysql_fetch_assoc($hasil)) :
	echo "<option value='".$data['id_kriminalitas']."'>".($data['jenis_kriminalitas'])."</option>\n";
endwhile;
?>