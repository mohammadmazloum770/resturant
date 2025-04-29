<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Login</title>
</head>
<body>
    <h1>Chef Login</h1>
    <form action="{{ route('chef.login.submit') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input src="{{ url('chef.dashboard') }}" type="submit" >Login</>
</form>
</body>
</html>