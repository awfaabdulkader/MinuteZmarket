class CategoryFilter {
    constructor() {
        this.initializeEventListeners();
    }

    initializeEventListeners() {
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', this.handleCategoryClick.bind(this));
        });
    }

    handleCategoryClick(e) {
        e.preventDefault();
        const categoryId = e.currentTarget.dataset.categoryId;
        this.fetchProducts(categoryId);
    }

    fetchProducts(categoryId) {
        fetch(`/api/products/category/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                this.updateUI(data);
            });
    }

    updateUI(data) {
        this.updateProductGrid(data.products);
        this.updateBreadcrumb(data.category);
        this.updateTotalProducts(data.products.length);
        // Update URL without page reload
        history.pushState({}, '', `/store/category/${data.category.id}`);
    }

    // Rest of your update methods...
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new CategoryFilter();
});