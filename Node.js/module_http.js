//서버 생성
var server = require('http').createServer();

//서버 객체에 이벤트 연결
server.on('request', function() {
  console.log('Request On');
});

server.on('connection', function() {
  console.log('Connection On');
});

server.on('close', function() {
  console.log('Close On');
});

//서버 실행
server.listen(52273, function() {
  console.log('Server Running at http://127.0.0.1:52273');
});
