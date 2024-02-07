<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Register'; ?></title>
</head>

<body>
    <h3><?php echo 'Register'; ?></h3>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <h2>Register</h2>
        <form action="#" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <button class="button" onclick="goToHomePage()">Home Page</button>
        <button class="button" onclick="goToLogin()">Login Page</button>
    </div>

    <script>
        function goToHomePage() {
            window.location.href = 'index.php';
        }

        function goToLogin() {
            window.location.href = 'login.php';
        }
    </script>

    <?php 

    // Database connection
    $host = 'meeteo.ddns.net';
    $dbname = 'project_db';
    $username = 'project';
    $password = 'password';
    $port = "53308";

    try {
        $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        // Print the error message to the console
        echo "<script>console.error('$errorMessage');</script>";
        exit;
    }

    $un = $_POST['username'];
    $pn = $_POST['password'];
   // SQL query to create a new table
$sql = "CREATE TABLE IF NOT EXISTS $un (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    marks INT,
    questions LONGBLOB,
    markscheme LONGBLOB,
    pasttest LONGBLOB
)";

// Execute SQL query to create the table
try {
    $db->exec($sql);
    echo "Table created successfully";

    // Insert values into the created table
    $stmt = $db->prepare("INSERT INTO $un (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $un);
    $stmt->bindParam(':password', $pn);
    $stmt->execute();
    echo "Values inserted successfully";
} catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        // Print the error message to the console
        echo "<script>console.error('$errorMessage');</script>";
    }


    // Execute SQL query to create the table
    try {
        $db->exec($sql);
        echo "Table created successfully";
        echo '<script>window.location.href = "mainpage.php";</script>';
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }

    ?>

</body>
</html>
