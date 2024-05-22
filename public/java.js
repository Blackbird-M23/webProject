document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


function filterProducts(type) {
    var products = document.querySelectorAll('.product-box');
    console.log('Filtering products of type:', type); // Log the type being filtered
    products.forEach(function(product) {
        var productType = product.getAttribute('data-type');
        console.log('Product type:', productType); // Log the product's data-type
        if (type === 'all' || productType === type) {
            product.style.display = 'flex'; // Show the product
        } else {
            product.style.display = 'none'; // Hide the product
        }
    });

    // Remove active class from all buttons
    var buttons = document.querySelectorAll('.filter-buttons .btn');
    buttons.forEach(function(button) {
        button.classList.remove('btn-all', 'btn-bakery', 'btn-sweets', 'btn-snacks', 'btn-active');
    });

    // Add active class and specific class to the clicked button
    var activeButton = document.getElementById('btn-' + type.toLowerCase());
    if (activeButton) {
        activeButton.classList.add('btn-active');
        switch(type) {
            case 'all':
                activeButton.classList.add('btn-all');
                break;
            case 'Bakery':
                activeButton.classList.add('btn-bakery');
                break;
            case 'Sweets':
                activeButton.classList.add('btn-sweets');
                break;
            case 'Snacks':
                activeButton.classList.add('btn-snacks');
                break;
            default:
                break;
        }
    } else {
        document.getElementById('btn-all').classList.add('btn-active');
    }
}

