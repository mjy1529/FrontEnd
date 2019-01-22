//http://127.0.0.1:3000/form/login.html

var express = require('express');
var http = require('http');
var bodyParser = require('body-parser');
var static = require('serve-static');
var path = require('path');
var session = require('express-session');

var app = express();

//port 설정
app.set('port', process.env.PORT || 3000);

//bodyParser는 post 요청 데이터 추출
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
  extended: false
}))

app.use('/form', static(path.join(__dirname, 'form')));

//세션 생성
app.use(session({
  secret: 'key',
  resave: false,
  saveUninitialized: true
}));

//라우터 객체 생성
var router = express.Router();

//라우터 함수 등록
router.route('/process/login').post(function(req, res) {
  var paramId = req.body.userId || req.query.userId;
  var paramPassword = req.body.password || req.query.password;

  //세션 저장
  req.session.user = {
    id: paramId,
    password: paramPassword,
    authorized: true
  };
  console.log(req.session.user);

  res.writeHead(200, {
    'Content-Type': 'text/html;charset=utf8'
  });
  res.write('<form method="post" action="/process/register"><h2>게시물 등록</h2>');
  res.write('<table border="1px solid black" width="500">');
  res.write('<tr><td>ID</td><td>' + req.session.user.id + '</td></tr>');
  res.write('<tr><td>제목</td><td><input type="text" name="title" size="40"></td></tr>');
  res.write('<tr><td>내용</td><td><textarea name="content" rows="8" cols="50"></textarea></td></tr>');
  res.write('<tr><td>첨부파일</td><td><input type="file" name="image"></td></tr></table>');
  res.write('<br><input type="submit" value="등록"></form>');
  res.end();
});

router.route('/process/register').post(function(req, res) {
  var paramId = req.session.user.id;
  var paramTitle = req.body.title;
  var paramContent = req.body.content;

  res.writeHead(200, {
    'Content-Type': 'text/html;charset=utf8'
  });
  res.write('<h2>게시물 보기</h2>');
  res.write('<table border="1px solid black" width="500">');
  res.write('<tr><td width=80>ID</td><td>' + req.session.user.id + '</td></tr>');
  res.write('<tr><td>제목</td><td>' + paramTitle + '</td></tr>');
  res.write('<tr><td height=80>내용</td><td>' + paramContent + '</td></tr>');
  res.write('<tr><td>첨부파일</td><td>' + '</td></tr></table>');
  res.end();
});

//라우터 객체를 app 객체에 등록
app.use('/', router);

app.get('*', function(req, res) {
  res.status(404).send('<h3>Page Not Found</h3>');
});

http.createServer(app).listen(app.get('port'), function() {
  console.log('Express server listening on port ' + app.get('port'));
})
