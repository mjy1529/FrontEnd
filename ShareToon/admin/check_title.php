<meta charset="utf-8">
<?
   if(!$title)
   {
      echo("제목을 입력하세요.");

   } else {
      include "../lib/dbConn.php";

      $sql = "SELECT * FROM webtoon WHERE title ='{$title}';";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if ($num_record)
      {
         echo "웹툰 제목이 중복됩니다!<br>";
      } else {
         echo "사용 가능한 제목입니다.";
      }

      mysql_close();
   }
?>
