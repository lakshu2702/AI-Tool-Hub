<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Tools</title>
    <style>
        /* General body styling */
        body {
            min-height: 100vh; /* Ensure the body takes up the full viewport height */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            background-color: #000000; /* Black background */
            color: #fff; /* White text */
            overflow-y: auto; /* Enable vertical scrolling for the entire page */
        }

        /* Importing Google Fonts with AI-themed styles */
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Orbitron&family=Exo+2&family=Russo+One&display=swap');

        /* Apply the fonts to specific elements */
        body {
            font-family: 'Roboto Mono', monospace; /* Main font for body text */
        }

        h1, h2 {
            font-family: 'Exo 2', sans-serif; /* Use Exo 2 font for headings */
        }

        p {
            font-family: 'Exo 2', sans-serif; /* Same font for paragraphs */
        }

        button {
            font-family: 'Exo 2', sans-serif; /* Button font style */
        }

        /* Styling for video background */
        #video-background {
            position: fixed; /* Keeps the video in the background while scrolling */
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            object-fit: cover; /* Ensures the video covers the screen without distortion */
            z-index: -1; /* Behind all other content */
        }

        /* Header styling */
        header {
            background-color: #000000; /* Black header */
            color: #fff; /* White text */
            padding: 20px; /* Padding inside the header */
            text-align: center; /* Center align the text */
            transition: background-color 0.5s ease; /* Smooth background color transition */
            display: flex; /* Flexbox layout to align logo and text */
            justify-content: center; /* Center the content horizontally */
            align-items: center; /* Center the content vertically */
            gap: 10px; /* Add space between text and logo */
        }

        h1 {
            margin: 0; /* Remove default margin */
            font-size: 48px; /* Use pixels for the heading size */
        }

        h2 {
            font-size: 28px; /* Font size for h2 */
        }

        /* Logo styling */
        #logo {
            width: 180px; /* Adjust logo width */
            height: 100px; /* Adjust logo height */
        }

        /* Container for authentication selection (login/register) */
        #auth-container {
            display: flex;
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center the elements horizontally */
            justify-content: center; /* Center the content vertically */
            margin-top: 40px; /* Top margin */
            margin-left: 40px; /* Left margin */
            width: 500px; /* Container width */
            max-width: 100%; /* Make it responsive */
            background-color: #333333; /* Dark background for auth box */
            padding: 30px; /* Padding inside the container */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); /* Shadow for visibility */
        }

        /* Styling for buttons in the auth selection (login/register options) */
        #auth-selection {
            display: flex;
            flex-direction: row; /* Buttons side by side */
            justify-content: center; /* Center the buttons horizontally */
            align-items: center; /* Align the buttons vertically */
            gap: 20px; /* Space between buttons */
            margin-bottom: 20px; /* Space below the buttons */
        }

        #auth-selection button {
            font-size: 18pt; /* Font size for buttons */
            padding: 15px 40px; /* Padding inside the buttons */
            background-color: #444; /* Dark background for buttons */
            color: #fff; /* White text */
            border: none; /* Remove borders */
            cursor: pointer; /* Pointer cursor */
            margin: 10px; /* Margin for spacing */
            transition: background-color 0.3s ease; /* Smooth color transition on hover */
            border-radius: 5px; /* Rounded button corners */
        }

        #auth-selection button:hover {
            background-color: #666; /* Lighter background on hover */
        }

        /* Auth box for login/register form */
        #auth-box {
            background-color: #444; /* Dark background */
            padding: 20px; /* Padding inside the box */
            border-radius: 10px; /* Rounded corners */
            margin-top: 20px; /* Margin from the top */
            display: none; /* Hidden initially, can be toggled using JavaScript */
            width: 100%; /* Full width inside its container */
        }

        #auth-box form {
            display: flex;
            flex-direction: column; /* Stack form elements vertically */
            align-items: center; /* Center form elements horizontally */
            width: 100%; /* Full width inside the form */
        }

        #auth-box label {
            margin-top: 10px; /* Space above the label */
            font-size: 14pt; /* Font size for labels */
        }

        #auth-box input,
        #auth-box select {
            padding: 10px; /* Padding inside inputs */
            margin-bottom: 15px; /* Space below the inputs */
            width: 100%; /* Full width */
            background-color: #555; /* Dark background for inputs */
            color: #fff; /* White text */
            border: none; /* Remove borders */
            border-radius: 5px; /* Rounded input corners */
        }

        /* Styling for submit button and other buttons inside the auth-box */
        #auth-box input[type="submit"],
        #auth-box button {
            padding: 15px 30px; /* Padding inside buttons */
            background-color: #666; /* Darker background */
            color: #fff; /* White text */
            border: none; /* Remove borders */
            cursor: pointer; /* Pointer cursor */
            margin-top: 10px; /* Margin on top */
            width: 100%; /* Full width */
            transition: background-color 0.3s ease; /* Smooth transition for hover */
            border-radius: 5px; /* Rounded button corners */
            font-size: 18px; /* Font size for buttons */
        }

        /* Hover effect for submit and auth buttons */
        #auth-box input[type="submit"]:hover,
        #auth-box button:hover {
            background-color: #777; /* Lighter background color on hover */
        }

    </style>
