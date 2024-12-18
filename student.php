<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
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
        background: #f5f5f5;
    }

    header {
        background-color: #4CAF50;
        color: #fff;
        text-align: center;
        padding: 1rem 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    header h1 {
        font-size: 1.8rem;
    }

    /* Layout */
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .tabs {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid #ddd;
        margin-bottom: 20px;
    }

    .tab {
        padding: 10px 20px;
        cursor: pointer;
        color: #333;
        border-bottom: 3px solid transparent;
        transition: 0.3s;
    }

    .tab.active {
        color: #4CAF50;
        border-bottom: 3px solid #4CAF50;
    }

    .tab:hover {
        color: #4CAF50;
    }

    /* Forms and Tables */
    .section {
        display: none;
        animation: fadeIn 0.5s ease-in-out;
    }

    .section.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    form input,
    form button,
    form textarea {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    form button {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
        border: none;
        transition: 0.3s;
    }

    form button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #f4f4f4;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tabs {
            flex-direction: column;
            align-items: center;
        }

        .tab {
            margin-bottom: 5px;
        }

        table {
            font-size: 0.9rem;
        }
    }


    /* error message styling */
    /* Message container styles */
    .message {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
        text-align: center;
        font-size: 1rem;
        animation: fadeInOut 3s forwards;
        box-sizing: border-box;
    }

    /* Success message style */
    .message.success {
        background-color: #4CAF50;
        color: white;
    }

    /* Error message style */
    .message.error {
        background-color: #f44336;
        color: white;
    }

    /* Animation for showing and hiding the message */
    @keyframes fadeInOut {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        20% {
            opacity: 1;
            transform: translateY(0);
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(20px);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .message {
            font-size: 0.9rem;
        }
    }
    </style>
</head>

<body>
    <header>
        <h1>Student Management System</h1>
    </header>
    <div class="container">
        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active" data-target="#add-student">Add Student</div>
            <div class="tab" data-target="#view-students">View Students</div>
            <div class="tab" data-target="#update-student">Update Student</div>
            <div class="tab" data-target="#delete-student">Delete Student</div>
        </div>

        <!-- Sections -->
        <div class="section active" id="add-student">
            <h2>Add Student</h2>
            <form action="" method="POST" name="studentform">
                <input type="number" name="roll_no" placeholder="Roll Number" required>
                <input type="text" name="name" placeholder="Student Name" required>
                <input type="number" name="class" placeholder="Class" required>
                <input type="text" name="email" placeholder="Email" required>
                <button type="submit">Add Student</button>
            </form>
        </div>

        <!-- <?php

//  include  "./connection.php";
//  $roll_no = $_POST['roll_no'];
//  $name = $_POST['name'];
//  $class = $_POST['class'];
//  $email = $_POST['email'];
//  if(!empty($roll_no) && !empty($name) && !empty($class) && !empty($email)){
//  $insert = "INSERT INTO students (roll_no , Name , Class , Email) VALUES ('{$roll_no}','{$name}','{$class}','{$email}')";
//  $excecute = mysqli_query($connection,$insert);
//  if($excecute){
//     echo 'data added' ;
//  }


//  }

?> -->
        <?php
include "./connection.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and check if all fields are present in $_POST
    $roll_no = isset($_POST['roll_no']) ? mysqli_real_escape_string($connection, $_POST['roll_no']) : null;
    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : null;
    $class = isset($_POST['class']) ? mysqli_real_escape_string($connection, $_POST['class']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : null;

    // Validate the inputs
    if (!empty($roll_no) && !empty($name) && !empty($class) && !empty($email)) {
        // Check if the student already exists by roll_no or email
        $checkQuery = "SELECT * FROM students WHERE roll_no = '$roll_no' OR email = '$email'";
        $result = mysqli_query($connection, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="message error">Student with this roll number or email already exists!</div>';
        } else {
            // Insert the new student into the database
            $insertQuery = "INSERT INTO students (roll_no, Name, Class, Email) VALUES ('$roll_no', '$name', '$class', '$email')";
            $execute = mysqli_query($connection, $insertQuery);

            if ($execute) {
                echo '<div class="message success">Student added successfully!</div>';
            } else {
                echo '<div class="message error">Error: ' . mysqli_error($connection) . '</div>';
            }
        }
    } else {
        echo '<div class="message error">All fields are required!</div>';
    }
}
?>




        <div class="section" id="view-students">
            <h2>View Students</h2>
            <!-- Table of Students -->
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            include "./connection.php";

            // Assuming $roll_no is set or passed through POST or GET
            // If you want to view all students, remove the WHERE clause
            $select = "SELECT * FROM students";  // Or use WHERE roll_no = '$roll_no' to filter
            $exc = mysqli_query($connection, $select);

            // Check if any rows are returned
            if (mysqli_num_rows($exc) > 0) {
                // Loop through the results and display them in the table
                while ($student = mysqli_fetch_assoc($exc)) {
                    echo "<tr>";
                    echo "<td>" . $student['roll_no'] . "</td>";
                    echo "<td>" . $student['Name'] . "</td>";
                    echo "<td>" . $student['Class'] . "</td>";
                    echo "<td>" . $student['Email'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found.</td></tr>";
            }
            ?>
                </tbody>
            </table>
        </div>

        <div class="section" id="update-student">
            <h2>Update Student</h2>
            <form action="update_student.php" method="POST">
                <input type="text" name="roll_no" placeholder="Roll Number" required>
                <input type="text" name="name" placeholder="Updated Name">
                <input type="text" name="class" placeholder="Updated Class">
                <input type="text" name="email" placeholder="Updated Email">
                <button type="submit">Update Student</button>
            </form>
        </div>

        <div class="section" id="delete-student">
            <h2>Delete Student</h2>
            <form action="delete_student.php" method="POST">
                <input type="text" name="roll_no" placeholder="Roll Number" required>
                <button type="submit">Delete Student</button>
            </form>
        </div>
    </div>

    <script>
    // Tab Navigation Script
    const tabs = document.querySelectorAll('.tab');
    const sections = document.querySelectorAll('.section');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            sections.forEach(section => section.classList.remove('active'));

            tab.classList.add('active');
            document.querySelector(tab.getAttribute('data-target')).classList.add('active');
        });
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        // Do form submission logic here (e.g., AJAX request)
        setTimeout(function() {
            form.reset(); // Reset the form after submission
        }, 200); // Delay reset to let the form submit first
    });
    </script>
</body>

</html>