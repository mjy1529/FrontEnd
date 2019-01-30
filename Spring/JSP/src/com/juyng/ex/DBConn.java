package com.juyng.ex;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConn {
	public static Connection getMySqlConnection() {
		Connection conn = null;
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			
			//프로토콜://서버:포트번호/DB이름
			//timeZone 에러 발생으로 파라미터 추가
			String url = "jdbc:mysql://localhost:3306/spring?serverTimezone=UTC";
			String user = "root";
			String password = "1111";
			
			conn = DriverManager.getConnection(url, user, password);
		} catch (ClassNotFoundException | SQLException e) {
			e.printStackTrace();
		}
		return conn;
	}
}
