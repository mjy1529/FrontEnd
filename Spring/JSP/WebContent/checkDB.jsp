<%@page import="java.sql.Connection"%>
<%@ page import="com.juyng.ex.DBConn" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>

<%
	//1. Connection
	Connection conn = DBConn.getMySqlConnection();
	out.print("DB 연결 정보 : " + conn);
%>