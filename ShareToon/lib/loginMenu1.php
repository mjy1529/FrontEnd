<div id="loginMenu" align="right">
<?
  if(!$userid)
	{
?>
<a href="./login/loginForm.php">로그인</a>&nbsp;&nbsp;
<a href="./login/signupForm.php">회원가입</a>&nbsp;&nbsp;&nbsp;&nbsp;
<?
	}
	else
	{
?>
<a href="./login/logout.php">로그아웃</a>&nbsp;&nbsp;
<a href="./login/signupForm_modify.php">정보수정</a>&nbsp;&nbsp;&nbsp;&nbsp;
<?
	}
?>
</div>
