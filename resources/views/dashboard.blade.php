<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }
        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ session('user')->name }}</h1>
        <p>Email: {{ session('user')->email }}</p>

        <!-- Navigation to Voter Elections -->
        <a href="{{ url('voter/elections') }}">
            <button class="button" type="button">Go to Elections</button>
        </a>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button class="button" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>