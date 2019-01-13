var express = require('express');

var app = express(); //express 모듈은 함수이기 때문에

//app.get() - 라우터, 라우팅 역할을 함
//router : 사용자의 요청을 어떤 controller에 전달할 것인가 결정
//controller : 회원가입, 홈페이지, 에러화면 등 처리

app.get('/', function(reqeust, response) { //루트 페이지를 요청했을 때
  response.send('Hello home page');
});
app.get('/login', function(request, response) { //로그인 페이지를 요청했을 때
  response.send('Login please');
});
app.listen(3000, function() {
  console.log('Connected 3000 port!');
});
