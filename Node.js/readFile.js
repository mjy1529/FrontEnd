//파일 읽기
//fs.readFile(filename, [options], callback)
//filename의 파일을 [options]의 방식으로 읽은 후 callback으로 전달된 함수를 호출(비동기)

//fs.readFileSync(filename, [options])
//filename의 파일을 [options]의 방식으로 읽은 후 문자열 반환(동기적)

//[options]에는 보통 인코딩 방식이 오게 되며 utf8을 주로 사용함

var fs = require('fs');

//동기적 읽기
var text = fs.readFileSync('sampleText.txt', 'utf8');
console.log("동기적 읽기 : ", text);

//비동기적 읽기 (매개변수로 error와 data)
fs.readFile('sampleText.txt', 'utf8', function(error, data) {
  console.log("비동기적 읽기 : ", data);
});
