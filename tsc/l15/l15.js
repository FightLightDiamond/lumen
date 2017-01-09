/**
 * Created by cuong on 1/8/17.
 */
var name = "Fight Light Diamond";
var message = "\n    Welcome " + name + " to new the world\n";
console.log(message);
var colorNames = ['Red', 'White', 'Blue', 'Green'];
console.log('-------------Array in----------------');
for (var index in colorNames) {
    console.log(index);
    console.log(colorNames[index]);
}
console.log('---------------Array of --------------');
for (var _i = 0, colorNames_1 = colorNames; _i < colorNames_1.length; _i++) {
    var item = colorNames_1[_i];
    console.log(item);
}
var colorNames = {
    'Red': 12, 'White': 3, 'Blue': 9, 'Green': 7
};
console.log('-----------Object in ------------------');
for (var index in colorNames) {
    console.log(index);
    console.log(colorNames[index]);
}
console.log('-------------- not Object of ---------------');
for (var _a = 0, colorNames_2 = colorNames; _a < colorNames_2.length; _a++) {
    var item = colorNames_2[_a];
    console.log(item);
}
console.log('---------------String-------------------');
for (var index in name) {
    console.log(index);
}
for (var _b = 0, name_1 = name; _b < name_1.length; _b++) {
    var item = name_1[_b];
    console.log(item);
}
