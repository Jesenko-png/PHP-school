<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .login-form {
            background-color: rgba(224, 197, 197, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .social-login {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
        .social-btn {
            display: inline-block;
            width: calc(50% - 10px);
            padding: 12px;
            margin: 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }
        .google-btn {
            background-color: #DB4437;
        }
        .facebook-btn {
            background-color: #4267B2;
        }
        .slideshow {
            margin-bottom: 30px;
            position: relative;
            height: 200px;
            overflow: hidden;
            border-radius: 10px;
        }
        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 20px;
        }
        .slide.active {
            opacity: 1;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <div class="logo-container">
                <img src="images/logo.png" alt="Logo" class="logo">
            </div>
            <div class="slideshow">
                <div class="slide active" style="background: linear-gradient(45deg, #ff6b6b, #ff8e53)">
                    <div>Dobrodosli na stranicu!</div>
                </div>
                <div class="slide" style="background: linear-gradient(45deg, #4facfe, #00f2fe)">
                    <div>Ti si konjina</div>
                </div>
                <div class="slide" style="background: linear-gradient(45deg, #43e97b, #38f9d7)">
                    <div>Mars konju!</div>
                </div>
            </div>
            
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Upisi e mail mamlaze" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Upisi sifru konjino" required>
                </div>
                <button type="submit" class="submit-btn">Sign In</button>
            </form>
            
            <div class="social-login">
                <a href="#" class="social-btn google-btn">
                    <i class="fab fa-google"></i> Konjina hoce na google
                </a>
                <a href="#" class="social-btn facebook-btn">
                    <i class="fab fa-facebook-f"></i> Konjna hoce na facebook
                </a>
            </div>
        </div>
    </div>

    <script>
        // Slideshow functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        
        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        
        // Change slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>