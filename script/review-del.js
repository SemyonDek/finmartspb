function delreview(id) {
  let formData = new FormData();
  formData.append("reviewid", id);

  var url = "../functions/reviews/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("reviews-list").innerHTML =
      xhr.response.getElementById("reviews-list").innerHTML;
  };
}
