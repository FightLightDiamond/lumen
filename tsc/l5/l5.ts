for(let i = 1; i<= 10; i++) {
    setTimeout(function(){
        console.log(i);
    }, 1000)
}

for(var i = 1; i<= 10; i++) {
    (function (x) {
        setTimeout(function(){
            console.log(x);
        }, 1000)
    })(i);
}
