<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-box {
            background: #fff;
            padding: 30px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-box label {
            font-weight: bold;
            font-size: 14px;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-box button:hover {
            background: #5563c1;
        }

        .login-box .note {
            text-align: center;
            font-size: 13px;
            margin-top: 15px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Prijava</h2>

    <form method="post" action="controllers/createNewUserController.php">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Prijavi se</button>
    </form>

    <div class="note">
        Dobrodošli 👋
    </div>
</div>

</body>
</html>
