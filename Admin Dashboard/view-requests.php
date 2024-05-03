<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* CSS for buttons */
        .accept-btn,
        .deny-btn {
        background-color: #fff;
        color: black;
        border-color: rgb(90, 173, 165);
        padding: 10px;
        text-align: center;
        display: inline-block;
        font-size: 14px;
        margin: 4px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5px;
        }

        .accept-btn:hover{
        background-color: rgb(90, 173, 165);
        }

        .deny-btn:hover {
        background-color: red; 
        }

        /* Button icon style */
        .accept-btn i,
        .deny-btn i {
        margin-right: 5px;
        }

    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php" >Dashboard</a>
        <a href="add-pet.php">Add Pet</a>
        <a href="edit-pet.php">Edit Pet</a>
        <a href="view-requests.php" class="active">View Requests</a>
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
                <th>Action</th>
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
            <td>
                <button class='accept-btn'><i class='fa fa-check'></i> Accept</button>
                <button class='deny-btn'><i class='fa fa-times'></i> Deny</button>
            </td>
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