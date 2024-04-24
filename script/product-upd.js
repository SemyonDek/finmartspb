document.getElementById("updPhoto").onclick = function () {
  let form = document.getElementById("updPhotoForm");

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
      if (element["name"].startsWith("imgProd")) {
        alert("Добавьте изображение");
      }
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/products/updPhoto.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("photo-prod-block").innerHTML =
      xhr.response.getElementById("photo-prod-block").innerHTML;
  };
};

document.getElementById("updProd").onclick = function () {
  let form = document.getElementById("updProdForm");

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

  var url = "../functions/products/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар изменен");
  };
};

function delProd(prodid) {
  let formData = new FormData();
  formData.append("prodid", prodid);

  var url = "../functions/products/del.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар удален");
    window.location.replace("catalog.php?catid=0");
  };
}
