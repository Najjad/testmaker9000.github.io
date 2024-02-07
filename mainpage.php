<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #ff4081;
            font-size: 60px;
            margin-bottom: 50px;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        div {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            background-color: #ff4081;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e91e63;
        }

        button:focus {
            outline: none;
        }

        button:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <h1>TestMaker9000</h1>
    <h2>Actions</h2>
    <div>
        <button onclick="window.location.href = 'upload_photos.php';">Upload Photos</button>
        <button onclick="window.location.href = 'upload_markschemes.php';">Upload Markschemes</button>
        <button onclick="window.location.href = 'upload_marks.php';">Upload Marks</button>
    </div>
    <div>
        <button onclick="window.location.href = 'create_test.php';">Create Test</button>
        <button onclick="window.location.href = 'access_old_tests.php';">Access Old Tests</button>
        <button onclick="window.location.href = 'delete_xyz.php';">Delete XYZ</button>
    </div>
</body>
</html>
