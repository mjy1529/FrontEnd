<?php
	$connect = mysql_connect("localhost", "mjy", "1234")
	or die("SQL server에 연결할 수 없습니다.");

	$result = mysql_select_db("mjy_db", $connect);
?>
