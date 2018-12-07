<?
	session_start();
	if (!$userid) {
		echo("
			 <script>
			 	 alert('로그인 후 작성가능합니다');
				 history.go(-1);
			 </script>
		");
	}
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
		<script>
		function check_input()
		{
			if (!document.review_form.title.value)
			 {
					 alert("제목을 입력하세요");
					 document.review_form.title.focus();
					 return;
			 }

			if (!document.review_form.referencedToon.value)
			 {
					 alert("관련 웹툰 제목을 입력하세요.");
					 document.review_form.referencedToon.focus();
					 return;
			 }

			if (!document.review_form.content.value)
			 {
					 alert("내용을 입력하세요");
					 document.review_form.content.focus();
					 return;
			 }

			document.review_form.submit();
		}
		</script>
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
			<h4 align="center">리뷰 작성</h4>
			<form name="review_form" method="post" action="insertReview.php">
				<table cellpadding="8" border="1px" align="center" width="850px">
					<tr>
						<td align="center">제목</td><td colspan="3"><input type="text" name="title" size="50"/></td>
					</tr>
					<tr>
						<td align="center">작성자</td><td colspan="3"><?= $_SESSION['userid'] ?></td>
					</tr>
					<tr>
						<td align="center">관련 웹툰 제목</td><td><input type="text" name="referencedToon" size="40"/></td>
						<td align="center">총점</td>
						<td>
							<select name="rate">
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
							</select>&nbsp;점
						</td>
					</tr>
					<tr>
						<td align="center">내용</td>
						<td colspan="3"><textarea cols="100" rows="17" name="content"></textarea></td>
					</tr>
				<table>
				<button type="button" style="margin-top: 10px; margin-right: 75px; float: right;"
						onclick="check_input()">작성 완료</button>
				<button type="button" style="margin-top: 10px; margin-right: 10px; float: right;" onclick="history.go(-1)">취소</button>

			</form>
		</div>

		</div>
	</body>
</html>
