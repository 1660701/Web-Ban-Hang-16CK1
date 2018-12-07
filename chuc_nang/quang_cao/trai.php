<br>Quảng cáo <br><br>
<?php 
	$tv="select html from quang_cao where vi_tri='trai' ";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	echo $tv_2['html'];
?>