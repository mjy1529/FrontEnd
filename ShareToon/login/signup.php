<meta charset="utf-8">
<?
	include "../lib/dbConn.php";

	$email =$email1."@".$email2;
	$phone = "010-".$phone2."-".$phone3;

	$sql = "select * from user where id = {'$id'};";
	$result = mysqli_query($sql, $connect);
	$exist_id = mysql_num_rows($result);

	if($exist_id) {
		echo("
					<script>
						window.alert('해당 아이디가 존재합니다.')
						history.go(-1)
					</script>
				");
		exit;

	}	else {
		$sql = "INSERT INTO user ";
	 	$sql .= "values('{$id}', '{$name}', '{$password}', '{$email}', '{$phone}', '{$gender}');";

	 mysql_query($sql, $connect);
	}

	mysql_close();
	echo "
		<script>
		 alert('회원가입이 완료되었습니다! 로그인을 진행해주세요.')
		 location.href = '../index.php';
		</script>
 ";
?>
