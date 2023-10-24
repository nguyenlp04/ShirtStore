document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#search-input");
    const productList = document.querySelector("#product-list");
    const products = productList.querySelectorAll(".product");

    searchInput.addEventListener("input", function () {
        const keyword = searchInput.value.toLowerCase();
        products.forEach(function (product) {
            const name = product.querySelector(".name-product").textContent.toLowerCase();
            const price = product.querySelector(".price-product").textContent.toLowerCase();
            console.log(keyword);
            if (name.includes(keyword) || price.includes(keyword)) {
                product.style.display = "flex";
            } else {
                product.style.display = "none";
            }
        });
    });
});