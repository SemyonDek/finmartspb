function updPrice(id) {
  document.getElementById("delivery").value = id;
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/basket/updPrice.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("amount-price").innerHTML =
      xhr.response.getElementById("amount-price").innerHTML;
  };
}

function addOrder() {
  let form = document.getElementById("orderForm");
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
      if (
        element["name"] !== "ratio-delivery" &&
        element["name"] !== "commOrder"
      ) {
        if (element["name"] == "delivery") {
          alert("Выберите способ доставки");
        }
        prov = false;
        document.getElementById(element["name"]).style = style_input_red;
      }
    } else {
      if (element["name"] !== "ratio-delivery") {
        document.getElementById(element["name"]).style = style_input_gray;
      }
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/order/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("index.php");
  };
}
