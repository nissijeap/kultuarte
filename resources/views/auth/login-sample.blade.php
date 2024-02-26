<!DOCTYPE html>
<html lang="en">
<head>
    <title>Glassmorphism Login Form Tutorial in HTML CSS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <style media="screen">
        body {
            background-color: #080710;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }
        .background {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .background .shape {
            border-radius: 50%;
        }
        form {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }
        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }
        label {
            font-size: 16px;
            font-weight: 500;
        }
        input {
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            border: none;
        }
        button {
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        .social {
            margin-top: 30px;
            display: flex;
        }
        .social div {
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }
        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }
        .social i {
            margin-right: 4px;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape" style="background: linear-gradient(#1845ad, #23a2f6); left: -80px; top: -80px; height: 200px; width: 200px;"></div>
        <div class="shape" style="background: linear-gradient(to right, #ff512f, #f09819); right: -30px; bottom: -80px; height: 200px; width: 200px;"></div>
    </div>
    <form class="background">
        <h3>Login Here</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">
        <button>Log In</button>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </form>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
