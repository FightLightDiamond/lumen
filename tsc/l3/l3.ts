/*
* hosting co che di chuyen bien khai bao hien tai len dau cua scope(script && function) hien tai
  * su dung truoc khi duoc khai bao
* */

function greetPersson(name) {

    if(name === 'Chandler') {
        greet = 'Hello Chandler';
    } else {
        greet = 'Hi there';
    }
    console.log(greet);
    var greet;
}

greetPersson('Chandler');