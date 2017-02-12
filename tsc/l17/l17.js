/**
 * Created by cuong on 1/8/17.
 */
var Person = (function () {
    function Person() {
    }
    Person.prototype.run = function () {
        return ('Person is running ... ');
    };
    return Person;
}());
var p1 = new Person();
console.log('Person => typeof');
console.log(typeof Person);
console.log('p1 = new Person => typeof');
console.log(typeof p1);
console.log('equal prototype');
console.log(p1.run() === Person.prototype.run());
console.log(p1.run());
