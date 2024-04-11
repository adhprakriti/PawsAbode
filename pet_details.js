document.addEventListener("DOMContentLoaded", function() {
    // Retrieve pet details from query parameter
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const petName = urlParams.get('pet');
  
    // Replace the following values with your actual pet details
    const petDetails = {
      "Bruno": {
        "image": "dog2.jpg",
        "name": "Bruno",
        "breed": "Golden retrievers",
        "age": "5 years",
        "health": "Healthy"
      },
      "Murphy": {
        "image": "dog6.jpg",
        "name": "Murphy",
        "breed": "Shiba Inu",
        "age": "5 years",
        "health": "Healthy"
      },
      // Add more pet details as needed
    };
  
    // Display pet details on the page
    if (petDetails.hasOwnProperty(petName)) {
      const pet = petDetails[petName];
      document.getElementById('pet-image').src = pet.image;
      document.getElementById('pet-name').textContent = pet.name;
      document.getElementById('pet-breed').textContent = pet.breed;
      document.getElementById('pet-age').textContent = pet.age;
      document.getElementById('pet-health').textContent = pet.health;
    } else {
      // If pet details are not found, display a message or redirect the user
      console.error(`Pet details not found for ${petName}`);
      // Optionally, display a message to the user or redirect them to another page
      // window.location.href = 'index.html'; // Redirect to index.html
    }
  
    // Handle click event on Adopt Now button
    document.querySelector('.adopt-now').addEventListener('click', function() {
      // Redirect the user to Form.html when Adopt Now button is clicked
      window.location.href = 'Form.html';
    });
  });
  