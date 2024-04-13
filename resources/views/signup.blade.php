<!DOCTYPE html>
<html>
<head>
    <title>Empowersell - Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #555555;
            color: white;
            margin-top: 200px;
            padding: 0;
            display: flex;
            flex-direction: column;
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
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
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

        a {
            color: #ff4500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            margin-bottom: 20px;
            max-width: 200px;
            width: 100%;
            border-radius:30px;
        }

        .radio-group {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .radio-group label {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/empowersell.png') }}" alt="Logo" width="100" height="100" class="logo">
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="{{ route('signup.submit') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Full Name</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Gender</label>
                <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label>Address</label>
                <input type="text" name="address" required>
            </div>

            <label>You are:</label>
            <div class="radio-group">
                <label><input type="radio" name="role_id" value="2"> Vendor</label>
                <label><input type="radio" name="role_id" value="3"> Customer</label>
            </div>

            <div>
                <label>Profile Picture</label>
                <input type="file" name="profile_picture" accept="image/*">
            </div><br>
            <div>
                <label>Phone Number</label>
                <input type="text" name="phone_number" required>
            </div><br>
            <div>
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.querySelector('input[name="profile_picture"]');
            fileInput.addEventListener('change', function () {
                const fileSize = this.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 2) {
                    alert('The selected file is too large. Please choose a file under 2MB.');
                    this.value = ''; // Clear the file input
                }
            });
        });
    </script>
</body>
</html>
