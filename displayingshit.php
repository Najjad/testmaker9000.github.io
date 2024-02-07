<!-- PHP code to establish connection with the local server -->
<?php
 
// Username is root
$user = 'project';
$password = 'password';
 
// Database name is geeksforgeeks
$database = 'project_db';
 
// Server is localhost with port number 3306
$servername='meeteo.ddns.net:53308';
$mysqli = new mysqli($servername, $user, $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = "SELECT * FROM Bogdan ORDER BY id DESC";
$result = $mysqli->query($sql);
 
// Checking if query returns rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = base64_encode($row['questions']);
        // HTML code to display the image with fixed dimensions
        echo '<img src="data:image/jpeg;base64,' . $imageData . '" width="300" height="200" />';

        $PDFData = base64_encode($row['completedtest']);
        // HTML code to display the image with fixed dimensions
        echo '<img src="data:image/pdf;base64,' . $PDFData . '" width="300" height="200" />';
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>GeeksForGeeks</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>GFG UserHandle</th>
                <th>Practice Problems</th>
                <th>Coding Score</th>
                <th>GFG Articles</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                $result = $mysqli->query("SELECT * FROM Bogdan ORDER BY id DESC");
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['password'];?></td>
                <td><?php echo $rows['marks'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>
