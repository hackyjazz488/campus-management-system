<!DOCTYPE html>
<html lang="en">
<head>
    <title>Christmas Webpage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 50px;
            background: url('zz.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative; /* Added position relative for snowflakes */
        }

        h1 {
            color: #c70039; /* Red title color */
            font-style: italic;
            font-family: 'Copperplate, Papyrus, fantasy', sans-serif;
        }

        nav {
            background-color: #333; /* Navbar background color */
            padding: 10px;
            width: 100%;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            z-index: 1;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            background-color: #4caf50; /* Green button background */
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            position: relative;
        }

        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .decorations {
            font-size: 40px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .decorations:hover {
            transform: scale(1.2); /* Enlarge on hover */
        }

        .login-buttons {
            display: flex;
            justify-content: space-around;
            width: 50%; /* Adjust the width as needed */
            margin-top: 20px;
        }

        .snowflake {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            width: 8px;
            height: 8px;
            animation: fall 10s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(100vh);
            }
        }

        #rotatingBox {
            width: 400px; /* Increased box size */
            height: 400px; /* Increased box size */
            position: relative;
            transform-style: preserve-3d;
            animation: rotateBox 20s linear infinite;
            margin-top: 20px; /* Added margin top */
        }

        .boxFace {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            border: 4px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .face1 { transform: rotateY(0deg) translateZ(200px); }
        .face2 { transform: rotateY(90deg) translateZ(200px); }
        .face3 { transform: rotateY(180deg) translateZ(200px); }
        .face4 { transform: rotateY(270deg) translateZ(200px); }

        @keyframes rotateBox {
            0% { transform: rotateY(0deg); }
            25% { transform: rotateY(90deg); }
            50% { transform: rotateY(180deg); }
            75% { transform: rotateY(270deg); }
            100% { transform: rotateY(360deg); }
        }
    </style>
</head>
<body>
    <nav>
        <a><u>Home</u></a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>

    <h1>WELCOME!</h1>

    <div class="decorations">
        &#127878; &#127876; &#10052; &#10052; &#127774; &#10052; &#10052;&#127876; &#127878;
    </div>

    <div id="rotatingBox">
        <div class="boxFace face1" style="background-image: url('christams tree.jpg');"></div>
        <div class="boxFace face2" style="background-image: url('bb.jpg');"></div>
        <div class="boxFace face3" style="background-image: url('christmas bell.jpg');"></div>
        <div class="boxFace face4" style="background-image: url('aa.jpg');"></div>
    </div>

    <div class="login-buttons">
        <button id="loginButton" onclick="showLoginOptions()">Login</button>
        <button id="calendarButton" onclick="redirectToCalendar()">Calendar</button>
    </div>

    <script>
        function showLoginOptions() {
            var isAdmin = confirm("Do you want to login as admin?");
            if (isAdmin) {
                // Redirect to admin login page
                window.location.href = 'register.php';
            } else {
                // Redirect to user login page
                window.location.href = 'register_user.php';
            }
        }

        function redirectToCalendar() {
            // You can replace the '#' with the actual URL of your calendar page
            window.location.href = 'calendar.php';
        }

        // Generate snowflakes
        for (let i = 0; i < 50; i++) {
            createSnowflake();
        }

        function createSnowflake() {
            let snowflake = document.createElement('div');
            snowflake.className = 'snowflake';
            snowflake.style.left = Math.random() * window.innerWidth + 'px';
            document.body.appendChild(snowflake);
        }
    </script>
</body>
</html>