let orderTub = document.getElementById("order-tub");
let infoTub = document.getElementById("info-tub");
let orderBlock = document.getElementById("order-block");
let infoBlock = document.getElementById("info-block");

orderTub.onclick = function () {
  document
    .getElementsByClassName("tab-item-active")[0]
    .classList.remove("tab-item-active");
  orderTub.classList.add("tab-item-active");
  document
    .getElementsByClassName("info-block-active")[0]
    .classList.remove("info-block-active");
  orderBlock.classList.add("info-block-active");
};

infoTub.onclick = function () {
  document
    .getElementsByClassName("tab-item-active")[0]
    .classList.remove("tab-item-active");
  infoTub.classList.add("tab-item-active");
  document
    .getElementsByClassName("info-block-active")[0]
    .classList.remove("info-block-active");
  infoBlock.classList.add("info-block-active");
};

document.getElementById("account-button").onclick = function () {
  let form = document.getElementById("updAccountForm");
  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #f2f2f2;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/account/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    alert("Данные изменены");
  };
};
