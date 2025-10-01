<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh; /* Set body height to 100% of the viewport height */
            overflow: hidden; /* Prevent scrolling */
            display: flex; /* Use flexbox to center the form */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            background-color: #f4f4f4; /* Light background for better contrast */
        }
        form {
            width: 100%; /* Make form take full width */
            max-width: 400px; /* Set a max width for the form */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* White background for the form */
            overflow: hidden; /* Prevent form overflow */
        }
        h1 {
            text-align: center; /* Center the heading */
            margin-bottom: 20px; /* Space below the heading */
        }
        label {
            display: block;
            margin-bottom: 5px; /* Reduced margin for better spacing */
            font-weight: bold; /* Bold labels for better visibility */
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            height: 40px;
            margin-bottom: 15px; /* Reduced margin for better spacing */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }
        button[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Increased font size for better readability */
        }
        button[type="submit"]:hover {
            background-color: #3e8e41;
        }
        .error {
            color: red;
            font-size: 14px; /* Increased font size for better readability */
            margin-top: -10px; /* Adjusted margin for better spacing */
            margin-bottom: 10px; /* Space below error message */
        }
        p {
            text-align: center; /* Center the paragraph */
            margin-top: 20px; /* Space above the paragraph */
        }
    </style>
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h1>Register</h1>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
        @error('password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror
        
        <button type="submit">Register</button>
        
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </form>
</body>
</html>