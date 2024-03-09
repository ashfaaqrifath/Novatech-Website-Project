document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const productContainers = document.querySelectorAll('.pro');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        productContainers.forEach(function(container) {
            const title = container.querySelector('h5').innerText.toLowerCase();
            const brand = container.querySelector('span').innerText.toLowerCase();
            if (title.includes(searchTerm) || brand.includes(searchTerm)) {
                container.style.display = 'block'; // Show matching products
            } else {
                container.style.display = 'none'; // Hide non-matching products
            }
        });
    });




    // const filterBtn = document.getElementById('category');
    // const productFilter = document.querySelectorAll('.pro');

    // filterBtn.addEventListener('change', function() {
    //     const searchTerm = filterBtn.value; // Convert input value to lowercase for case-insensitive comparison

    //     productFilter.forEach(function(container) {
    //         const title = container.querySelector('h6').innerText; // Convert title to lowercase for case-insensitive comparison
            
    //         if (title.includes(searchTerm)) {
    //             container.style.display = 'block'; // Show matching products
    //         } else {
    //             container.style.display = 'none'; // Hide non-matching products
    //         }
    //     });
    // });

});











function filterProducts(value){
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach(button => {

        if(value.toUpperCase() == button.innerText.toUpperCase()){
            button.classList.add("active-btn");
        }
        else{
            button.classList.remove("active-btn");
        }
    });
}

window.onload = () => {
    filterProducts("All")
}
