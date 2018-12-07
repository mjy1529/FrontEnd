<?
	session_start();
?>
<meta charset="utf-8">
<?
	include "../lib/dbConn.php";

	$idx = $_GET[idx];
	$write_date = date("Y-m-d");

	$sql = "UPDATE review SET title = '{$title}', content = '{$content}', write_date = '{$write_date}', referencedToon = '{$referencedToon}', rate = {$rate} WHERE idx = {$idx};";

	mysql_query($sql, $connect);
	mysql_close();

	echo "
	   <script>
		 alert('수정이 완료되었습니다!');
	   location.href = 'reviewList.php';
	   </script>
	";
?>
