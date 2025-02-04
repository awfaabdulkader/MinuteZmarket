document.addEventListener('DOMContentLoaded', function() {
    const appliesTo = document.getElementById('applies_to');
    const categorySelection = document.getElementById('category_selection');
    const productSelection = document.getElementById('product_selection');
    
    function updateSelections() {
        // Hide both by default
        categorySelection.style.display = 'none';
        productSelection.style.display = 'none';
        
        // Show relevant selection based on choice
        switch(appliesTo.value) {
            case 'category':
                categorySelection.style.display = 'block';
                break;
            case 'product':
                productSelection.style.display = 'block';
                break;
        }
    }
    
    // Run on page load
    updateSelections();
    
    // Run when selection changes
    appliesTo.addEventListener('change', updateSelections);
    
    // Date validation
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    
    startDate.addEventListener('change', function() {
        endDate.min = this.value;
    });
    
    endDate.addEventListener('change', function() {
        if (this.value < startDate.value) {
            this.value = startDate.value;
        }
    });
});