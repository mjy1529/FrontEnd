var http = require('http');
var fs = require('fs');

//65535 포트에 서버 생성 및 실행 (html)
http.createServer(function(request, response) {
  response.writeHead(200, {
    'Content-Type': 'text/html'
  });
  response.end('<h1>Hello Web Server with Node.js</h1>');

}).listen(65535, function() {
  console.log('Server Running at http://127.0.0.1:65535');
});

//65534 포트에 서버 생성 및 실행 (html 파일)
http.createServer(function(request, response) {
  fs.readFile('HTMLpage.html', function(error, data) {
    response.writeHead(200, {
      'Content-Type': 'text/html'
    });
    response.end(data);
  });
}).listen(65534, function() {
  console.log('Server Running at http://127.0.0.1:65534');
});

//65533 포트에 서버 생성 및 실행 (이미지)
http.createServer(function(request, response) {
  fs.readFile('LIONKING.jpg', function(error, data) {
    response.writeHead(200, {
      'Content-Type': 'image/jpeg'
    });
    response.end(data);
  });
}).listen(65533, function() {
  console.log('Server Running at http://127.0.0.1:65533');
});

//65532 포트에 서버 생성 및 실행 (mp3)
http.createServer(function(request, response) {
  fs.readFile('Justin_Bieber-Love_Yourself.mp3', function(error, data) {
    response.writeHead(200, {
      'Content-Type': 'audio/mp3'
    });
    response.end(data);
  });
}).listen(65532, function() {
  console.log('Server Running at http://127.0.0.1:65532');
});
