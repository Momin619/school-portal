<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Database - Sign up</title>
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
    }

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

    /* Form container */

    .error-message {
        z-index: 22222222222;
        background-color: #ffe6e6;
        color: #d9534f;
        border: 1px solid #d9534f;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        font-size: 14px;
        position: absolute;
        top: 39px;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 40px);
        box-sizing: border-box;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 30px;
            width: 90%;
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
            font-size: 12px;
            top: 40px;
        }
    }
    </style>
</head>

<body>
    <?php if (isset($_GET['error'])): ?>
    <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
    <div class="form-container">
        <h2>Sign up</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="input-field" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="input-field" required><br>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <?php
      include "./connection.php";
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $username = isset($_POST['username']) ? trim($_POST['username']) : '';
          $password = isset($_POST['password']) ? trim($_POST['password']) : '';

          if (!empty($username) && !empty($password)) {
              if (strlen($username) < 5 || strlen($password) < 8) {
                  header("Location: ./signup.php?error=Username must be at least 5 characters and Password must be at least 8 characters");
                  exit;
              }

              $query = "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')";
              $execute = mysqli_query($connection, $query);

              if ($execute) {
                  header("Location: ./login.php");
                  exit;
              } else {
                  header("Location: ./signup.php?error=Failed to insert data");
                  exit;
              }
          } else {
              header("Location: ./signup.php?error=Please fill in all fields");
              exit;
          }
      }
    ?>
</body>

</html>