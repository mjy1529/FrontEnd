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
			#registerMenu a {
				font-size: 14px;
				float: right;
				color: #F46075;
				text-decoration: underline;
			}
			#registerMenu {
				padding-top: 15px;
				padding-bottom:10px;
			}
			table a {
				text-decoration: none;
				color: black;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">

		<h1 align=center><a href="index.php">Share Toon</a></h1>
		<? include "./lib/loginMenu1.php"; ?>
		<header>
		<nav align=center>
			<ul>
				<li><a href="index.php">WEBTOON</a></li>
				<li><a href="./review/reviewList.php">REVIEW</a></li>
			</ul>
		</nav>
		</header>
		<aside>
			<ul>
				<li><a href="index.php">전체보기</a></li>
				<br>
				<li><a href="index.php?site=naver">네이버</a></li>
				<li><a href="index.php?site=daum">다음</a></li>
				<li><a href="index.php?site=lezhin">레진코믹스</a></li>
			</ul>
		</aside>
		<div id="content">
			<?
			if ($userid == 'admin') { ?>
			<div id="registerMenu">
					<a href="./admin/registerForm.php">ADMIN_웹툰 등록하기</a>
			</div>
		<? } ?>
			<?php
				include "./lib/dbConn.php";

				if(!isset($_GET['site'])) {
			    $sql = "SELECT * FROM webtoon;";
				} else {
			    $sql = "SELECT * FROM webtoon WHERE site = '$_GET[site]';";
				}
				$result = mysql_query($sql, $connect);
			?>
			<table cellpadding="15">
				<tr>
			<?php
				$row_num = 1;
				while($row = mysql_fetch_array($result)) {
			?>
				<td align="center">
					<a href="./webtoon/webtoon.php?title=<?=$row[title]?>">
					<img src='./image/<?=$row[image]?>' width="230" height="130"><br><br>
					<b><?=$row[title]?></b><br>
					<?=$row[writer]?>
					</a>
				</td>
			<?php
					if($row_num % 3 == 0) {
						echo "</tr>";
					}
					$row_num++;
				}
			?>
			</div>
		</div>

		</div>
	</body>
</html>
