//app.js : express에서 권장하는 main 파일명

//express 모듈 추출
var express = require('express');

//express 모듈이 기본적으로 post 방식을 지원하지 않기 때문에
//post 방식으로 데이터를 받기 위해서는 bodyParser가 꼭 필요하다!!
var bodyParser = require('body-parser');

//express 모듈은 함수이고 application을 리턴한다.
var app = express();
app.locals.pretty = true; //jade 파일의 코드를 정리해줌
app.set('view engine', 'jade'); //jade 템플릿 엔진 설정
app.set('views', './views');

app.use(express.static('public')); //정적인 파일이 위치할 디렉토리를 지정 (public 디렉토리로 지정함)
app.use(bodyParser.urlencoded({ extended: false })) //bodyParser 연결

//app.get() : 라우터, 라우팅 역할을 함!
app.get('/form', function(req, res) {
  res.render('form');
});

app.get('/form_receiver', function(req, res) {
  var title = req.query.title;
  var description = req.query.description;
  res.send(title + ", " + description);
});

app.post('/form_receiver', function(req, res) {
  var title = req.body.title;
  var description = req.body.description;
  res.send(title + ', ' + description);
});

app.get('/topic/:id', function(req, res) {
  var topics = [
    'Javascript is ...',
    'Nodejs is ...',
    'Express is ...'
  ];
  var output = `
    <a href='/topic/0'>JavaScript</a><br>
    <a href='/topic/1'>Nodejs</a><br>
    <a href='/topic/2'>Express</a><br><br>
    ${topics[req.params.id]}
  ` //semantic url 방식으로 매개변수를 받고 싶다면 req.query가 아니라 req.params로 받으면 됨.

  res.send(output);
});

app.get('/topic/:id/:mode', function(req, res) {
  res.send(req.params.id + ", " + req.params.mode);
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
