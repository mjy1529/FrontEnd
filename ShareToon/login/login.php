<?
  session_start();
?>
<meta charset="utf-8">
<?
   if(!$id) {
     echo("
           <script>
             alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
      exit;
   }

   if(!$password) {
     echo("
           <script>
             alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
     exit;
   }

   include "../lib/dbConn.php";

   $sql = "SELECT * FROM user WHERE id='{$id}';";
   $result = mysql_query($sql, $connect);

   $num_match = mysql_num_rows($result);

   if(!$num_match)
   {
     echo("
           <script>
             alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysql_fetch_array($result);

        $db_pass = $row[password];

        if($password != $db_pass)
        {
           echo("
              <script>
                alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
					//여기서 세션 넣어주기!!!
           $userid = $row[id];
           $_SESSION['userid'] = $userid;

           echo("
              <script>
                location.href = '../index.php';
              </script>
           ");
        }
   }
?>
