<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset="utf-8">
		<title>로그인</title>
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
			#content a {
				text-decoration: underline;
				font-size: 14px;
				color: #F46075;
			}
		</style>
	</head>
	<body>
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
	<div id="content">
		<form name="login_form" method="post" action="login.php">
			<table cellpadding="7px" align="center">
				<tr>
					<td colspan="2" align="center"><h4>아이디와 패스워드를 입력해주세요:)</h4></td>
				</tr>
				<tr>
					<td>ID</td>
					<td><input type="text" name="id"/></td>
				</tr>
				<tr>
					<td>PW</td>
					<td><input type="password" name="password"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center" style="padding-top: 20px">
						<input type="submit" value="LOGIN"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><a href="signupForm.php">회원가입</a></td>
				</tr>
			</table>
		</form>
		<br>
	</div>

	</div>
	</body>
</html>
