//util : 보조적인 유용한 기능들을 모아놓은 모듈
//util.format() : 문자열 반환(출력 X)
//%s : string, %d : number, %j : json

var util = require('util');
var data = util.format('%d, %s, %j', 10, 'hello', {name : 'nod.js'});
console.log(data);
