if (window.location.pathname === "/add-product") {
  const typeSelector = document.querySelector("#productType");
  typeSelector.addEventListener("change", (e) => {
    const discField = document.querySelector("#discDescription");
    const bookField = document.querySelector("#bookDescription");
    const furnitureField = document.querySelector("#furnitureDescription");

    discField.classList.add("d-none");
    bookField.classList.add("d-none");
    furnitureField.classList.add("d-none");

    switch (e.target.value) {
      case "DVD":
        discField.classList.remove("d-none");
        break;
      case "Book":
        bookField.classList.remove("d-none");
        break;
      case "Furniture":
        furnitureField.classList.remove("d-none");
        break;
    }
  });
}
