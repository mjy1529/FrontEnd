<?
	session_start();
?>
<meta charset="utf-8">
<?
	include "../lib/dbConn.php";

	$userid = $_SESSION['userid'];

	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	$write_date = date("Y-m-d");

	$sql = "INSERT INTO review (title, content, writer, write_date, referencedToon, rate) ";
	$sql .= "values ('{$title}', '{$content}', '{$userid}', '{$write_date}', '{$referencedToon}', {$rate});";

	mysql_query($sql, $connect);
	mysql_close();

	echo "
	   <script>
	   location.href = 'reviewList.php';
	   </script>
	";
?>
