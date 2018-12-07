<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>회원 정보 수정</title>
		<meta charset="utf-8">
		<style>
			#wrapper{
				width:1000px;
				margin: 0 auto;
			}
			header {
				width: 100%;
				height: 100px;
				background-color: #F46075;
				background-position: right center;
			}
			header nav {
				float: right;
				width:70%;
				margin-top: 15px;
			}
			nav ul{
				list-style-type:none;
			}
			nav ul li{
				display: inline;
				float: left;
				font-weight:bold;
				margin: 15px;
			}
			nav ul li a{
				color:white;
				text-decoration:none;
			}
			#loginMenu a{
				font-size: 14px;
				text-decoration: none;
				color: black;
			}
			h1 a {
				text-decoration: none;
				color: black;
			}
			#content {
				width: 1000px;
				height: 500px;
				padding-top: 20px;
			}
			td {
				font-size: 14px;
			}
		</style>

		<script>
			function check_id() {
				// **** alert로 변경해보기 **** //
				// alert("check_id.php?id=" + document.signup_form.id.value);
				window.open("check_id.php?id=" +
				document.signup_form.id.value,
	          "IDcheck",
	           "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
			}

			function check_input()
	    {
				if (!document.signup_form.name.value)
	       {
	           alert("이름을 입력하세요");
	           document.signup_form.name.focus();
	           return;
	       }

	      if (!document.signup_form.password.value)
	       {
	           alert("비밀번호를 입력하세요");
	           document.signup_form.password.focus();
	           return;
	       }

	      if (!document.signup_form.confirm_password.value)
	       {
	           alert("비밀번호 확인을 입력하세요");
	           document.signup_form.confirm_password.focus();
	           return;
	       }

				if (!document.signup_form.email1.value || !document.signup_form.email2.value )
				{
						alert("이메일을 입력하세요");
						document.member_form.email1.focus();
						return;
				}

				if (!document.signup_form.phone2.value || !document.signup_form.phone3.value )
	       {
	           alert("휴대폰 번호를 입력하세요");
	           document.member_form.phone2.focus();
	           return;
	       }

	      if (document.signup_form.password.value !=
	             document.signup_form.confirm_password.value)
	       {
	           alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
	           document.signup_form.password.focus();
	           document.signup_form.password.select();
	           return;
	       }

				 document.signup_form.submit();
	    }

		</script>
	</head>
	<body>
		<?php
			include "../lib/dbConn.php";

			$sql = "SELECT * FROM user WHERE id = '{$userid}';";
			$result = mysql_query($sql, $connect);

			$row = mysql_fetch_array($result);

			$phone = explode("-", $row[phone]);
	    $phone2 = $phone[1];
	    $phone3 = $phone[2];

	    $email = explode("@", $row[email]);
	    $email1 = $email[0];
	    $email2 = $email[1];

	    mysql_close();
	 	?>
		<div id="wrapper">

		<h1 align=center><a href="../index.php">Share Toon</a></h1>
		<? include "../lib/loginMenu2.php"; ?>
		<header>
		<nav align=center>
			<ul>
				<li><a href="../index.php">WEBTOON</a></li>
				<li><a href="../review/reviewList.php">REVIEW</a></li>
			</ul>
		</nav>
		</header>
		<div id="content" style="padding-left: 20px;">
			<h4 align="center">회원 정보 수정하기:)</h4>
			<form name="signup_form" method="post" action="modify.php">
				<table cellpadding="8" align="center" width="700px">
					<tr>
						<td>* 아이디</td><td><?=$row[id]?></td>
					</tr>
					<tr>
						<td>* 이름</td><td><input type="text" name="name" value="<?=$row[name]?>"/></td>
					</tr>
					<tr>
						<td>* 비밀번호</td><td><input type="password" name="password" value="<?=$row[password]?>"/></td>
					</tr>
					<tr>
						<td>* 비밀번호 확인</td><td><input type="password" name="confirm_password" value="<?=$row[password]?>"/></td>
					</tr>
					<tr>
						<td>* 이메일</td><td><input type="text" name="email1" value="<?=$email1?>"/> @ <input type="text" name="email2" value="<?=$email2?>"/></td>
					</tr>
					<tr>
						<td>* 휴대폰 번호</td>
						<td>010 -
							  <input type="number" name="phone2" maxlength="4" value="<?=$phone2?>"> -
								<input type="number" name="phone3" maxlength="4" value="<?=$phone3?>">
						</td>
					</tr>
					<tr>
						<td>성별</td>
						<td>
							<?php
								if($row[gender] == M) {
							?>
								<input type="radio" name="gender" value="M" checked>남
								<input type="radio" name="gender" value="F">여
							<?php
							} else {
							?>
								<input type="radio" name="gender" value="M">남
								<input type="radio" name="gender" value="F" checked>여
							<?php
							}
						 	?>
						</td>
					</tr>
					<tr>
						<td colspan="2" align=right style="font-size: 12px; color: red;">* 표시는 필수입력입니다.&nbsp;&nbsp;
							<button type="button" onclick="check_input()">수정</button>
						</td>
					<tr>
				<table>
			</form>
		</div>

		</div>
	</body>
</html>
