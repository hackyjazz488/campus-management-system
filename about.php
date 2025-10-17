<!DOCTYPE html>
<html lang="en">

<head>
    <title>Xyz2023</title>
    <style>
        /* Large rounded green border */
        hr.blueline {
            border: 10px solid #00004d;
            border-radius: 5px;
        }

        #bj {
            font-size: 22px;
        }

        /* Background image styling */
        .bgImage {
            background-image: url(images/cs03.jpg);
            background-size: cover;
            background-position: center center;
            height: 650px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body style="background-color:#b3e0ff ">

    <title>Sanchalana 2k20</title>
    <style>
        header {
            background-color: #b3e0ff;
            padding: 15px;
            text-align: center;
        }

        .navbar {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 25px;
        }

        .navbar-brand h2 {
            margin: 0;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
        }

        .navbar-nav li {
            display: inline-block;
            margin-right: 10px;
        }

        .navbar-nav li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }

        .jumbotron {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .jumbotron h1 {
            margin: 0;
        }

        .jumbotron p {
            font-weight: bold;
        }

        .browse {
            display: flex;
            justify-content: center;
        }

        .row {
            margin: 0 -15px;
        }

        .col-md-12 {
            padding: 0 15px;
        }
    </style>

    <header class="bgImage">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <!--website name/title-->
                    <a class="navbar-brand">
                        <h2> Sanchalana 2k20</h2>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <!--navigation-->
                    <li><a href="webpage.php"><strong>Home</strong></a></li>
                    <li><a href="register_user.php"><strong>Register</strong></a></li>
                    <li><a href="contact.php"><strong>Contact Us</strong></a></li>
                    <li><a href="login_user.php"><strong>Login</strong></a></li>
                                
                </ul>
            </div>
            <!--container div-->
        </nav>
        <div class="col-md-12">
            <div class="container">
                <div class="jumbotron">
                    <!--jumbotron-->
                    <h1><strong>Explore<br></strong> Your Favorite Event</h1>
                    <!--jumbotron heading-->
                    <p style="font-style: bold">"Limitation-It's just your imagination, so just stop thinking about
                        limitation and think about your goal and run towards it to achieve the peak of your goal:)"</p>
                    <br>
                    <br>
                    <div class="browse d-md-flex col-md-14">
                        <div class="row">
                        </div>
                        <hr class="blueline">
                        <div class="col-md-12">

                            <h1>About Us</h1>

                            <p id="bj">abc </p>
                            <p id="bj">abc</p>
                            <p id="bj">xyz2023</p>
                        </div>
                        <hr class="blueline">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php require 'utils/footer.php'; ?>

</body>

</html>
