let valueInput = document.getElementById("value-input");
let minusBtn = document.getElementById("minus-value");
let plusBtn = document.getElementById("plus-value");

minusBtn.onclick = function () {
  if (Number(valueInput.value) > 1) {
    valueInput.value = Number(valueInput.value) - 1;
  }
};

plusBtn.onclick = function () {
  valueInput.value = Number(valueInput.value) + 1;
};

let descTub = document.getElementById("desc-tub");
let charTub = document.getElementById("char-tub");
let reviewTub = document.getElementById("review-tub");
let descBlock = document.getElementById("desc-block");
let charBlock = document.getElementById("char-block");
let reviewBlock = document.getElementById("review-block");

descTub.onclick = function () {
  document
    .getElementsByClassName("tab-item-active")[0]
    .classList.remove("tab-item-active");
  descTub.classList.add("tab-item-active");
  document
    .getElementsByClassName("info-block-active")[0]
    .classList.remove("info-block-active");
  descBlock.classList.add("info-block-active");
};

charTub.onclick = function () {
  document
    .getElementsByClassName("tab-item-active")[0]
    .classList.remove("tab-item-active");
  charTub.classList.add("tab-item-active");
  document
    .getElementsByClassName("info-block-active")[0]
    .classList.remove("info-block-active");
  charBlock.classList.add("info-block-active");
};

reviewTub.onclick = function () {
  document
    .getElementsByClassName("tab-item-active")[0]
    .classList.remove("tab-item-active");
  reviewTub.classList.add("tab-item-active");
  document
    .getElementsByClassName("info-block-active")[0]
    .classList.remove("info-block-active");
  reviewBlock.classList.add("info-block-active");
};

let rateitStar1 = document.getElementById("rateit-star-1");
let rateitStar2 = document.getElementById("rateit-star-2");
let rateitStar3 = document.getElementById("rateit-star-3");
let rateitStar4 = document.getElementById("rateit-star-4");
let rateitStar5 = document.getElementById("rateit-star-5");

function clearStar() {
  let fillList = document.getElementsByClassName("fill-star-rateit");
  for (i = 0; i < fillList.length; i + 1) {
    fillList[i].classList.add("clear-star-rateit");
    fillList[i].classList.remove("fill-star-rateit");
  }
}

function addStar(value) {
  let starList = document.getElementsByClassName("star-rateit-item");
  document.getElementById("rateit").value = value;
  for (i = 0; i < value; i++) {
    starList[i].classList.remove("clear-star-rateit");
    starList[i].classList.add("fill-star-rateit");
  }
}

rateitStar1.onclick = function () {
  clearStar();
  addStar(1);
};

rateitStar2.onclick = function () {
  clearStar();
  addStar(2);
};

rateitStar3.onclick = function () {
  clearStar();
  addStar(3);
};

rateitStar4.onclick = function () {
  clearStar();
  addStar(4);
};

rateitStar5.onclick = function () {
  clearStar();
  addStar(5);
};

function addReview() {
  let prodid = document.getElementById("prodid").value;
  let rateit = document.getElementById("rateit").value;
  let commtext = document.getElementById("commtext").value;

  prov = true;
  if (rateit == "") {
    alert("Поставьте оценку");
    prov = false;
  }
  if (commtext == "") {
    alert("Напишите комментарий");
    prov = false;
  }

  if (prov) {
    let formData = new FormData();
    formData.append("prodid", prodid);
    formData.append("rateit", rateit);
    formData.append("commtext", commtext);

    var url = "functions/reviews/add.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      alert("Отзыв отправлен");
      console.log(xhr.response);
      document.getElementById("reviews-list").innerHTML =
        xhr.response.getElementById("reviews-list").innerHTML;
      document.getElementById("main-star-review").innerHTML =
        xhr.response.getElementById("main-star-review").innerHTML;
      document.getElementById("review-tub").innerHTML =
        xhr.response.getElementById("review-tub").innerHTML;
    };
  }
}

function addBasket() {
  let prodid = document.getElementById("prodid").value;
  let value = document.getElementById("value-input").value;

  let formData = new FormData();
  formData.append("prodid", prodid);
  formData.append("value", value);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар добавлен в корзину");
    console.log(xhr.response);
  };
}
