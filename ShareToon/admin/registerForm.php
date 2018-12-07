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
			td {
				font-size: 14px;
			}
		</style>
		<script>
		function check_title() {
			window.open("check_title.php?title=" +
			document.register_form.title.value,
					"TITLEcheck",
					"left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
		}

		function check_input()
		{
			if (!document.register_form.title.value)
			 {
					 alert("제목을 입력하세요");
					 document.register_form.title.focus();
					 return;
			 }

			if (!document.register_form.writer.value)
			 {
					 alert("작가를 입력하세요");
					 document.register_form.writer.focus();
					 return;
			 }

			if (!document.register_form.day.value)
			 {
					 alert("연재 요일을 입력하세요");
					 document.register_form.day.focus();
					 return;
			 }

			if (!document.register_form.genre.value)
			 {
					 alert("장르를 입력하세요");
					 document.register_form.genre.focus();
					 return;
			 }

			if (!document.register_form.url.value )
			{
					alert("웹툰 사이트 URL을 입력하세요");
					document.register_form.url.focus();
					return;
			}

			if (!document.register_form.image.value )
			{
					alert("메인 이미지의 파일명을 입력하세요");
					document.register_form.url.focus();
					return;
			}

			document.register_form.submit();
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
				<li><a href="index.php">WEBTOON</a></li>
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
		<div id="content" style="padding-left: 20px;">
			<h4>등록할 웹툰 정보를 입력해주세요:)</h4>
			<form name="register_form" method="post" action="register.php">
				<table cellpadding="8" width="800px">
					<tr>
						<td>* 제목</td><td><input type="text" name="title" size="30"/> <button type="button" onclick="check_title();">중복확인</button></td>
					</tr>
					<tr>
						<td>* 작가</td><td><input type="text" name="writer"/></td>
					</tr>
					<tr>
						<td>* 연재 요일</td>
						<td>
							<select name="day" style="width: 50px;">
								<option value="월">월</option><option value="화">화</option><option value="수">수</option>
								<option value="목">목</option><option value="금">금</option><option value="토">토</option>
								<option value="일">일</option>
							</select>&nbsp;요일
						</td>
					</tr>
					<tr>
						<td>* 장르</td><td><input type="text" name="genre"/></td>
					</tr>
					<tr>
						<td>줄거리</td><td><textarea name="plot" cols="50" rows="5"></textarea></td>
					</tr>
					<tr>
						<td>평점</td>
						<td>
							<select name="rate" style="width: 50px;">
								<option value="5">5</option><option value="4">4</option><option value="3">3</option>
								<option value="2">2</option><option value="1">1</option>
							</select>&nbsp;점
						</td>
					</tr>
					<tr>
						<td>연재 사이트</td>
						<td>
							<select name="site" style="width: 80px;">
								<option value="naver">네이버</option><option value="daum">다음</option><option value="lezhin">레진코믹스</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>* 사이트 URL</td><td><input type="text" name="url" size="60"/></td>
					</tr>
					<tr>
						<td>* 메인 이미지 파일명</td><td><input type="text" name="image" size="30"/></td>
					</tr>
					<tr>
						<td colspan="2" align=right style="font-size: 12px; color: red;">* 표시는 필수입력입니다.&nbsp;&nbsp;
							<button type="button" onclick="check_input()">등록</button>
						</td>
					<tr>
				<table>
			</form>
		</div>

		</div>
	</body>
</html>
