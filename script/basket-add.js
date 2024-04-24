function addBasket(id) {
  let prodid = id;
  let value = 1;

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
