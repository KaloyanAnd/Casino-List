document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/brands')
        .then(response => response.json())
        .then(data => {
            const brandList = document.getElementById('brand-list');
            brandList.innerHTML = '';
            data.forEach(brand => {
                const item = document.createElement('div');
                item.className = 'brand-item';
                item.innerHTML = `
                    <img src="${brand.brand_image}" alt="${brand.brand_name}" class="brand-image" />
                    <div class="brand-info">
                        <div class="brand-name">${brand.brand_name}</div>
                        <div class="brand-rating">Rating: ${brand.rating}</div>
                    </div>
                `;
                brandList.appendChild(item);
            });
        })
        .catch(err => {
            document.getElementById('brand-list').innerHTML = '<p>Failed to load brands.</p>';
        });
});
