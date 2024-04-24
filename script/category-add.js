document.getElementById("addCat").onclick = function () {
  let name = document.getElementById("nameCat");

  if (name.value == "") {
    alert("Введите название");
  } else {
    let formData = new FormData();
    formData.append("name", name.value);

    var url = "../functions/category/add.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      document.getElementById("left-category-list").innerHTML =
        xhr.response.getElementById("left-category-list").innerHTML;
      document.getElementById("add-category-list").innerHTML =
        xhr.response.getElementById("add-category-list").innerHTML;
    };
  }
};

function updcat(id, name) {
  document.getElementById("catid").value = id;
  document.getElementById("nameUpdCat").value = name;
}

function delcat(id) {
  let formData = new FormData();
  formData.append("catid", id);

  var url = "../functions/category/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("left-category-list").innerHTML =
      xhr.response.getElementById("left-category-list").innerHTML;
    document.getElementById("add-category-list").innerHTML =
      xhr.response.getElementById("add-category-list").innerHTML;
  };
}

document.getElementById("updCat").onclick = function () {
  let catid = document.getElementById("catid");
  let name = document.getElementById("nameUpdCat");

  if (catid.value == "") {
    alert("Ввыберите категорию");
  } else {
    if (name.value == "") {
      alert("Введите название");
    } else {
      let formData = new FormData();
      formData.append("catid", catid.value);
      formData.append("name", name.value);

      var url = "../functions/category/upd.php";

      let xhr = new XMLHttpRequest();
      xhr.responseType = "document";

      xhr.open("POST", url);
      xhr.send(formData);
      xhr.onload = () => {
        document.getElementById("left-category-list").innerHTML =
          xhr.response.getElementById("left-category-list").innerHTML;
        document.getElementById("add-category-list").innerHTML =
          xhr.response.getElementById("add-category-list").innerHTML;
      };
    }
  }
};
