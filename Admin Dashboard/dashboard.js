// This file is still needed to be edited for the backend part.
// This file works with the database count for available and adopted pets.
// It is just a dummy js file, backend developer can work with this.

function toggleMenu() {
    var menuItems = document.getElementById("menuItems");
    menuItems.style.display = menuItems.style.display === "block" ? "none" : "block";
}

// Toggle the sidebar on mobile view
document.querySelector('.hamburger-menu').addEventListener('click', function() {
    document.querySelector('.sidebar').style.display = document.querySelector('.sidebar').style.display === 'block' ? 'none' : 'block';
});



// FOR SHOWING HOW MANY NUMBERS OF PETS AVAILABLE AND ADOPTION
// Assume you have a backend endpoint that returns the counts for available and adopted cats
// You can use fetch API or any other method to get the data from the server

// Example fetch request
fetch('/api/cats-count')
  .then(response => response.json())
  .then(data => {
    document.getElementById('available-cats-count').textContent = data.availableCats;
    document.getElementById('adopted-cats-count').textContent = data.adoptedCats;
  })
  .catch(error => console.error('Error fetching data:', error));


// FOR SHOWING DATA TO THE TABLE IN DASHBOARD.HTML
// Fetch available pet details from PHP script
fetch('fetch_data.php')
  .then(response => response.json())
  .then(data => {
    // Fill in the available pet details table
    const petDetailsBody = document.getElementById('pet-details-body');
    petDetailsBody.innerHTML = '';
    data.forEach(pet => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td><a href="#">${pet.name}</a></td>
        <td>${pet.species}</td>
        <td>${pet.age}</td>
        <td>${pet.color}</td>
        <td>${pet.sex}</td>
        <td>${pet.breed}</td>
      `;
      petDetailsBody.appendChild(row);
    });
  })
  .catch(error => console.error('Error fetching pet details:', error));

// Fetch counts for available and adopted cats and display them in the cards
// This part of the code can be same as provided in the previous example
