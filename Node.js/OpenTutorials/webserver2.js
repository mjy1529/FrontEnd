const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

http.createServer(function(request, response) {
  response.writeHead('200', {'Content-Type': 'text/html'});
  response.end('Hello World!');
}).listen(port, hostname, function() {
  //** 작은 따옴표가 아닌 grave accent로 표현함!! **
  console.log(`Server running at http://${hostname}:${port}`);
});
