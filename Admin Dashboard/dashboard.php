<?php
    //Start session
    session_start();
    $user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>

    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="dashboard_user">
            <img src="../Collab/Hi.png" alt="User image" id="userImage" />
            <span><?= $user['Name'] ?></span>
        </div>
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="add-pet.php">Add Pet</a>
        <a href="edit-pet.php">Edit Pet</a>
        <a href="view-requests.php">View Requests</a>
    </div>
    <div class="main-content">
        <header>
            <span class="company-name">PetAbode</span>
            <div class="hamburger-menu" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="menu-items" id="menuItems">
                <a href="profile.html">Profile</a>
                <a href="../Homepage.html">Logout</a>
            </div>
        </header>
        <div class="dashboard">
            <div class="card">Available Pets: <span id="availablePets">0</span></div>
            <div class="card">Adopted Pets: <span id="adoptedPets">0</span></div>
            <div class="card">Adoption Forms Submitted: <span id="formsSubmitted">0</span></div>
        </div>
    </div>

    <script>
        function toggleMenu() {
        var menuItems = document.getElementById("menuItems");
        menuItems.style.display = menuItems.style.display === "block" ? "none" : "block";
        }

        // Toggle the sidebar on mobile view
        document.querySelector('.hamburger-menu').addEventListener('click', function() {
        document.querySelector('.sidebar').style.display = document.querySelector('.sidebar').style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>

</html>