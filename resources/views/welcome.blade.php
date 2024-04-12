<!DOCTYPE html>
<html>
<head>
    <title>Empowersell</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #555555;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #333333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #ff4500;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff5733;
        }

        .signup-link {
            text-align: center;
            margin-top: 10px;
        }

        .signup-link a {
            color: #ff4500;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 100px;
            width: 100%;
        }

        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <h2>Login</h2>
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="signup-link">
            <p>Don't have an account? <a href="/signup">Sign Up</a></p>
        </div>

    </div>
</body>
</html>
