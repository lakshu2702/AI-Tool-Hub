<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Tools</title>
    <style>
body {
    min-height: 100vh;
    margin: 0;
    padding: 0;
    background-color: #000000;
    color: #fff;
    overflow-y: auto; /* Enable vertical scrolling on the full page */
}
/* Importing AI-themed Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Orbitron&family=Exo+2&family=Russo+One&display=swap');

/* Applying fonts */
body {
    font-family: 'Roboto Mono', monospace; /* Main font for body text */
}

h1, h2 {
    font-family: 'Exo 2', sans-serif;
}

p {
    font-family: 'Exo 2', sans-serif; /* Font for paragraphs */
}

button {
    font-family: 'Exo 2', sans-serif;
}

#video-background {
    position: fixed; /* Keep the video fixed while scrolling */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

header {
    background-color: #000000;
    color: #fff;
    padding: 20px;
    text-align: center;
    transition: background-color 0.5s ease;
    display: flex; /* Use flexbox to align image and text */
    justify-content: center; /* Center both elements */
    align-items: center; /* Align vertically */
    gap: 10px; /* Adds space between the text and image */
}

h1 {
    margin: 0;
    font-size: 48px; /* Using pixels */
}

h2{
    font-size: 28px;
}

#logo {
    width: 180px; /* Adjust the size of the logo */
    height: 100px;
}

#auth-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center the content horizontally */
    justify-content: center; /* Center the content vertically */
    margin-top: 40px;
    margin-top: 40px;
    margin-left: 40px;
    width: 500px; /* Adjust width */
    max-width: 100%;
    background-color: #333333;
    padding: 30px; /* Add padding around the container */
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); /* Add a shadow for better visibility */
}

#auth-selection {
    display: flex;
    flex-direction: row; /* Display buttons side by side */
    justify-content: center; /* Center the buttons */
    align-items: center;
    gap: 20px; /* Add space between the buttons */
    margin-bottom: 20px; /* Add space below the buttons */
}

#auth-selection button {
    font-size: 18pt;
    padding: 15px 40px;
    background-color: #444;
    color: #fff;
    border: none;
    cursor: pointer;
    margin: 10px;
    transition: background-color 0.3s ease;
    border-radius: 5px; /* Rounded corners */
}

#auth-selection button:hover {
    background-color: #666;
}

#auth-box {
    background-color: #444;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
    display: none; /* Initially hidden, you can toggle this with JavaScript */
    width: 100%; /* Ensure the form fits within the container */
}

#auth-box form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

#auth-box label {
    margin-top: 10px;
    font-size: 14pt;
}

#auth-box input,
#auth-box select {
    padding: 10px;
    margin-bottom: 15px;
    width: 100%; /* Full width to fit the container */
    background-color: #555;
    color: #fff;
    border: none;
    border-radius: 5px; /* Rounded corners for inputs */
}

#auth-box input[type="submit"],
#auth-box button {
    padding: 15px 30px;
    background-color: #666;
    color: #fff;
    border: none;
    cursor: pointer;
    margin-top: 10px;
    width: 100%; /* Full width for buttons */
    transition: background-color 0.3s ease;
    border-radius: 5px; /* Rounded corners for buttons */
    font-size: 18px;
}

#auth-box input[type="submit"]:hover,
#auth-box button:hover {
    background-color: #777;
}

    </style>
</head>
<body>
<header>
    <h1>Welcome to</h1>
    <img src="logo.png" alt="Logo" id="logo">
</header>

    <video id="video-background" autoplay muted loop>
        <source src="vid.mp4" type="video/mp4">Your browser does not support the video tag.
    </video>
    <div id="auth-container">
        <div id="auth-selection">
            <button onclick="showLogin()">Log In</button>
            <button onclick="showSignUp()">Sign Up</button>
        </div>

        <div id="auth-box">
            <div id="login">
                <h2><center>Login</h2>
                <form action="" method="post" onsubmit="return validateLoginForm()">
                    <label for="login-email">Email:</label>
                    <input type="email" id="login-email" name="login-email" required>

                    <label for="login-password">Password:</label>
                    <input type="password" id="login-password" name="login-password" required>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <div id="sign-up">
                <h2><center>Sign Up</h2>
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

        <?php
        $connection = mysqli_connect("localhost", "root", "", "ai_tools");

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            } elseif (isset($_POST["name"]) && isset($_POST["last-name"]) && isset($_POST["gender"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                $name = mysqli_real_escape_string($connection, $_POST["name"]);
                $lastName = mysqli_real_escape_string($connection, $_POST["last-name"]);
                $gender = mysqli_real_escape_string($connection, $_POST["gender"]);
                $email = mysqli_real_escape_string($connection, $_POST["email"]);
                $password = mysqli_real_escape_string($connection, $_POST["password"]);

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users (name, last_name, gender, email, password) 
                          VALUES ('$name', '$lastName', '$gender', '$email', '$hashedPassword')";

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
            function showLogin() {
                document.getElementById('auth-box').style.display = 'block';
                document.getElementById('login').style.display = 'block';
                document.getElementById('sign-up').style.display = 'none';
            }

            function showSignUp() {
                document.getElementById('auth-box').style.display = 'block';
                document.getElementById('login').style.display = 'none';
                document.getElementById('sign-up').style.display = 'block';
            }

            function validateLoginForm() {
                var email = document.getElementById('login-email').value;
                var password = document.getElementById('login-password').value;

                if (email === '' || password === '') {
                    alert('Please fill in all fields.');
                    return false;
                }

                return true;
            }

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
    </div>
</body>
</html>
