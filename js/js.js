
// Задание js 1
document.write('' +
    '<html><body>' +
    '<div class="btn-group">' +
        '<div id="btn1" class="btn"><p>popup</p></div>' +
        '<div id="btn2" class="btn"><p>popup</p></div>' +
        '<div id="btn3" class="btn"><p>popup</p></div>' +
    '</div>' +
    '</body></html>');

let btn1 = document.getElementById('btn1');
let btn2 = document.getElementById('btn2');
let btn3 = document.getElementById('btn3');

btn1.addEventListener("click", changeColor)
btn2.addEventListener("click", changeColor)
btn3.addEventListener("click", changeColor)

function changeColor (){
    this.style.backgroundColor = "blue" ;
}


//Задание js 2

document.write('<button id="url">get</button>')

let newGetParams = ['set', 'set1', 'set2'];
let url = document.getElementById('url');

function setGetParams(newGetParams) {
    let newString

    newGetParams.forEach(function callback( value, key){
        if(location.search === '')
            newString += key + '=' + value;
        else
            newString += '&' + key + '=' + value;
    });

    window.location.replace(window.location.href + "?" + newString);
}

url.addEventListener("click", function () {
    setGetParams(newGetParams);
})


//Задание css

let cont1 = document.getElementById('cont-1');
let cont2 = document.getElementById('cont-2');
let cont3 = document.getElementById('cont-3');


cont1.addEventListener("click", changeColor)
cont2.addEventListener("click", changeColor)
cont3.addEventListener("click", changeColor)
