<?
	session_start();
?>
<meta charset="utf-8">
<?
   $phone = "010-".$phone2."-".$phone3;
   $email = $email1."@".$email2;

   include "../lib/dbConn.php";

   $sql = "UPDATE user SET name='{$name}', password='{$password}', email='{$email}', phone='{$phone}', gender='{$gender}' WHERE id='{$userid}';";

   mysql_query($sql, $connect);

   mysql_close();
   echo "
	   <script>
	    location.href = '../index.php';
	   </script>
	";
?>
