<?php
include ('connect.php');

$query="select * from hakim";
$hasil=mysql_query($query);
while($data=mysql_fetch_assoc($hasil)) :
	echo "<option value='".$data['id_hakim']."'>".($data['nama_hakim'])."</option>\n";
endwhile;
?>