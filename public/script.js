    // Get all boutique items and the product list buttons
    const boutiqueItems = document.querySelectorAll('.boutique-item');
    const productListButtons = document.querySelectorAll('.btn-product-list');

    // Show only items that match the selected category
    productListButtons.forEach((button) => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        const selectedCategory = event.target.textContent.toLowerCase();
        filterBoutiqueItems(selectedCategory);
      });
    });

    // Filter the boutique items based on the selected category
    function filterBoutiqueItems(category) {
      boutiqueItems.forEach((item) => {
        const cardText = item.querySelector('.card-text').textContent.toLowerCase();
        if (cardText.includes(category)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // Show only items that match the search query
    document.querySelector('#search-input').addEventListener('keyup', (event) => {
      const searchQuery = event.target.value.toLowerCase().trim();
      filterBoutiqueItemsBySearchQuery(searchQuery);
    });

    // Filter the boutique items based on the search query
    function filterBoutiqueItemsBySearchQuery(searchQuery) {
      boutiqueItems.forEach((item) => {
        const cardTitle = item.querySelector('.card-title').textContent.toLowerCase();
        if (cardTitle.includes(searchQuery)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // Sort the boutique items based on the selected sort type
    const sortLinks = document.querySelectorAll('.dropdown-item');

    function sortBoutiqueItems(event) {
      event.preventDefault();
      const sortType = event.target.getAttribute('href').split('=')[1];
      const sortedItems = getSortedBoutiqueItems(sortType);
      removeBoutiqueItems();
      appendSortedBoutiqueItems(sortedItems);
    }

    // Get an array of sorted boutique items based on the selected sort type
    function getSortedBoutiqueItems(sortType) {
      return [...boutiqueItems].sort((a, b) => {
        const aPrice = parseFloat(a.querySelector('.card-body .fw-bold').textContent);
        const bPrice = parseFloat(b.querySelector('.card-body .fw-bold').textContent);
        if (sortType === 'asc') {
          return aPrice - bPrice;
        } else if (sortType === 'desc') {
          return bPrice - aPrice;
        }
      });
    }

    // Remove all boutique items from the DOM
    function removeBoutiqueItems() {
      boutiqueItems.forEach((item) => item.remove());
    }

    // Append the sorted boutique items to the DOM
    function appendSortedBoutiqueItems(sortedItems) {
      const boutiqueItemsContainer = document.querySelector('.d-grid');
      sortedItems.forEach((item) => {
        boutiqueItemsContainer.appendChild(item);
      });
    }

    // Sort the boutique items when a sort link is clicked
    sortLinks.forEach((link) => {
      link.addEventListener('click', sortBoutiqueItems);
    });