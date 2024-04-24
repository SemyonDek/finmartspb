document.getElementById('addDelivery').onclick = function() {
    let name = document.getElementById("nameDelivery");
    let price = document.getElementById("priceDelivery");

    if (name.value == "") {
        alert("Введите название");
    } else {
        if (price.value == "") {
            alert("Введите цену");
        } else {
            let formData = new FormData();
            formData.append("name", name.value);
            formData.append("price", price.value);

            var url = "../functions/delivery/add.php";

            let xhr = new XMLHttpRequest();
            xhr.responseType = "document";

            xhr.open("POST", url);
            xhr.send(formData);
            xhr.onload = () => {
                document.getElementById("add-delivery-list").innerHTML =
                    xhr.response.getElementById("add-delivery-list").innerHTML;
            };
        }
    }
}

function updDelivery(id, name, price) {
    document.getElementById('deliveryid').value = id;
    document.getElementById('nameUpdDelivery').value = name;
    document.getElementById('priceUpdDelivery').value = price;
}

function delDelivery(id) {
    let formData = new FormData();
    formData.append("deliveryid", id);

    var url = "../functions/delivery/del.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
        console.log(xhr.response);
        document.getElementById("add-delivery-list").innerHTML =
            xhr.response.getElementById("add-delivery-list").innerHTML;
    };
}


document.getElementById('updDelivery').onclick = function() {
    let deliveryid = document.getElementById("deliveryid");
    let name = document.getElementById("nameUpdDelivery");
    let price = document.getElementById("priceUpdDelivery");

    if (deliveryid.value == "") {
        alert("Ввыберите категорию");
    } else {
        if (name.value == "") {
            alert("Введите название");
        } else {
            if (price.value == "") {
                alert("Введите цену");
            } else {
                let formData = new FormData();
                formData.append("deliveryid", deliveryid.value);
                formData.append("name", name.value);
                formData.append("price", price.value);

                var url = "../functions/delivery/upd.php";

                let xhr = new XMLHttpRequest();
                xhr.responseType = "document";

                xhr.open("POST", url);
                xhr.send(formData);
                xhr.onload = () => {
                    console.log(xhr.response);
                    document.getElementById("add-delivery-list").innerHTML =
                        xhr.response.getElementById("add-delivery-list").innerHTML;
                };
            }
        }
    }
}