/*
*Let có 3 tính chất : chỉ trong block({}), không thể khai báo 2 lần và không hỗ trợ hosting
* */
function greetPerson(name) {
    var greet;
    if (name === 'Chandler') {
        greet = 'Hello Chandler';
    }
    else {
        greet = 'Hi there';
    }
    console.log(greet);
}
greetPerson('Chandler');
var a = 1;
var b = 2;
if (a === 1) {
    var b_1 = 10;
    var a = 20;
}
console.log(a);
console.log(b);
