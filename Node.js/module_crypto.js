var crypto = require('crypto');

//해시 생성
var shasum = crypto.createHash('sha1'); //매개변수로 전달된 알고리즘에 해당하는 Hash클래스 반환
shasum.update('hello world'); //데이터 해싱
var output = shasum.digest('hex'); //데이터 인코딩
console.log(output);

//암호화 및 복호화
var text = "hello nodejs"; //암호화할 텍스트
var key = "myKey";

//암호화
var cipher = crypto.createCipher('aes192', key); //cipher 객체 생성
cipher.update(text, 'utf8', 'base64'); //인코딩(utf8 문자열을 base64 형태로 암호화)
var cipherOutput = cipher.final('base64'); //결과값 얻기

//복호화
var decipher = crypto.createDecipher('aes192', key);
decipher.update(cipherOutput, 'base64', 'utf8'); //인코딩(base64 형태의 문자열을 utf8 문자열로 변환)
var decipherOutput = decipher.final('utf8'); //결과값 얻기

//출력
console.log('기존 문자열 : ' + text);
console.log('암호화된 문자열 : ' + cipherOutput);
console.log('복호화된 문자열 : ' + decipherOutput);
