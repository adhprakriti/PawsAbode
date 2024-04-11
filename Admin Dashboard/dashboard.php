<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /*For Submitted Forms*/
        h1 {
            color: rgb(7, 90, 107);
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: rgb(90, 173, 165);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.html">Dashboard</a>
        <a href="add-pet.html">Add Pet</a>
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
                <a href="profile.php">Profile</a>
                <a href="settings.php">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </header>
        <div class="dashboard">
            <div class="card">Available Pets: <span id="availablePets">0</span></div>
            <div class="card">Adopted Pets: <span id="adoptedPets">0</span></div>
            <div class="card">Adoption Forms Submitted: <span id="formsSubmitted">0</span></div>
        </div>
    </div>
    <?php
    function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoptionform";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * from form_data");

    $result = $stmt->execute();

    if (!$result) {
        die("Query failed: " . $stmt->error);
    }

    $resultSet = $stmt->get_result();

    if ($resultSet->num_rows > 0) {
        echo "<table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Occupation</th>
                    <th>Queries</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $resultSet->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["full_name"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["contact_number"] . "</td>
                <td>" . $row["occupation"] . "</td>
                <td>" . $row["queries"] . "</td>
              </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No data available.";
    }

    $stmt->close();
    $conn->close();
    ?>

    <script src="dashboard.js"></script>
</body>

</html>