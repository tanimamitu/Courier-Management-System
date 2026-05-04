<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .bt{
            margin-top: 20px;;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Tracking Your Order by Tracking Code :</h2>
        <form method="post" action="tracking_order.php">
            <input type="text" name="TrackingCode" placeholder="Tracking Code" required>
            <button type="submit">Get Status </button>
        </form>
    </div>
    <div class="container bt">
            <?php
            include 'config.php';
                // Fetching customer details
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $TrackingCode = $_POST['TrackingCode'];
                    
                    $sql = "SELECT * FROM ordertracking WHERE TrackingCode = $TrackingCode";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        echo "status: " . $row['Status'] . "<br>";
                        echo "Name: " . $row['TrackingCode'] . "<br>";

                    } else {
                        echo "No Order Status found with Code: $TrackingCode";
                    }
                    
                    mysqli_close($conn);
                }

        ?>
    </div>

</body>
</html>

