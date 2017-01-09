let fname = "Fight";
let lname = "OnlineChanel";

let obj = {
    name: 123
};

let level = 10;
export default level;
export { fname, lname, obj }

export function greet(message)
{
    console.log(message);
}

export class Employee
{
    constructor()
    {
        console.log('Method constructor');
    }
    greeting(message)
    {
        console.log(message);
    }
}