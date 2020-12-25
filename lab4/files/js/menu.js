var p_shown = document.getElementsByClassName("nav_div")[0];

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
