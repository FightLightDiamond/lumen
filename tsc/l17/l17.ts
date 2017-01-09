/**
 * Created by cuong on 1/8/17.
 */
class Person
{
    run()
    {
        return ('Person is running ... ')
    }
}

let p1 = new Person();
console.log('Person => typeof')
console.log(typeof Person);
console.log('p1 = new Person => typeof')
console.log(typeof p1);

console.log('equal prototype');
console.log(p1.run() === Person.prototype.run());
console.log(p1.run());