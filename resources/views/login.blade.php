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
         <form action="{{ route('login.proses') }}" class="form" class="form" method="post">
            @csrf

            <div class="teks-login">
            <h1>Login</h1>
            <p>Silahkan login ke akun anda untuk masuk</p>
            </div>

            @if (session('error'))
                <div class="pesan-error">
                    {{ session('error') }}
                </div>
             @endif

            @if (session('succes'))
                <div class="pesan-succes">
                    {{ session('succes') }}
                </div>
             @endif

            <!-- untuk form input -->
             <div class="form-input">
            <label for="email" class="teks-input">EMAIL</label>
            <br>
            <input type="text" id="email" name="email" class="input" required>
            <br>
            <label for="password" class="teks-input">PASSWORD</label>
            <br>
            <input type="password" id="password" name="password" class="input" required>
            <br>
            <input class="login" type="submit" name="login" value="Login">
             </div>
             <p style="text-align: center; margin-top: 10px;">Belum Punya Akun?<a href="{{ route('regist') }}">Buat Akun Sekarang!!</a></p>
         </form>
    </div>
</body>
</html>
