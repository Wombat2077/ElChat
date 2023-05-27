<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Login</title>
</head>
<body>
    @if($errors->any())
    <div style="background: lightcoral;">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" id="login" name="login" placeholder="login"><br><br>
        <input type="text" id="email" name="email" placeholder="email"><br><br>
        <input type="password" id="password" name="password" placeholder="password"><br><br>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password"><br><br>
        <input type="submit">
    </form>
</body>
</html>