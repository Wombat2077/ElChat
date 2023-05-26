<<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        <input type="text" id="login" name="login"><br>
        <input type="password" id="password" name="password"><br>
        <input type="button">
    </form>
</body>
</html>