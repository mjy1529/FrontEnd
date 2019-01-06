//동기적 방식의 예외 처리
var fs = require('fs');

//파일 읽기
try {
  //존재하지 않는 파일 읽기 시도
  var data = fs.readFileSync('nonExist.txt', 'utf8');
  console.log(data);
} catch (error) {
  console.log(error);
}

//파일 쓰기
try {
  //루트 위치에 파일 쓰기 시도(권한 거부)
  fs.writeFileSync('/unauthorized.txt', 'Hello World', 'utf8');
  console.log('파일 쓰기 성공');
} catch (error) {
  console.log(error);
}
