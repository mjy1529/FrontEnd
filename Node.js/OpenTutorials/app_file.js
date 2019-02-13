var express = require('express');
var bodyParser = require('body-parser'); //post방식으로 보내진 데이터를 받기 위해 사용
var fs = require('fs');
var app = express();
app.locals.pretty = true; //jade 파일의 html코드를 페이지 소스보기 할 때 줄바꿈하여 보여줌

app.set('views', './views_file'); //jade 파일 경로 설정
app.set('view engine', 'jade');

app.use(bodyParser.urlencoded({ extended: false }));

app.get('/topic', function(req, res) {
  fs.readdir('data', function(err, files) {
    if(err) {
      console.log(err);
      res.status(500).send('Internal Server Error');
    }
    res.render('view', {topics: files});
  });
});

app.post('/topic', function(req, res) {
  var title = req.body.title;
  var description = req.body.description;
  fs.writeFile('data/' + title, description, function(err) {
    if(err) { //오류가 있다면 err값은 true
      console.log(err); //상세 에러는 콘솔에 출력
      res.status(500).send('Internal Server Error');
    }
    res.send('Success!');
  });
});

app.get('/topic/:id', function(req, res) {
  var id = req.params.id;

  fs.readdir('data', function(err, files) {
    if(err) {
      console.log(err);
      res.status(500).send('Internal Server Error');
    }

    fs.readFile('data/' + id, 'utf8', function(err, data) {
      if(err) {
        console.log(err);
        res.status(500).send('Internal Server Error');
      }
      res.render('view', { topics: files, title: id, description: data });
    });
  });
});

app.get('/topic/new', function(req, res) {
  res.render('new');
});

//3000번 포트에 연결되면 콜백함수가 호출됨
app.listen(3000, function() {
  console.log('Connected 3000 port!');
});
