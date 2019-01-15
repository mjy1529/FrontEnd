var mysql = require('mysql');

var connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '1234',
  database: 'nodejs'
});

connection.connect(function(error) {
  console.log('Connected!');
});

var sql = 'SELECT * FROM topic';
connection.query(sql, function(err, rows, fields) {
  if(err) {
    console.log(err);
  } else {
    console.log('rows', rows);
    console.log('fields', fields);
  }
});
