<?php
// Your database connection code
$user = 'project';
$password = 'password';
$database = 'project_db';
$servername='meeteo.ddns.net:53308';
$mysqli = new mysqli($servername, $user, $password, $database);

// SQL query to select data from the completedtest column
$sql = "SELECT id, completedtest FROM Bogdan ORDER BY id DESC";
$result = $mysqli->query($sql);

// Checking if query returns rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testId = $row['id'];
        $completedtest = $row['completedtest'];
        // Check if the completedtest column is not empty
        if (!empty($completedtest)) {
            // Output the PDF file button with a unique ID
            echo '<button class="btn-download" data-id="' . $testId . '">Download Test ' . $testId . '</button>';
        }
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-download').forEach(button => {
            button.addEventListener('click', function() {
                const testId = this.getAttribute('data-id');

                // Make an AJAX call to retrieve the PDF data
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'data:application/pdf;base64,' + getPDFData(testId), true);
                xhr.responseType = 'blob';

                xhr.onload = function() {
                    if (this.status === 200) {
                        const blob = new Blob([this.response], { type: 'application/pdf' });
                        const url = window.URL.createObjectURL(blob);

                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'test_' + testId + '.pdf';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);
                    }
                };

                xhr.send();
            });
        });
    });

    // Function to fetch PDF data for a given testId
    function getPDFData(testId) {
        <?php
        // Your database connection code
        $user = 'project';
        $password = 'password';
        $database = 'project_db';
        $servername='meeteo.ddns.net:53308';
        $mysqli = new mysqli($servername, $user, $password, $database);

        // Prepare SQL statement to fetch PDF data
        $sql = "SELECT completedtest FROM Bogdan WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $testId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($pdfData);
            $stmt->fetch();
            echo 'return "' . base64_encode($pdfData) . '";';
        } else {
            echo 'return "";';
        }

        $stmt->close();
        $mysqli->close();
        ?>
    }
</script>
