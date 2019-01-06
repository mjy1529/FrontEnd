//파일 쓰기
//fs.writeFile(filename, data, [options], callback)
//filename의 파일에 [options]의 방식으로 data 내용을 쓴 후 callback 함수를 호출(비동기적)

//fs.writeFileSync(filename, data, [options])
//filename의 파일에 [options]의 방식으로 data 내용을 씀(동기적)

var fs = require('fs');
var data = 'Hello FileSystem';

//비동기적 쓰기
fs.writeFile('sampleText2.txt', data, 'utf8', function(error) {
  console.log('비동기적 쓰기 완료');
});

//동기적 쓰기
fs.writeFileSync('sampleText3.txt', data, 'utf8');
console.log('동기적 쓰기 완료');
