const { default: axios } = require("axios");
const formAddToCart = document.querySelector(".form-add-to-cart");
if (formAddToCart) {
    formAddToCart.addEventListener("submit", (event) => {
        event.preventDefault();
        const data = new FormData(formAddToCart);

        axios.post("/cart/add", data).then(function (response) {
            showCart(response.data);
        });
    });
}

document.querySelector(".clear-cart").addEventListener("click", () => {
    axios.post("/cart/clear").then(function (response) {
        showCart(response.data);
    });
});

// const clearItems = document.querySelectorAll(".remove-item");
// for (const clearItem of clearItems) {
//     clearItem.addEventListener("click", () => {
//         alert(123);
//     });
// }

document.querySelector(".modal-body").addEventListener("click", (event) => {
    if (event.target.classList.contains("remove-item")) {
        const id = event.target.dataset.id;
        axios.post("/cart/remove/" + id).then(function (response) {
            showCart(response.data);
        });
    }
});

document.querySelector(".modal-body").addEventListener("change", (event) => {
    if (event.target.classList.contains("qty-item")) {
        const id = event.target.dataset.id;
        const qty = event.target.value;

        axios
            .post("/cart/change-qty", { id: id, qty: qty })
            .then(function (response) {
                showCart(response.data);
            });
    }
});

let cartModal = new bootstrap.Modal(document.getElementById("cartModal"));

function showCart(cart) {
    document.querySelector(".modal-body").innerHTML = cart;
    cartModal.show();
}
