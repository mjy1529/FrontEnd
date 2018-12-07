<?
	session_start();

	$idx = $_GET['idx'];
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
			td {
				font-size: 14px;
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
				<li><a href="./reviewList.php">REVIEW</a></li>
			</ul>
		</nav>
		</header>
		<div id="content">
			<h4 align="center">리뷰글 확인</h4>
			<?php
				include "../lib/dbConn.php";

				$sql = "SELECT * FROM review WHERE idx = {$idx};";
				$result = mysql_query($sql, $connect);

				while($row = mysql_fetch_array($result)) {
					$idx = $row[idx];
					$title = $row[title];
					$writer = $row[writer];
					$referencedToon = $row[referencedToon];
					$rate = $row[rate];
					$content = $row[content];
				}
			?>
			<form name="review_form" method="post" action="insertReview.php">
				<table cellpadding="8" border="1px" align="center" width="850px">
					<tr>
						<td align="center">제목</td><td colspan="3"><?=$title?></td>
					</tr>
					<tr>
						<td align="center">작성자</td><td colspan="3"><?=$writer?></td>
					</tr>
					<tr>
						<td align="center">관련 웹툰 제목</td><td><?=$referencedToon?></td>
						<td align="center">총점</td>
						<td>
							<?=$rate?>점
						</td>
					</tr>
					<tr>
						<td align="center">내용</td>
						<td colspan="3"><?=$content?></td>
					</tr>
				<table>
				<br>
				<?php
					if($userid == $writer) {
				?>
					<div>
						<a href="./reviewForm_modify.php?idx=<?=$idx?>" style="font-size:14px; margin-left: 75px; color: black;">수정</a>
						<a href="./deleteReview.php?idx=<?=$idx?>" style="font-size:14px; color: black;">삭제</a>
					</div>
				<?php
					} else if ($userid == 'admin') {
				?>
					<div>
						<a href="./deleteReview.php?idx=<?=$idx?>" style="font-size:14px; margin-left: 75px; color: black;">삭제</a>
					</div>
				<?php
					}
			 	?>
				<a href="./reviewList.php" style="float: right; color: #F46075; font-size: 14px; margin-right: 75px;">목록으로</a>
			</form>
		</div>

		</div>
	</body>
</html>
