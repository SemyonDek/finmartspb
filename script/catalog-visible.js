let blockButton = document.getElementById("view-block-button");
let listButton = document.getElementById("view-list-button");
let viewingInput = document.getElementById("viewing");
let catalog = document.getElementById("catalog-block");

blockButton.onclick = function () {
  if (!blockButton.classList.contains("view-item-active")) {
    document
      .getElementsByClassName("view-item-active")[0]
      .classList.remove("view-item-active");
    blockButton.classList.add("view-item-active");
    viewingInput.value = "block";
    catalog.classList.remove("catalog-list-block");
  }
};

listButton.onclick = function () {
  if (!listButton.classList.contains("view-item-active")) {
    document
      .getElementsByClassName("view-item-active")[0]
      .classList.remove("view-item-active");
    listButton.classList.add("view-item-active");
    viewingInput.value = "list";
    catalog.classList.add("catalog-list-block");
  }
};
