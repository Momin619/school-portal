<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Database - Login</title>
    <style>
    /* General body styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
    }

    /* Form container */
    .form-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
        position: relative;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    /* Input fields and button */
    .input-field {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 16px;
        box-sizing: border-box;
    }

    .input-field:focus {
        border-color: #007bff;
        outline: none;
    }

    /* Submit button */
    .submit-btn {
        width: 100%;
        padding: 15px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }

    /* Error message container */
    .error-message {
        background-color: #FFE6E6;
        color: red;
        z-index: 222222222222;
        text-align: center;
        padding: 10px 20px;
        border: 1px solid #FFB3B3;
        border-radius: 5px;
        margin-top: 20px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 30px;
            width: 90%;
        }

        .error-message {
            width: 90%;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        h2 {
            font-size: 24px;
        }

        .input-field {
            font-size: 14px;
        }

        .submit-btn {
            font-size: 14px;
        }

        .error-message {
            font-size: 13px;
            padding: 8px 10px;
        }
    }
    </style>
</head>

<body>

    <!-- Form -->
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="input-field" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="input-field" required>

            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <!-- Error Message (displayed at bottom of the form) -->

    </div>

    <?php
    // Include database connection
    include "./connection.php";

    // Initialize error variable
    $error = "";

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (!empty($username) && !empty($password)) {
            // Sanitize user input
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            // Query to check user credentials
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $execute = mysqli_query($connection, $query);

            if (!$execute) {
                die("Query failed: " . mysqli_error($connection));
            }

            // Check if any rows are returned
            if (mysqli_num_rows($execute) > 0) {
                header("Location: ./dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Please fill in all fields.";
        }
    }
    ?>
    <?php if (!empty($error)) : ?>
    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
</body>

</html>