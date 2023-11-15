<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>User Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($_GET["name"]); ?></td>
                <td><?php echo htmlspecialchars($_GET["phone"]); ?></td>
                <td><?php echo htmlspecialchars($_GET["address"]); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
