<meta charset="utf-8">
<?
   session_start();

   include "../lib/dbConn.php";

	 $idx = $_GET['idx'];
   $sql = "DELETE FROM review WHERE idx = $idx";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
		  alert('삭제되었습니다!');
	    location.href = './reviewList.php';
	   </script>
	";
?>
