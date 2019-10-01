
var danhsach = document.getElementById("danhsach");
var menu = document.getElementById("menu");
var xem = document.querySelector(".xapsep");
// console.log(xem);
var tt = true;
danhsach.addEventListener('click', function () {
    if (tt === true) {
        xem.classList.add('xapsep2');
        xem.classList.remove('xapsep');
        return tt = false;
    }
});
menu.addEventListener('click',function(){
    if ( tt === false){
        xem.classList.add('xapsep');
        xem.classList.remove('xapsep2');
        return tt = true;
    }
});

