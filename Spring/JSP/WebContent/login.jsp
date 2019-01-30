<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%
	//파라미터 받기
	String id = (String) request.getParameter("id");
	String password = (String) request.getParameter("password");
	
	//쿠키 저장
	Cookie cookie = new Cookie("id", id);
	cookie.setMaxAge(60); //초단위 (60 => 1분)
	response.addCookie(cookie);
	
	//이동
	response.sendRedirect("home.jsp");
%>