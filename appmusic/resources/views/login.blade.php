<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/background.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="left">
        <div class="coverLeft">
            <a href="{{route('index')}}" class="logo">
                <img src="../Assets/Image/01_MainLogo.png" style="width: 100px;">
            </a>
            <h1 style="margin-bottom: 10px;">Đăng nhập</h1>
            <div class="noAccount">
                <span>Không có tài khoản?</span>
                <a href="{{url('/register')}}">Tạo tài khoản</a>
            </div>


            <form id="loginForm" action="{{ route('postLogin') }}" method="POST">
                @csrf
                <input type="text" placeholder="Email" name="email" required>
                <input type="text" placeholder="Password" name="password" required>
                <button type="submit">Đăng nhập</button>
            </form>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="forgetPassword" style="margin-bottom: 20px;">
                <a href="forgot.blade.php">Bạn quên mật khẩu?</a>
            </div>
            <div class="decriptrion">
                <p style="margin-bottom: 20px;">By clicking "Continue with Apple/Google" above, you acknowledge that you have read and you agree to our General Terms and Conditions and have read and acknowledge the Privacy policy</p>

                <p>This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
            </div>
        </div>
    </div>
    <div class="right">
        <img src="../Assets/Image/04_image_login.webp">
    </div>
</body>
</html>