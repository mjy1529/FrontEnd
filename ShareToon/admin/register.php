<meta charset="utf-8">
<?
	include "../lib/dbConn.php";

	$sql = "SELECT * FROM webtoon WHERE title = {'$title'};";
	$result = mysqli_query($sql, $connect);
	$exist_id = mysql_num_rows($result);

	if($exist_id) {
		echo("
					<script>
						window.alert('해당 제목이 존재합니다.')
						history.go(-1)
					</script>
				");
		exit;

	}	else {           
		$sql = "INSERT INTO webtoon ";
	 	$sql .= "values('{$title}', '{$writer}', '{$day}', '{$genre}', '{$plot}', '{$rate}', '{$site}', '{$url}', '{$image}');";

	 	mysql_query($sql, $connect);
	}

	mysql_close();
	echo "
		<script>
		 location.href = '../index.php';
		</script>
 ";
?>
