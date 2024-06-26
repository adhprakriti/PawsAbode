<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="form.css">
  <style>

    button[type="submit"]:hover {
      opacity: 1;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="background-image">
      <img src="dog1.jpg" alt="Background Image">
      <div class="overlay"></div>
    </div>
    <div class="form-container">
      <div class="form-card">
        <h2>Form</h2>
        <form action="thankyou.html" method="post">
          <label for="fullName">Full Name</label><br>
          <input type="text" id="fullName" name="fullName" placeholder="Enter Your Name" required> <br><br>
          
          <label for="address">Address</label><br>
          <input type="text" id="address" name="address" placeholder="Enter your location" required><br><br>
              
          <label for="email">E-mail</label><br>
          <input type="email" id="email" name="email" placeholder="example@example.com" required><br><br>

          <label for="contact">Contact Number</label><br>
          <input type="tel" name="contact" placeholder="Contact Number" required><br><br>

          <label for="job">Source Of Income</label><br>
          <input type="text" name="job" placeholder="Occupation" required><br><br>

          <label for="questions">Any Queries</label><br>
          <textarea id="questions" name="questions"></textarea><br><br>

          <button type="submit">SUBMIT</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
