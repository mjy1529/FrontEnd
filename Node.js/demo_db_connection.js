var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "1234"
});

con.connect(function(error) {
  if(error) throw error;
  console.log("Connected!");
});
