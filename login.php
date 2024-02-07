<?php
// Database connection
$host = 'meeteo.ddns.net';
$dbname = 'project_db';
$username = 'project';
$password = 'password';
$port = '53308';

try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Function to authenticate user
function authenticateUser($conn, $email, $inputPassword) {
    $selectQuery = "SELECT password FROM $email WHERE email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row) {
            $hashedPasswordFromDB = $row['password'];
            $test = $hashedPasswordFromDB == $inputPassword;
            return $test; // issue
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
</html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .button {
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            background-color: #ff4d4d;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ff3333;
        }
    </style>
</head>
<body>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    </form>
    <div class="container">
        <h2>Login</h2>
        <form action="#" method="post">
            <input type="text" name="email" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <body>
<?php
    // Process login form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Authenticate user
        if (authenticateUser($db, $email, $password)) {
            echo "<p>Login successful. Hello, $email!</p>";
            echo '<script>window.location.href = "mainpage.php";</script>';
            exit;
        } else {
            echo "<p>Invalid email or password.</p>";
        }
    }
    ?>
</body>

        <button class="button" onclick="goToHomePage()">Home Page</button>
        <button class="button" onclick="goToRegister()">Register</button>
    </div>
<body>
<?php
    // Process login form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Authenticate user
        if (authenticateUser($db, $email, $password)) {
            echo "<p>Login successful. Hello, $email!</p>";
            echo '<script>window.location.href = "mainpage.php";</script>';
            exit;
        } else {
            echo "<p>Invalid email or password.</p>";
        }
    }
    ?>
</body>

    <script>
        function goToHomePage() {
            window.location.href = 'index.php';
        }

        function goToRegister() {
            window.location.href = 'register.php';
        }
    </script>
</body>
    