//이벤트 연결(addListener, on)
//프로그램이 끝났을 때(exit) 다음과 같은 함수(function)를 실행함

//addListener 메소드
process.addListener('exit', function() {
  console.log('exit 이벤트 연결');
});

//on 메소드
process.on('exit', function(code) {
  console.log('종료 코드: ' + code);
});

process.on('uncaughtException', function(error) {
  console.log('에러 메시지 : ' + error);
});

//존재하지 않는 함수 실행 (예외 발생)
nonExistenceFunction();
console.log('예외가 발생한 이후 구문은 실행되지 않음');
