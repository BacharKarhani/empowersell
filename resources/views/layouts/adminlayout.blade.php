<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #555555;
            color: white;
            margin-top: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #333333;
            color: white;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            padding: 10px;
            text-align: center;
        }

        .sidebar li:hover {
            background-color: #444;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .content h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333333;
            color: white;
        }

        tr:hover {
            background-color: #444;
        }

        a {
            text-decoration: none;
            color: #ff4500;
        }

        button {
            background-color: #ff4500;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff5733;
            color:white;
        }

        .logo {
            width: 80%;
            margin: 0 auto 20px;
            display: block;
            max-width: 200px;
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="{{ asset('images/empowersell.png') }}" alt="Logo" class="logo">
        <ul>
            <li><a href="{{ route('manage.users.index') }}">Manage Users</a></li>
            <li><a href="{{ route('manage.reviews.index') }}">Manage Reviews</a></li>
            <li><a href="{{ route('manage.products.index') }}">Manage Products</a></li>
            <li><a href="{{ route('manage.categories.index') }}">Manage Categories</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
