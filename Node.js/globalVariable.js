//전역 변수
//문자열 자료형의 전역변수
//__filename : 현재 실행중인 코드의 파일 경로
//__dirname : 현재 실행중인 코드의 폴더 경로
console.log('filename :', __filename);
console.log('dirname :', __dirname);

//전역객체
//console : 콘솔화면과 관련된 기능을 다루는 객체
//log() : 출력
//time(label) : 시간 측정 시작
//timeEnd(label) : 시간 측정 종료
console.time('alpha');
var output = 1;
for (var i = 1; i <= 10; i++) {
  output *= i;
}
console.log('result :', output);
console.timeEnd('alpha');
