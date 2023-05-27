<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Login</title>
</head>
<body>
    @if(session("UserNotFound"))
    <div style="background: lightcoral;">
        {{ session("UserNotFound") }}
    </div>
    @endif
    
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" id="login" name="login"><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>