"use strict";

if (window.location.pathname === "/add-product") {
  function addSubmitValidation() {
    const form = document.querySelector(".needs-validation");
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          //event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  }

  function addIndividualValidation() {
    Array.from(document.querySelectorAll("[required]")).forEach((input) => {
      input.addEventListener(
        "focusout",
        (event) => {
          event.target.parentElement.classList.add("was-validated");
        },
        false
      );
    });
  }

  function addAttributeSwitcher() {
    document
      .querySelector("#productType")
      .addEventListener("change", (event) => {
        const discField = document.querySelector("#discDescription");
        const bookField = document.querySelector("#bookDescription");
        const furnitureField = document.querySelector("#furnitureDescription");

        discField.classList.add("d-none");
        bookField.classList.add("d-none");
        furnitureField.classList.add("d-none");

        document.querySelectorAll("#descriptions input").forEach((element) => {
          element.removeAttribute("required");
        });

        switch (event.target.value) {
          case "DVD":
            discField.classList.remove("d-none");
            discField.querySelectorAll("input").forEach((element) => {
              element.setAttribute("required", "");
            });
            break;
          case "Book":
            bookField.classList.remove("d-none");
            bookField.querySelectorAll("input").forEach((element) => {
              element.setAttribute("required", "");
            });
            break;
          case "Furniture":
            furnitureField.classList.remove("d-none");
            const temp = furnitureField.querySelectorAll("input");
            temp.forEach((element) => {
              element.setAttribute("required", "");
            });
            break;
        }

        addIndividualValidation();
      });

      document.querySelector("#productType").dispatchEvent(new Event('change'));
  }

  function addSkuValidator() {
    const temp = (target) => {
      const spinner = document.querySelector("#spinner");
      spinner.classList.remove("d-none");
      fetch("/api/read-product?sku=" + target.value)
        .then((response) => response.json())
        .then((json) => {
          setTimeout(() => {
            spinner.classList.add("d-none");
            if (json.hasOwnProperty("sku")) {
              target.setCustomValidity("SKU already exists");
              document.querySelector("#skuFeedback").textContent =
                "SKU already exists.";
            } else {
              target.setCustomValidity("");
              document.querySelector("#skuFeedback").textContent =
                "Please choose a SKU.";
            }
          }, 300);
        });
    };

    const sku = document.querySelector("#sku");
    sku.addEventListener(
      "focusout",
      (event) => {
        temp(event.target);
        event.target.addEventListener("input", (event) => {
          temp(event.target);
        });
      },
      { once: true }
    );
  }

  addAttributeSwitcher();
  addSubmitValidation();
  addIndividualValidation();
  addSkuValidator();
}
