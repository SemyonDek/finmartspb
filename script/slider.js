let count = document.getElementById("count-page-slider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("left-slider-button");
let right_btn = document.getElementById("right-slider-button");
let pageslider = 1;

function moveslider(n) {
  slider.style.left = "-" + (pageslider + n - 1) * 260 + "px";
}

right_btn.onclick = function () {
  if (pageslider < count) {
    moveslider(1);
    pageslider++;
  }
};
left_btn.onclick = function () {
  if (pageslider > 1) {
    moveslider(-1);
    pageslider--;
  }
};
