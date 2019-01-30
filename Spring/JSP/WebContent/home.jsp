<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%
	Cookie[] cookies = request.getCookies();

	String id = "";
	for(int i=0; i<cookies.length; i++) {
		id = cookies[i].getValue();
	}
%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home</title>
</head>
<body>
	<h2>Home</h2>
	<%=id %>님 안녕하세요 :)<br>
	<br>
	<a href="logout.jsp">로그아웃</a>
</body>
</html>