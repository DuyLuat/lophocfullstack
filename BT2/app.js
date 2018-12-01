
function toMau(id) {
  var element = document.getElementById(id);
  element.classList.add("mystyle");
}

function xoaMau(id) {
  setTimeout(function() {
    var element = document.getElementById(id);
    element.classList.remove("mystyle");
  }, 990);
}

function chonO() {
  var tmp = Math.floor(Math.random() * 16);
  var btn = "btn" + tmp;
  return btn;
}

var playGame = null;
var point = 0;
var tmp = 1;

function play() {
  var btn = document.getElementById("play");
  if (tmp) {
    playGame = setInterval(function toMauNgauNhien() {
      var oToMau = chonO();
      toMau(oToMau);
      xoaMau(oToMau);
    }, 1000);
    btn.innerHTML = "Stop";
    tmp = 0;
  } else {
    clearInterval(playGame);
    btn.innerText = "Play";
    tmp = 1;
  }
}

function clickBtn(id) {
  var element = document.getElementById(id);
  var classNames = document.getElementById(id).className;

  if (classNames === "btn_cell mystyle") {
    point++;
    element.classList.remove("mystyle");
    var result = document.getElementById("score");
    var resulthtml = "ĐIỂM: " + point;
    result.innerText = resulthtml;
  }
}

