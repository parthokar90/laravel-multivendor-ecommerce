<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .login-header {
            background: #fff;
            padding: 30px;
            text-align: center;
        }

        .login-header h2 {
            color: #333;
            font-weight: 600;
            margin: 0;
        }

        .login-body {
            background: #fff;
            padding: 30px;
        }

        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
            margin-bottom: 20px;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <div class="login-header">
                <h2>Admin Login</h2>
            </div>
            <div class="login-body">

                <div class="alert alert-info text-center mb-3">
                    <b>Demo Admin Login</b><br>
                    Email: admin@email.com<br>
                    Password: 12345678
                </div>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-login">Login</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>