<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regist</title>
    <!-- link untuk css -->
     <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- bungkus semua isi regist -->
    <div class="container">

        <!-- buat tampilan regist -->
         <form action="{{ route('regist.tambahUser') }}" class="form" method="post">
            @csrf
            <div class="teks-login">
            <h1>Registerasi</h1>
            <p>Buat akun anda Sekarang</p>
            </div>

             @if (session('error'))
                <div class="pesan-error">
                    {{ session('error') }}
                </div>
             @endif

            <!-- untuk form input -->
             <div class="form-input">
            <label for="name" class="teks-input">NAME</label>
            <br>
            <input type="text" id="name" name="name" class="input" required>
            <br>
            <label for="email" class="teks-input">EMAIL</label>
            <br>
            <input type="text" id="email" name="email" class="input" required>
            <br>
            <label for="password" class="teks-input">PASSWORD</label>
            <br>
            <input type="password" id="password" name="password" class="input" required>
            <br>
            <input class="login" type="submit" name="regist" value="Buat Akun">
             </div>
             <p style="text-align: center; margin-top: 10px;">Sudah Punya Akun?<a href="{{ route('login') }}">Login Sekarang!!</a></p>
         </form>
    </div>
</body>
</html>
