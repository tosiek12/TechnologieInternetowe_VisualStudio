function koloruj() {
    var elems = document.getElementsByClassName("pasmo");

    for (var i = 0; i < elems.length; i++) {
        elems[i].setAttribute('bgcolor', '#00FF00');
    }
};
function dodajObraz() {
    var elem = document.getElementById("wstaw");
    elem.innerHTML = "<h1>tst</h1>";
    elem.innerHTML = "<img src='grafika.jpg' border='0' width='200' height='130'/>";
};