/**
 * Created by cuong on 1/8/17.
 */
class Person
{
    constructor(name)
    {
        console.log(name + ' go on ')
    }
    getId()
    {
        return 10;
    }
}

class Employee extends Person
{
    constructor(name)
    {
        super(name);
        console.log(name + ' Employee constructor');
    }
    getId(){
        return super.getId();
    }
}

var em = new Employee("TEDU");
console.log(em.getId());