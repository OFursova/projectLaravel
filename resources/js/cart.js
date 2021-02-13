const { default: axios } = require("axios");
const formAddToCart = document.querySelector(".form-add-to-cart");
if (formAddToCart) {
    formAddToCart.addEventListener("submit", (event) => {
        event.preventDefault();
        const data = new FormData(formAddToCart);

        axios.post("/cart/add", data);
    });
}
