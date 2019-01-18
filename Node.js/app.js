var http = require('http');
var express = require('express');

//request body를 json 형식으로 변환해주는 모듈
var bodyParser = require('body-parser');

var app = express();
var router = express.Router();

router.use(function(request, reseponse, next) {
  console.log(request.method, request.url);
  next();
});

app.route('/')
.get(function(request, response) {
  response.send('<h3>This is TEST SERVER by Nodejs</h3>');
})
.post(function(request, response) {
  console.log('POST CALL');
  var product = request.param('product');
  var id = request.param('id');

  if(product == '1' && id == '2') {
    response.send('ok');
  } else {
    response.send('Fail');
  }
});

http.createServer(app).listen(8000, function() {
  console.log('Server running at http://127.0.0.1:8000');
});
