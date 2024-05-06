// Animal constructor function
function Animal(name, species, breed, color, sex, age, location, image) {
  this.name = name;
  this.species = species;
  this.breed = breed;
  this.color = color;
  this.sex = sex;
  this.age = age;
  this.location = location;
  this.image = image;
}

// Sample data for animal cards
const animals = [
  new Animal('Dog 1', 'dogs', 'Affenpinscher', 'Black', 'male', '3 years', 'New York', 'random.png'),
  new Animal('Dog 2', 'dogs', 'American Bulldog', 'Grey', 'female', '2 years', 'Los Angeles', 'random.png'),
  new Animal('Cat 1', 'cats', 'British Shorthair', 'Brown', 'male', '1 year', 'Chicago', 'random.png'),
  new Animal('Cat 2', 'cats', 'Maine Coon', 'Grey', 'female', '5 years', 'New York', 'random.png'),
  // new Animal('Dog 3', 'dogs', 'breed 5', 'color 5', 'male', '4 years', 'Los Angeles', 'random.png'),
];

// Function to render animal cards
function renderCards(animals) {
  const cardContainer = document.querySelector('.cards');
  cardContainer.innerHTML = '';

  animals.forEach(animal => {
    const card = document.createElement('div');
    card.className = 'card';
    card.innerHTML = `
      <img src="${animal.image}" alt="${animal.name}">
      <h3>${animal.name}</h3>
      <p>Species: ${animal.species}</p>
      <p>Breed: ${animal.breed}</p>
      <p>Color: ${animal.color}</p>
      <p>Sex: ${animal.sex}</p>
      <p>Age: ${animal.age}</p>
      <p>Location: ${animal.location}</p>
    `;
    cardContainer.appendChild(card);
  });
}

// Event listener for form submission
document.getElementById('filter-form').addEventListener('submit', event => {
  event.preventDefault();
  // Get form data here and filter animals based on form values
  renderCards(animals);
});

// Call function to render initial animal cards
renderCards(animals);

// Update the existing scripts.js file with the following code snippet 
//...

// Event listener for species dropdown
document.getElementById('species').addEventListener('change', () => {
  const breedSelect = document.getElementById('breed');
  breedSelect.innerHTML = '';

  const species = document.getElementById('species').value;

  if (species === 'dogs') {
    const dogBreeds = ['Affenpinscher', 'American Bulldog', 'breed3', 'breed4', 'breed5'];
    dogBreeds.forEach(breed => {
      const option = document.createElement('option');
      option.value = breed;
      option.textContent = breed;
      breedSelect.appendChild(option);
    });
  } else if (species === 'cats') {
    const catBreeds = ['British Shorthair', 'Maine Coon', 'breed3', 'breed4', 'breed5'];
    catBreeds.forEach(breed => {
      const option = document.createElement('option');
      option.value = breed;
      option.textContent = breed;
      breedSelect.appendChild(option);
    });
  }
});

document.getElementById('species').addEventListener('change', () => {
  const species = document.getElementById('species').value;
  const breedSelect = document.getElementById('breed');
  let breeds;

  if (species === 'dogs') {
    breeds = ['Affenpinscher', 'American Bulldog', 'breed3', 'breed4', 'breed5'];
  } else if (species === 'cats') {
    breeds = ['British Shorthair', 'Maine Coon', 'breed3', 'breed4', 'breed5'];
  } else {
    breeds = [];
  }

  breedSelect.innerHTML = '';
  breeds.forEach(breed => {
    const option = document.createElement('option');
    option.value = breed;
    option.textContent = breed;
    breedSelect.appendChild(option);
  });
});

//...