</head>

<body>
    <!-- Header section with a welcome message and a logo image -->
    <header>
        <h1>Welcome to</h1>
        <img src="logo.png" alt="Logo" id="logo">
    </header>

    <!-- Video background with autoplay, muted, and loop properties -->
    <video id="video-background" autoplay muted loop>
        <source src="vid.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Container for the authentication section -->
    <div id="auth-container">
        <!-- Buttons to switch between Login and Sign Up forms -->
        <div id="auth-selection">
            <button type="button" onclick="showLogin()">Log In</button>
            <button type="button" onclick="showSignUp()">Sign Up</button>
        </div>

        <!-- Container for the authentication form (login or sign-up) -->
        <div id="auth-box" style="display:none;">
            <!-- Login form section -->
            <div id="login" style="display:none;">
                <h2><center>Login</center></h2>
                <form action="" method="post" onsubmit="return validateLoginForm()">
                    <label for="login-email">Email:</label>
                    <input type="email" id="login-email" name="login-email" required>

                    <label for="login-password">Password:</label>
                    <input type="password" id="login-password" name="login-password" required>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <!-- Sign-up form section -->
            <div id="sign-up" style="display:none;">
                <h2><center>Sign Up</center></h2>
                <form action="" method="post" onsubmit="return validateSignUpForm()">
                    <label for="name">First Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <?php
    // Establishing connection to MySQL database 'ai_tools' with root user and no password
    $connection = mysqli_connect("localhost", "root", "", "ai_tools");

    // Checking if the connection to the database failed
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form was submitted via the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Login Form Submission
        if (isset($_POST["login-email"]) && isset($_POST["login-password"])) {
            $email = $_POST["login-email"];
            $password = $_POST["login-password"];

            $hashedPasswordQuery = "SELECT password FROM users WHERE email = ?";
            $stmt = mysqli_prepare($connection, $hashedPasswordQuery);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($hashedPassword && password_verify($password, $hashedPassword)) {
                echo '<script>alert("Login successful!"); window.location.href = "pop.php";</script>';
            } else {
                echo '<script>alert("Login failed. Invalid credentials.");</script>';
            }
        } 
        // Sign Up Form Submission
        elseif (isset($_POST["name"]) && isset($_POST["last-name"]) && isset($_POST["gender"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $name = mysqli_real_escape_string($connection, $_POST["name"]);
            $lastName = mysqli_real_escape_string($connection, $_POST["last-name"]);
            $gender = mysqli_real_escape_string($connection, $_POST["gender"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $password = mysqli_real_escape_string($connection, $_POST["password"]);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (name, last_name, gender, email, password) VALUES ('$name', '$lastName', '$gender', '$email', '$hashedPassword')";

            if (mysqli_query($connection, $query)) {
                echo '<script>alert("Registration successful!"); window.location.href = "pop.html";</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
            }
        }
    }

    mysqli_close($connection);
    ?>

    <script>
        // Function to display the login form and hide the sign-up form
        function showLogin() {
            document.getElementById('auth-box').style.display = 'block';
            document.getElementById('login').style.display = 'block';
            document.getElementById('sign-up').style.display = 'none';
        }

        // Function to display the sign-up form and hide the login form
        function showSignUp() {
            document.getElementById('auth-box').style.display = 'block';
            document.getElementById('login').style.display = 'none';
            document.getElementById('sign-up').style.display = 'block';
        }

        // Function to validate the login form
        function validateLoginForm() {
            var email = document.getElementById('login-email').value;
            var password = document.getElementById('login-password').value;

            if (email === '' || password === '') {
                alert('Please fill in all fields.');
                return false;
            }

            return true;
        }

        // Function to validate the sign-up form
        function validateSignUpForm() {
            var name = document.getElementById('name').value;
            var lastName = document.getElementById('last-name').value;
            var gender = document.getElementById('gender').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm-password').value;

            if (name === '' || lastName === '' || gender === '' || email === '' || password === '' || confirmPassword === '') {
                alert('Please fill in all fields.');
                return false;
            }

            if (password.length < 6) {
                alert('Password should be at least 6 characters long.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>