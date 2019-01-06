//exports가 module 객체가 되어 메서드에 접근함.
var module = require('./module.js'); //괄호 안에는 파일 경로 입력

console.log('abs(-273) = %d', module.abs(-273));
console.log('circleArea(3) = %d', module.circleArea(3));
