/**
 * Created by cuong on 1/8/17.
 */
var name = "Fight Light Diamond";
var message = `
    Welcome ${name} to new the world
`;
console.log(message);

var colorNames = [ 'Red', 'White', 'Blue', 'Green'];
console.log('-------------Array in----------------');
for(let index in colorNames)
{
    console.log(index);
    console.log(colorNames[index]);
}
console.log('---------------Array of --------------');
for(let item of colorNames)
{
    console.log(item);
}

var colorNames = {
    'Red': 12, 'White': 3, 'Blue': 9, 'Green': 7
};
console.log('-----------Object in ------------------');
for(let index in colorNames)
{
    console.log(index);
    console.log(colorNames[index]);
}
console.log('-------------- not Object of ---------------');
for(let item of colorNames)
{
    console.log(item);
}

console.log('---------------String-------------------')

for(let index in name)
{
    console.log(index);
}
for(let item of name)
{
    console.log(item);
}