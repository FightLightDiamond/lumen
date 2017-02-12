var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
/**
 * Created by cuong on 1/8/17.
 */
var Person = (function () {
    function Person(name) {
        console.log(name + ' go on ');
    }
    Person.prototype.getId = function () {
        return 10;
    };
    return Person;
}());
var Employee = (function (_super) {
    __extends(Employee, _super);
    function Employee(name) {
        _super.call(this, name);
        console.log(name + ' Employee constructor');
    }
    Employee.prototype.getId = function () {
        return _super.prototype.getId.call(this);
    };
    return Employee;
}(Person));
var em = new Employee("TEDU");
console.log(em.getId());
