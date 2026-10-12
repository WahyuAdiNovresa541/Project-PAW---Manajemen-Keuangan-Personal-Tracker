<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FinTrack</title>

    <style>
        :root {
            --primary: #155E75;
            --primary-dark: #164E63;
            --background: #F4F8FA;
            --surface: #FFFFFF;
            --text: #20343D;
            --text-muted: #71818A;
            --border: #DCE7EB;
            --expense: #C24141;
            --expense-light: #FCEAEA;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: var(--background); color: var(--text); display: grid; place-items: center; min-height: 100vh; padding: 20px; }
        .login-card { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 32px; width: 100%; max-width: 400px; box-shadow: 0 10px 25px rgba(21, 94, 117, 0.05); }
        .brand { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 24px; font-size: 24px; font-weight: 700; }
        .brand-icon { width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: var(--primary); color: #FFFFFF; border-radius: 10px; font-size: 22px; font-weight: 700; }
        h1 { font-size: 20px; text-align: center; margin-bottom: 6px; }
        .subtitle { font-size: 13px; color: var(--text-muted); text-align: center; margin-bottom: 24px; }
        .alert-error { background: var(--expense-light); color: var(--expense); border: 1px solid #E9AAAA; padding: 10px 14px; border-radius: 8px; font-size: 13px; margin-bottom: 18px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 8px; }
        input { width: 100%; padding: 12px 14px; border: 1px solid var(--border); border-radius: 9px; font-size: 14px; outline: none; }
        input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(21, 94, 117, 0.10); }
        .btn-submit { width: 100%; padding: 12px; background: var(--primary); color: white; border: none; border-radius: 9px; font-size: 14px; font-weight: 700; cursor: pointer; margin-top: 8px; transition: background 0.2s; }
        .btn-submit:hover { background: var(--primary-dark); }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <span class="brand-icon">F</span>
            <span>FinTrack</span>
        </div>

        <h1>Masuk ke Akun</h1>
        <p class="subtitle">Masukkan email dan password kamu</p>

        @if($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="user@fintrack.com" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-submit">Login</button>
        </form>
    </div>
</body>
</html>