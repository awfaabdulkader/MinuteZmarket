document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("filter-btn").addEventListener("click", filterProducts);
});

function filterProducts() {
    let minPrice = document.getElementById("slider-range-value1").innerText;
    let maxPrice = document.getElementById("slider-range-value2").innerText;
    let categoryId = document.getElementById("filter-btn").dataset.categoryId;

    fetch(`/store/category/${categoryId}?min_price=${minPrice}&max_price=${maxPrice}`, {
        method: "GET",
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(response => response.json())
    .then(data => {
        let productList = document.getElementById("product-list");
        productList.innerHTML = ""; // Clear existing products

        if (data.products.length > 0) {
            data.products.forEach(product => {
                let productHtml = `
                    <div class="product-item">
                        <h3>${product.name}</h3>
                        <p>Price: $${product.price}</p>
                    </div>`;
                productList.innerHTML += productHtml;
            });
        } else {
            productList.innerHTML = "<p>No products found in this range.</p>";
        }
    })
    .catch(error => console.error("Error:", error));
}
