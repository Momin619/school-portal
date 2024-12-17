<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> School Database</title>
    <style>
    /* Basic Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
    }

    h1 {
        color: #2c3e50;
        font-size: 2.5em;
        margin-bottom: 40px;
        text-align: center;
    }

    /* Container for the buttons */
    .container {
        display: flex;
        justify-content: center;
        width: 100%;
        max-width: 600px;
        gap: 20px;
        flex-wrap: wrap;
        padding: 10px;
    }

    .signup,
    .signin {
        flex: 1 1 45%;
        /* Each takes 45% width on medium/large screens */
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px 0;
    }

    h3 {
        font-size: 1.2em;
        color: #fff;
        background-color: #3498db;
        padding: 15px 25px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        max-width: 250px;
    }

    a {
        outline: none;
        text-decoration: none;
    }

    h3:hover {
        background-color: #2980b9;
    }

    /* Responsive styling for mobile screens */
    @media (max-width: 576px) {
        h1 {
            font-size: 1.8em;
        }

        .container {

            flex-direction: column;
            margin-left: -35px;
            gap: 2px;

        }

        .signup,
        .signin {
            flex: 1 1 100%;
            margin: 5px 0;
        }

        h3 {
            font-size: 1em;
            padding: 10px 20px;
        }
    }

    /* Styling for tablets */
    @media (min-width: 577px) and (max-width: 768px) {
        h1 {
            font-size: 2em;
        }

        .signup,
        .signin {
            flex: 1 1 48%;
        }

        h3 {
            font-size: 1.1em;
        }
    }

    /* Styling for desktops */
    @media (min-width: 769px) {
        h1 {
            font-size: 2.5em;
        }

        .signup,
        .signin {
            flex: 1 1 45%;
        }

        h3 {
            font-size: 1.2em;
        }
    }

    /* Large desktop screens */
    @media (min-width: 1200px) {
        h1 {
            font-size: 3em;
        }

        .container {
            max-width: 700px;
        }
    }
    </style>
</head>

<body>
    <h1>Welcome to the Attendance System</h1>
    <div class="container">
        <div class="signup">
            <a href="./signup.php">
                <h3>Sign Up</h3>
            </a>
        </div>
        <div class="signin">
            <a href="./login.php">
                <h3>Sign In</h3>
            </a>
        </div>
    </div>
</body>

</html>