<?php 
	$tv="select * from footer limit 0,1";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	echo $tv_2['html'];
?>