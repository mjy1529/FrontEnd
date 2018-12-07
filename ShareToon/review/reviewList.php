<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Share Toon</title>
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
			#content {
				width: 1000px;
				height: 500px;
				float: right;
			}
			h1 a {
				color: black;
				text-decoration: none;
			}
			#registerMenu a {
				font-size: 14px;
				float: right;
				color: #F46075;
				text-decoration: underline;
			}
			#registerMenu {
				padding-top: 15px;
				padding-bottom:40px;
			}
			td {
				font-size: 14px;
			}
			table a {
				text-decoration: none;
				color: black;
			}
			table {
				border-collapse: collapse;
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
				<li><a href="">REVIEW</a></li>
			</ul>
		</nav>
		</header>
		<div id="content">
			<div id="registerMenu">
					<a href="./reviewForm.php">리뷰 작성하기</a>
			</div>
			<?
				include "../lib/dbConn.php";
				$sql = "SELECT * FROM review ORDER BY write_date DESC";
				$result = mysql_query($sql, $connect);
			?>
			<table border="1" width="850" cellpadding="8" align="center" border-collapse="collapse">
				<tr align="center">
					<td bgcolor="#FBEFEF"><b>번호</b></td>
					<td bgcolor="#FBEFEF"><b>제목</b></td>
					<td bgcolor="#FBEFEF"><b>작성자</b></td>
					<td bgcolor="#FBEFEF"><b>작성 날짜</b></td>
				</tr>
			<?
				$i = 1;
				while ($row = mysql_fetch_array($result)) {
					echo "
					<tr>
						<td align='center'>$i</td>
						<td><a href='./readReview.php?idx={$row[idx]}'>$row[title]</a></td>
						<td align='center'>$row[writer]</td>
						<td align='center'>$row[write_date]</td>
					</tr>
					";
					$i++;
				}
			?>
			</table>
			<br><br>
		</div>

		</div>
	</body>
</html>
