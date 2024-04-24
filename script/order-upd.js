function updOrder(id) {
  let status = document.getElementById("status").value;
  let formData = new FormData();
  formData.append("orderid", id);
  formData.append("status", status);

  var url = "../functions/order/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Статус обновлен");
    console.log(xhr.response);
  };
}
