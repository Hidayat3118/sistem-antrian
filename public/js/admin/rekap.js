function filterCategories() {
    const hariSelected = document.getElementById('filterHari').value;
    const bulanSelected = document.getElementById('filterBulan').value;
    const tahunSelected = document.getElementById('filterTahun').value;
    const categories = document.querySelectorAll('.category');

    categories.forEach(category => {
        const isVisible = 
            (hariSelected === "" || category.classList.contains(hariSelected)) &&
            (bulanSelected === "" || category.classList.contains(bulanSelected)) &&
            (tahunSelected === "" || category.classList.contains(tahunSelected));
        
        category.style.display = isVisible ? 'block' : 'none';
    });
}

document.getElementById('filterHari').addEventListener('change', filterCategories);
document.getElementById('filterBulan').addEventListener('change', filterCategories);
document.getElementById('filterTahun').addEventListener('change', filterCategories);

// Initialize to show all on page load
filterCategories();