var timer = function() {
  var t;
  window.onload = resetTimer;

  document.onchange = resetTimer;

  function logout() {
    var temp = document.getElementsByClassName("example_form")[0];
    temp.style.display = 'block'
  }

  function resetTimer() {
    clearTimeout(t);
    t = setTimeout(logout, 60 * 1000)
  }
};


var p_shown = document.getElementsByClassName("nav_div")[0];
var template_button = document.getElementById("template");

template_button.addEventListener("click", function() {
  var temp = document.getElementsByClassName("example_form")[0];
  if (temp.style.display == "block") {
    temp.style.display = "none";

  } else {

    temp.style.display = "block";
  }
}, false)

p_shown.addEventListener("mouseover", function() {
  var temp = [...document.getElementsByClassName("p_hidden")];
  for (var i = 0; i < temp.length; i++) {
    temp[i].style.display = "block";
  }
}, false)

p_shown.addEventListener("mouseout", function() {
  var temp = [...document.getElementsByClassName("p_hidden")];
  for (var i = 0; i < temp.length; i++) {
    temp[i].style.display = "none";
  }
}, false)
