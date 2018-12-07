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
			aside {
				float: left;
				padding-top: 20px;
				width: 150px;
				height: 500px;
			}
			aside ul {
				list-style: none;
			}
			aside ul li {
				font-weight: bold;
			}
			aside ul li a {
				text-decoration: none;
				color: black;
			}
			#loginMenu a{
				font-size: 14px;
				text-decoration: none;
				color: black;
			}
			#content {
				width: 800px;
				height: 500px;
				float: right;
			}
			h1 a {
				color: black;
				text-decoration: none;
			}
			table {
				border-collapse: collapse;
			}
			#linkDiv {
				margin: auto;
				padding-top: 10px;
				width: 250px;
				height: 70px;
				align-content: center;
				align: center;
				border-radius: 10px;
				background-color: #F45950;
			}
			#linkDiv a {
				color: white;
				text-decoration: none;
				font-size: 20px;
			}
			#linkDiv img {
				display: block;
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
		<aside>
			<ul>
				<li><a href="../index.php">전체보기</a></li>
				<br>
				<li><a href="../index.php?site=naver">네이버</a></li>
				<li><a href="../index.php?site=daum">다음</a></li>
				<li><a href="../index.php?site=lezhin">레진코믹스</a></li>
			</ul>
		</aside>
		<div id="container">
			<?php
				include "../lib/dbConn.php";

				$title = $_GET['title'];
				$sql = "SELECT * FROM webtoon WHERE title = '{$title}';";
				$result = mysql_query($sql, $connect);

				while($row = mysql_fetch_array($result)) {
					$image = $row[image];
					$genre = $row[genre];
					$rate = $row[rate];
					$plot = $row[plot];
					$url = $row[url];
				}
			?>
			<br><br>
			<table align="center" width="700px" cellpadding="8">
				<tr>
					<td rowspan="3" align="center">
						<img src="../image/<?=$image?>" width="380px" height="240px">
					</td>
					<td width="80px">제목</td>
					<td><?=$title?></td>
				</tr>
				<tr>
					<td>장르</td>
					<td><?=$genre?></td>
				</tr>
				<tr>
					<td>평점</td>
					<td><?=$rate?>점</td>
				</tr>
				<tr>
					<td colspan="3"><br>줄거리<br></td>
				</tr>
				<tr>
					<td colspan="3"><?=$plot?></td>
				</tr>
			</table>
			<br>
			<div id="linkDiv" align="center">
				<a href="<?=$url?>"><img src="../image/play-button.png" width="35" height="35"></a>
				<a href="<?=$url?>"><b>감상하러 가기</b></a>
			</div>

			</div>
		</div>
	</body>
</html>
