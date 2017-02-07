import { fname, lname, obj, greet, Employee } from './moduleB.js'
import { default as lv } from './moduleB.js'

/**
 * Var read only, change thuoc tinh trong doi tuong nhung k change dc ca doi tuong
 */

obj.name = 1234;
console.log(obj.name);
console.log(fname);
console.log(lname);
console.log(lv);
greet('hi');

let emp = new Employee();
emp.greeting("Hello");

// import { fname as f, lname as l } from './moduleB'
//
// console.log(f);
// console.log(l);