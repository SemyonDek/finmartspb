function plusValue(id) {
  let input = document.getElementById("value-prod" + id);
  input.value = Number(input.value) + 1;

  let formData = new FormData();
  formData.append("id", id);
  formData.append("value", input.value);

  var url = "functions/basket/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("amount-prod" + id).innerHTML =
      xhr.response.getElementById("amount-prod").innerHTML;
    document.getElementById("price-amount-value").innerHTML =
      xhr.response.getElementById("price-amount-value").innerHTML;
  };
}

function minusValue(id) {
  let input = document.getElementById("value-prod" + id);
  if (Number(input.value) > 1) {
    input.value = Number(input.value) - 1;

    let formData = new FormData();
    formData.append("id", id);
    formData.append("value", input.value);

    var url = "functions/basket/upd.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      document.getElementById("amount-prod" + id).innerHTML =
        xhr.response.getElementById("amount-prod").innerHTML;
      document.getElementById("price-amount-value").innerHTML =
        xhr.response.getElementById("price-amount-value").innerHTML;
    };
  }
}

document.getElementById("order-button").onclick = function () {
  location.assign("order.php");
};

function delBasket(id) {
  let formData = new FormData();
  formData.append("id", id);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response.getElementById("price-amount-value").innerHTML == "") {
      location.assign("index.php");
    } else {
      document.getElementById("basketTable").innerHTML =
        xhr.response.getElementById("basketTable").innerHTML;
      document.getElementById("price-amount-value").innerHTML =
        xhr.response.getElementById("price-amount-value").innerHTML;
    }
  };
}
