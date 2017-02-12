var _loop_1 = function (i_1) {
    setTimeout(function () {
        console.log(i_1);
    }, 1000);
};
for (var i_1 = 1; i_1 <= 10; i_1++) {
    _loop_1(i_1);
}
for (var i = 1; i <= 10; i++) {
    (function (x) {
        setTimeout(function () {
            console.log(x);
        }, 1000);
    })(i);
}
