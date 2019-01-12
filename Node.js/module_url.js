var http = require('http');
var fs = require('fs');
var url = require('url');

http.createServer(function(request, response) {
  var pathname = url.parse(request.url).pathname;
  console.log(pathname);
  //http://127.0.0.1:3000 이후가 pathname!!

  //페이지 구분
  if (pathname == '/') {
    //index 파일 읽기
    fs.readFile('index_url.html', function(error, data) {
      response.writeHead(200, {
        'Content-Type': 'text/html'
      });
      response.end(data);
    });

  } else if (pathname == '/nextPage') {
    fs.readFile('index_url_nextPage.html', function(error, data) {
      response.writeHead(200, {
        'Content-Type': 'text/html'
      });
      response.end(data);
    });
  } else {
    response.writeHead(404, {
      'Content-Type': 'text/html; charset=utf-8'
    });
    response.end('<h2 align=center>죄송합니다. 잘못된 요청입니다 :(<h2>');
  }

}).listen(3000, function() {
  console.log('Server Running at http://127.0.0.1:3000');
});
