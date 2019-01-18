// http://127.0.0.1:3000/?id=juyoung&pw=1234으로 요청하기

var express = require('express');
var app = express();

//미들웨어
app.use(function(request, response, next) {
  //파라미터 받기
  var id = request.param('id'); //파라미터명이 id인 값 받기
  var pw = request.param('pw'); //파라미터명이 pw인 값 받기

  response.send('<h3> id : ' + id +', password : ' + pw + '</h3>');
});

app.listen(3000, function() {
  console.log('Server running at http://127.0.0.1:3000');
})
