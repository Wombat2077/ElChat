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
    
    <form method="post" action="{{route('login')}}" name="login">
    @csrf
  <div class="form-element">
    <label>Логин</label>
    <input type="text" name="login" pattern="[a-zA-Z0-9]+" required />
  </div>
  <div class="form-element">
    <label>Пароль</label>
    <input type="password" name="password" required />
  </div>
  <button type="submit" name="btn_av" value="login">Войти</button>
</form>
</body>
</html>