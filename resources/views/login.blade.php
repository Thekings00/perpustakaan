<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- link untuk css -->
     <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- bungkus semua isi login -->
    <div class="container">

        <!-- buat tampilan login -->
         <form action="#" class="form" class="form" method="post">
            <div class="teks-login">
            <h1>Login</h1>
            <p>kaitkan akun untuk masuk</p>
            </div>

            <!-- untuk form input -->
             <div class="form-input">
            <label for="username" class="teks-input">USERNAME</label>
            <br>
            <input type="text" id="username" name="username" class="input" required>
            <br>
            <label for="password" class="teks-input">PASSWORD</label>
            <br>
            <input type="password" id="password" name="password" class="input" required>
            <br>
            <input class="login" type="submit" name="login" value="Login">
             </div>
         </form>
    </div>
</body>
</html>
