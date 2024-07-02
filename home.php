<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    width: 80%;
    margin: auto;
    overflow: hidden;
    padding: 20px;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1,
  h2 {
    text-align: center;
    color: #333;
  }

  .card-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .card {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  .card img {
    width: 100%;
    height: auto;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  .card-content {
    padding: 20px;
  }

  .card-content h3 {
    margin-top: 0;
    color: #333;
  }

  .card-content p {
    margin-bottom: 10px;
    color: #666;
  }

  .card-content .details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #888;
  }

  .card-content .details span {
    font-size: 0.9em;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Food and Travel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Home - Food and Travel</h1>

    <div id="foodContainer">
      <h2>Food Items</h2>
      <div class="card-list" id="foodList">
        <!-- Food items will be dynamically added here -->
      </div>
    </div>

    <div id="travelContainer">
      <h2>Travel Items</h2>
      <div class="card-list" id="travelList">
        <!-- Travel items will be dynamically added here -->
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts.js"></script>
</body>

</html>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Simulated data (replace with actual fetching from backend)
    const foodData = [{
        name: 'Pizza',
        description: 'Delicious pizza with various toppings.',
        origin: 'Italy',
        category: 'Main Dish',
        priceRange: '$10 - $20',
        imageUrl: 'https://example.com/pizza.jpg'
      },
      {
        name: 'Sushi',
        description: 'Traditional Japanese dish with fresh seafood.',
        origin: 'Japan',
        category: 'Main Dish',
        priceRange: '$15 - $30',
        imageUrl: 'https://example.com/sushi.jpg'
      }
      // Add more items as needed
    ];

    const travelData = [{
        title: 'Exploring Paris',
        description: 'Visited famous landmarks in Paris.',
        location: 'Paris, France',
        date: '2023-06-01',
        imageUrl: 'https://example.com/paris.jpg'
      },
      {
        title: 'Hiking in the Rockies',
        description: 'Beautiful hike in the Rocky Mountains.',
        location: 'Colorado, USA',
        date: '2023-08-15',
        imageUrl: 'https://example.com/rockies.jpg'
      }
      // Add more items as needed
    ];

    // Function to populate food items
    function populateFoodItems() {
      const foodList = document.getElementById('foodList');
      foodData.forEach(item => {
        const card = createCard(item);
        foodList.appendChild(card);
      });
    }

    // Function to populate travel items
    function populateTravelItems() {
      const travelList = document.getElementById('travelList');
      travelData.forEach(item => {
        const card = createCard(item);
        travelList.appendChild(card);
      });
    }

    // Function to create a card element
    function createCard(item) {
      const card = document.createElement('div');
      card.classList.add('card');

      const image = document.createElement('img');
      image.src = item.imageUrl;
      image.alt = item.name || item.title;
      card.appendChild(image);

      const cardContent = document.createElement('div');
      cardContent.classList.add('card-content');

      if (item.name) { // Food item
        cardContent.innerHTML = `
                <h3>${item.name}</h3>
                <p>${item.description}</p>
                <div class="details">
                    <span>${item.origin}</span>
                    <span>${item.category}</span>
                    <span>${item.priceRange}</span>
                </div>
            `;
      } else if (item.title) { // Travel item
        cardContent.innerHTML = `
                <h3>${item.title}</h3>
                <p>${item.description}</p>
                <div class="details">
                    <span>${item.location}</span>
                    <span>${item.date}</span>
                </div>
            `;
      }

      card.appendChild(cardContent);
      return card;
    }

    // Call functions to populate data
    populateFoodItems();
    populateTravelItems();
  });
</script>