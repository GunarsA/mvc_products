"use strict";

if (window.location.pathname === "/add-product") {
  function addSubmitValidation() {
    const form = document.querySelector(".needs-validation");
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
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
        document.querySelectorAll("#descriptions input").forEach((element) => {
          element.removeAttribute("required");
        });

        document
          .querySelectorAll("option:not(:first-child)")
          .forEach((option) => {
            document
              .querySelector("#" + option.value.toLowerCase() + "Description")
              .classList.add("d-none");
          });

        if (event.target.value) {
          const field = document.querySelector(
            "#" + event.target.value.toLowerCase() + "Description"
          );
          field.classList.remove("d-none");
          field.querySelectorAll("input").forEach((element) => {
            element.setAttribute("required", "");
          });
        }

        addIndividualValidation();
      });

    document.querySelector("#productType").dispatchEvent(new Event("change"));
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
