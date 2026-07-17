<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('login_assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* card */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        /* title */
        .login-title {
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            color: #111827;
        }

        /* input */
        .input-group {
            margin-bottom: 18px;
        }

        .input-group-text {
            background: #f3f4f6;
            border: none;
        }

        .form-control {
            height: 48px;
            border: none;
            background: #f9fafb;
        }

        .form-control:focus {
            background: #fff;
            box-shadow: 0 0 0 2px #6366f1;
        }

        /* button */
        .login-btn {
            height: 48px;
            font-weight: 600;
            border: none;
            background: #6366f1;
            color: #fff;
            transition: .25s;
        }

        .login-btn:hover {
            background: #4f46e5;
        }

        /* footer */
        .secure {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <h4 class="login-title">Sign in to your account</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- email -->
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

            <!-- password -->
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" id="pass" name="password" class="form-control" placeholder="Password"
                    required>
                <span class="input-group-text" onclick="togglePass()" style="cursor:pointer">
                    <i class="fa fa-eye"></i>
                </span>
            </div>

            <button class="btn w-100 login-btn">
                Login
            </button>

            <div class="secure">
                Secure Login Panel
            </div>

        </form>

    </div>

    <script>
        function togglePass() {
            let p = document.getElementById("pass");
            p.type = p.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>
