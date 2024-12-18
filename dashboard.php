<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
    /* Global Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #4CAF50;
        color: #fff;
        padding: 1rem;
        text-align: center;
    }

    header h1 {
        font-size: 1.8rem;
    }

    /* Main Layout */
    .container {
        display: flex;
        flex: 1;
        flex-direction: row;
    }

    .sidebar {
        background-color: #f8f9fa;
        width: 250px;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        display: block;
        padding: 10px;
        margin-bottom: 10px;
        text-decoration: none;
        color: #333;
        background: #e7e7e7;
        border-radius: 5px;
        text-align: center;
        font-weight: 500;
    }

    .sidebar a:hover {
        background: #4CAF50;
        color: #fff;
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    .content h2 {
        margin-bottom: 20px;
        font-size: 1.5rem;
        color: #333;
    }

    .content p {
        font-size: 1rem;
        color: #555;
    }

    /* Footer */
    footer {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            text-align: center;
        }

        .sidebar a {
            display: inline-block;
            margin: 5px;
            width: auto;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>School Management Dashboard</h1>
    </header>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="./student.php">Students</a>
            <a href="./results.php">Results</a>
            <a href="./admission-policy.php">Admission Policy</a>
        </div>

        <!-- Main Content -->

    </div>

    <footer>
        <p>&copy; 2024 School Management System. All Rights Reserved.</p>
    </footer>
</body>

</html>