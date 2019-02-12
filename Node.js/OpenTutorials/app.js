//app.js : express에서 권장하는 main 파일명

//express 모듈 추출
var express = require('express');

//express 모듈은 함수이고 application을 리턴한다.
var app = express();
app.locals.pretty = true; //jade 파일의 코드를 정리해줌
app.set('view engine', 'jade'); //jade 템플릿 엔진 설정
app.set('views', './views');

app.use(express.static('public')); //정적인 파일이 위치할 디렉토리를 지정 (public 디렉토리로 지정함)

//app.get() : 라우터, 라우팅 역할을 함!
app.get('/topic', function(req, res) {
  var topics = [
    'Javascript is ...',
    'Nodejs is ...',
    'Express is ...'
  ];
  var output = `
    <a href='/topic?id=0'>JavaScript</a><br>
    <a href='/topic?id=1'>Nodejs</a><br>
    <a href='/topic?id=2'>Express</a><br><br>
    ${topics[req.query.id]}
  `
  res.send(output);
});

app.get('/template', function(req, res) {
  res.render('temp', { //temp라는 템플릿 파일을 렌더링함
    time: Date(), //jade template에 변수값을 주입하고 싶다면 매개변수로 객체에 값을 넣어준다!!
    title: 'Jade Template Title'
  });
});

app.get('/', function(req, res) {
  res.send('Hello Home Page');
});

app.get('/dynamic', function(req, res) {
  var list = '';
  for (var i = 0; i < 5; i++) {
    list = list + '<li>coding</li>';
  }
  var time = Date();
  var output = `<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      Hello Dynamic!
      <ul>
        ${list} <!-- 변수 -->
      </ul>
      ${time}
    </body>
  </html>
  `;
  res.send(output)
});

app.get('/route', function(req, res) { //정적인 파일(html이나 이미지)을 서비스하기 위한 방법
  res.send('Hello Sample Image<br> <img src="/sample.png">');
});

app.get('/login', function(req, res) {
  res.send('<h1>Login please</h1>');
});

app.listen(3000, function() {
  console.log('Connected 3000 port!');
});
