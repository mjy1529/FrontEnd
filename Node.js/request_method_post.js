var http = require('http');
var fs = require('fs');
var qs = require('querystring');

http.createServer(function(request, response) {
  if (request.method == 'GET') { //GET 요청
    fs.readFile('index_get.html', function(error, data) { //index 페이지 출력
      response.writeHead(200, {
        'Content-Type': 'text/html'
      });
      response.end(data);
    });
  } else if (request.method == 'POST') { //POST 요청

    response.writeHead(200, {
      'Content-Type': 'text/html'
    });

    //서버가 어떤 단위의 데이터를 수신할 때마다 콜백함수를 실행한다.
    var body = '';
    request.on('data', function(data) {
      body += data;

      var post = qs.parse(body);
      var id = post.id;
      var password = post.password;

      response.end('<h4>id : ' + id + '</h4><h4>password : ' + password +'</h4>');
    });

    //더이상 들어올 데이터가 없을 때 실행
    request.on('end', function() {

    });
  }
}).listen(65535, function() {
  console.log('Server Running at http://127.0.0.1:65535');
});
