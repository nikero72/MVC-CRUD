<div class="alert alert-danger" id="login-error" style="display: none;">
    Неверное имя пользователя или пароль
</div>

<?php 
    if ($_COOKIE['error'] == 1) {
        echo '<script>loginError();</script>';
    }
?>

<form id="login-form" action="login/login" method="post">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="login" placeholder="Логин">
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" placeholder="Пароль">
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Войти</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Нет аккаунта? <a href="registration">Регистрация</a></p>
        </div>
</form>