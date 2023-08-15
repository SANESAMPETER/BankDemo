<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created - Banking System</title>
    <!-- Add CSS and Bootstrap links here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Add the styles for the loading animation here */
        .loading {
            display: none;
        }
        .loading:after {
            content: "";
            display: block;
            width: 10px;
            height: 10px;
            margin: 5px;
            border-radius: 50%;
            border: 2px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
        <?php
            // Start the session and retrieve the data
            session_start();
            $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
            $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
            ?>
            Your account has been created with the following details:
            <ul>
                <li>Display Name: <?php echo $name; ?></li>
                <li>Password: <?php echo $password; ?></li>
            </ul>

            <button id="loginButton" class="btn btn-primary">Go to Login</button>
            <span class="loading"></span>
        </div>
    </div>

    <!-- Add JavaScript and jQuery links here -->
<!-- jQuery CDN (latest version) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function () {
        $("#loginButton").on("click", function () {
            // Show the loading animation
            $(this).prop("disabled", true);
            $(".loading").show();

            // Redirect to login.php after a short delay (you can adjust the delay time as needed)
            setTimeout(function () {
                window.location.href = "index.php";
            }, 1000); // 1 second delay
        });
    });
</script>
With the above modifications, when the user visits the accountcreated.php page, they will see the account details displayed along with the "Go to Login" button. When the user clicks the button, it will show the loading animation for a brief moment (1 second in this example) before redirecting them to the login.php page. You can adjust the delay time in the setTimeout function according to your preference.

Make sure to keep the CSS and JavaScript code within the appropriate sections in the accountcreated.php file, and ensure that you have the necessary CSS and JavaScript files included in the head section as shown in the provided code.






</body>
</html>
