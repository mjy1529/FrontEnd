//File System 모듈
var fs = require('fs');

//동기 방식으로 파일 읽어오기 (순차적으로 실행)
console.log(1);
var data = fs.readFileSync('data.txt', 'utf8');
console.log(data);

//비동기 방식으로 파일 읽어오기
console.log(2);
fs.readFile('data.txt', 'utf8', function(err, data) {
  console.log(3);
  console.log(data);
});
console.log(4);
