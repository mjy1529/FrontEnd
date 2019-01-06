//동기적 방식의 예외 처리
var fs = require('fs');

//파일 읽기
//존재하지 않는 파일 읽기 시도
fs.readFile('nonExist.txt', 'utf8', function(error, data) {
  if(error) {
    //파일 읽기 실패
    console.log(error);
  } else {
    //파일 읽기 성공
    console.log(data);
  }
});

//파일 쓰기
//루트 위치에 파일 쓰기 시도(권한 거부)
fs.writeFile('/unauthorized.txt', 'Hello World', 'utf8', function(error, data) {
  if(error) {
    //파일 쓰기 실패
    console.log('파일 쓰기 실패');
  } else {
    //파일 쓰기 성공
    console.log('파일 쓰기 성공');
  }
});
