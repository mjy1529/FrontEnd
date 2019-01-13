var http = require('http');

http.createServer(function(request, response) {
  //쿠키 추출
  var cookie = request.headers.cookie;

  //쿠키 분해
  cookie = cookie.split(';').map(function(element) {
    var element = element.split('=');
    return {
      key: element[0],
      value: element[1]
    };
  });

  //쿠키 생성
  response.writeHead(200, {
    'Content-Type': 'text/html',
    'Set-Cookie': ['name = Juyoung', 'region = Seoul']
  });

  //응답
  response.end('<h3>' + JSON.stringify(cookie) + '</h3>');

}).listen(3000, function() {
  console.log('Server Running at http://127.0.0.1:3000');
});
